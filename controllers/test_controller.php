<?php

class TestController extends AppController {

    var $name = 'Test';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        $this->autoRender=false;
        App::import('vendor','socialnet');
        $socialnet = new Socialnet;
       

        //$username = $this->params['username'];
        $username = 'jeckman';
        $url = 'http://twitter.com/'.urlencode($username);
        $response = file_get_contents($url);
        preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
        preg_match_all("/\<span class=\"vcard\">(.*?)<\/span>/is", $response, $friends_vcard);
        $this->set('FriendsVcard', $friends_vcard[1]);
        $this->set('AuthorVcard', $author_vcard[1]);
        echo '<pre>'; 
        //        echo $author_vcard[1];
        //print_r($friends_vcard[1]);

        //$page = $this->params['page'];
        $TwitterSearchFrom = $this->Mashup->twitterSearch($username, 'from');
        $TwitterSearchTo = $this->Mashup->twitterSearch($username, 'to');
        $TwitterSearchRef = $this->Mashup->twitterSearch($username, 'refto');
        //$twitter_url = 'http://twitter.com/'.$username;
        $url = 'http://vibe.com/';
        $google_social_map = $this->Mashup->googleSocialGraph($url);
        print_r($google_social_map);
        //$google_social_otherme = $this->Mashup->googleSocialGraphOtherMe($google_social_map);

        //print_r($google_social_otherme);

        
        $this->set('google_social', $google_social_map);
        $this->set('TwitterSearchFrom', $TwitterSearchFrom);
        $this->set('TwitterSearchTo', $TwitterSearchTo);
        $this->set('TwitterSearchRef', $TwitterSearchRef);
        $this->set('username', $username);
        
        $flickr['link'] = $socialnet->getAccountUrl('1', $username);
        $flickr['feed'] = $feeds = $socialnet->getInfoFromFeed($username, '1', $flickr['link'], $max_items = 20);
       // echo '<pre>'; 
        //print_r($flickr);
       
        //$twitter['link'] = $socialnet->getAccountUrl('5', $username);
        //$twitter['feed'] = $feeds = $social->getInfoFromFeed($username, '1', $twitter['link'], $max_items = 10);

        //print_r($twitter);
    }
}
