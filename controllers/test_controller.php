<?php
ini_set("display_errors", true);
class TestController extends AppController {

    var $name = 'Test';
    var $helpers = array('Html', 'Form');
    var $components = array('Capitolwords', 'Govtrack', 'FollowTheMoney');
    var $uses = array('Lawmaker');
    
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }    
    
    function index($clear = false)
    {
        echo '<pre>';
        $this->autoRender=false;
        //$state_offices = $this->FollowTheMoney->stateOffice('ny');
        $sort = array('total_dollars');
        //$state_offices_breakdown = $this->FollowTheMoney->stateOfficeBreakdown('ny', 2008, null, null, $sort);
        $state_offices_business = $this->FollowTheMoney->stateOfficeBusiness('ny', '2008', null, '1', null, $sort);
        print_r($state_offices_business);
        foreach($state_offices_business as $business) { 
            print_r($business);
            $state_offices_district = $this->FollowTheMoney->stateOfficeDistrict('ny', '2008', trim($business->attributes()->office),  null, $sort);
        print_r($state_offices_district);

        }

        //$w = $this->Capitolwords->dailysum('iraq','2006');
        //$ww = $this->Capitolwords->wordofday();


        //$bills = $this->Govtrack->getBills('110');
        //print_r($bills);
        
        //print_r($ww);
        //print_r($w);
        //App::import('vendor','socialnet');
        //$socialnet = new Socialnet;
       

        //$username = $this->params['username'];
       // $username = 'jeckman';
       // $url = 'http://twitter.com/'.urlencode($username);
       // $response = file_get_contents($url);
       // preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
        //preg_match_all("/\<span class=\"vcard\">(.*?)<\/span>/is", $response, $friends_vcard);
        //$this->set('FriendsVcard', $friends_vcard[1]);
        //$this->set('AuthorVcard', $author_vcard[1]);
        echo '<pre>'; 
        //        echo $author_vcard[1];
        //print_r($friends_vcard[1]);

        //$page = $this->params['page'];
        //$TwitterSearchFrom = $this->Mashup->twitterSearch($username, 'from');
        //$TwitterSearchTo = $this->Mashup->twitterSearch($username, 'to');
        //$TwitterSearchRef = $this->Mashup->twitterSearch($username, 'refto');
        //$twitter_url = 'http://twitter.com/'.$username;
        //$url = 'http://vibe.com/';
        //$google_social_map = $this->Mashup->googleSocialGraph($url);
        //print_r($google_social_map);
        //$google_social_otherme = $this->Mashup->googleSocialGraphOtherMe($google_social_map);

        //print_r($google_social_otherme);

        /*
        $this->set('google_social', $google_social_map);
        $this->set('TwitterSearchFrom', $TwitterSearchFrom);
        $this->set('TwitterSearchTo', $TwitterSearchTo);
        $this->set('TwitterSearchRef', $TwitterSearchRef);
        $this->set('username', $username);
        
        $flickr['link'] = $socialnet->getAccountUrl('1', $username);
        $flickr['feed'] = $feeds = $socialnet->getInfoFromFeed($username, '1', $flickr['link'], $max_items = 20);
        */
       // echo '<pre>'; 
        //print_r($flickr);
       
        //$twitter['link'] = $socialnet->getAccountUrl('5', $username);
        //$twitter['feed'] = $feeds = $social->getInfoFromFeed($username, '1', $twitter['link'], $max_items = 10);

        //print_r($twitter);
    }
}
