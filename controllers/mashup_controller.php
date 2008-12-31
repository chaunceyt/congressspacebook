<?php

class MashupController extends AppController {

    var $name = 'Mashup';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }

    function index()
    {
        if(isset($this->data['Search']['keyword'])) {
            $keyword = $this->data['Search']['keyword'];
            $page = 1;
            $TwitterSearch = $this->Mashup->twitterSearch($keyword, $page);
            $this->set('TwitterSearch', $TwitterSearch);
            $this->set('hasData', 'true');
            $this->set('keyword', $keyword);
            $this->set('page', $page);
        }
        else {
            $this->set('hasData', 'false');
        }
        /*else {
            $page = 1;
        }*/
                                    
        //get pagination working..
        //$this->set('GoogleSearch', $this->Mashup->googleNews($keyword));
        
    }

    function test()
    {
        $this->autoRender=false;
        App::import('vendor','socialnet');
        $socialnet = new Socialnet;
        echo $socialnet->getAccountUrl('1','hmatkin');
        //$socialnet->getInfoFromFeed($accountName, , $feed_url, $max_items = 5)
        //print_r($test);
    }
}
