<?php

class NearbyController extends AppController {

    var $name = 'Nearby';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array('Lawmaker');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'lawmakers');
        parent::beforeFilter();
    }


    function index()
    {
        //$this->autoRender=false;
        require APP . 'vendors' . DS .'JSON.php';
        $json = new Services_JSON();
        $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
        $current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
        $url = 'http://api.outside.in/radar.json?lat='.$current_webuser->latitude.'&lng='.$current_webuser->longitude;
        $data = file_get_contents($url);
        $results = $json->decode($data);
        /*
        echo '<pre>';
        print_r($current_webuser);
        print_r($results);
        */
        $this->set('data', $results);
    }

        function lawmakers() {
                $this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));
        $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
        $current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
                
        $this->paginate['Lawmaker'] = array('limit' => '10','order' => 'firstname ASC', );
        $this->paginate['Lawmaker']['conditions'] = array('state = ' => $current_webuser->region);
                $this->set('lawmakers', $this->paginate());
        }

        function lawmakers_with_twitter_accounts() {
                $this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));

        $conditions = array('conditions' => "twitter_id != ' '", 'order' => 'firstname ASC',);
        //$conditions = array('Lawmaker.twitter_id != ' => $conditions);
                $this->set('lawmakers', $this->Lawmaker->find('all', $conditions));
        }

        function places()
        {
            require APP . 'vendors' . DS .'JSON.php';
            $json = new Services_JSON();
            $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
            $current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
            $url = 'http://api.outside.in/radar.json?lat='.$current_webuser->latitude.'&lng='.$current_webuser->longitude;
            $data = file_get_contents($url);
            $results = $json->decode($data);
            $this->set('data', $results);
            
        }

}
