<?php

class TwitterController extends AppController {

    var $name = 'Twitter';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }

    public function index()
    {
        //$this->autoRender=false;
        $keyword = $this->params['keyword'];
        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page =1;
        }
        //http://twitter.com/statuses/friends/dopegirlfresh.xml?page=2
        $TwitterSearch = $this->Mashup->twitterSearch($keyword, 'null', $page);

        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        $totalpages = 20;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $totalpages .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList ='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            $_numList .= '<a href="'.Router::url('/twitter/'.urlencode($keyword).'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }
        //fixme: url routes
        $firstpage = '<a href="'.Router::url('/twitter/'.urlencode($keyword).'/1').'">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/twitter/'.urlencode($keyword).'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/twitter/'.urlencode($keyword).'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/twitter/'.urlencode($keyword).'/'.$totalpages).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('TwitterPagination',$pagenotice.$nextpage);
        }
        else if($page == $totalpages) {
            $this->set('TwitterPagination',$firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('TwitterPagination',$pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }
        
        //echo '<pre>';
        //print_r($TwitterSearch);
        $this->set('keyword', $keyword);
        $this->set('TwitterSearch', $TwitterSearch);

    }

    public function user()
    {
        $keyword = $this->params['username'];
        //$page = $this->params['page'];

        $url = 'http://twitter.com/'.urlencode($keyword);
        $response = file_get_contents($url);
        preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
        preg_match_all("/\<span class=\"vcard\">(.*?)<\/span>/is", $response, $friends_vcard);
        $friends_vcard_data = preg_replace('/https:\/\/|http:\/\/twitter.com/si',Router::url('/social_stream/user'),$friends_vcard[1]);
        $this->set('FriendsVcard', $friends_vcard_data);
        $this->set('AuthorVcard', $author_vcard[1]);
        
        $TwitterSearchFrom = $this->Mashup->twitterSearch($keyword, 'from');
        $TwitterSearchTo = $this->Mashup->twitterSearch($keyword, 'to');
        $TwitterSearchRef = $this->Mashup->twitterSearch($keyword, 'refto');
        $twitter_url = 'http://twitter.com/'.$keyword;
        $google_social_map = $this->Mashup->googleSocialGraph($twitter_url);
        $this->set('google_social', $google_social_map);
        $this->set('TwitterSearchFrom', $TwitterSearchFrom);
        $this->set('TwitterSearchTo', $TwitterSearchTo);
        $this->set('TwitterSearchRef', $TwitterSearchRef);
        $this->set('username', $keyword);
    }

    public function web_link()
    {
        $site = $this->params['site'];
        switch($site) {
            case 'flickr' :
                $url = 'http://www.flickr.com/'.$this->params['link'];
                break;
            case 'youtube' :
                $url = 'http://youtube.com/user/'.$this->params['link'];
                break;
            default :
        }

        $google_social_map = $this->Mashup->googleSocialGraph($url);
        $this->set('google_social', $google_social_map);
        $this->set('username', $this->params['link']);
    }

    public function refToUser($user)
    {
        $keyword = $this->params['keyword'];
        $page = $this->params['page'];
        $TwitterSearch = $this->Mashup->twitterSearch($keyword);
    }

   function feed2array($feed_url, $items_per_feed = 5, $items_max_age = '-21 days') {
       if(!$feed_url) {
           return false;
       }

       # get info about service type

       $max_age = $items_max_age ? date('Y-m-d H:i:s', strtotime($items_max_age)) : null;
       $items = array();

       $feed = new SimplePie();
       $feed->set_cache_location(CACHE . 'simplepie');
       $feed->set_feed_url($feed_url);
       $feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_NONE);
       $feed->init();
       if($feed->error() || $feed->feed_url != $feed_url ) {
           return false;
       }

       for($i=0; $i < $feed->get_item_quantity($items_per_feed); $i++) {
               $feeditem = $feed->get_item($i);
               # create a NoseRub item out of the feed item
               $item = array();
               $item['datetime'] = $feeditem->get_date('Y-m-d H:i:s');
               if($max_age && $item['datetime'] < $max_age) {
                   # we can stop here, as we do not expect any newer items
                   break;
               }

               $item['title']    = $feeditem->get_title();
               $item['url']      = $feeditem->get_link();
           $item['intro']    = @$intro;
           $item['type']     = @$token;
           $item['username'] = $username;

               $items[] = $item;
       }

       unset($feed);

       return $items;
   }



}
