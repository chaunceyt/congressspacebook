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
    function events() 
    {
        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page = 1;
        }
        $keyword = '';
        $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
        $current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
        //print_r($current_webuser);
        //$location = '("'.$current_webuser->latitude.','.$current_webuser->longitude.'")';
        $location = '("'.$current_webuser->city.', '.$current_webuser->region.'")';
        $events = $this->Mashup->eventfulSearch($keyword, $page, $location);
        //print_r($events);
        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $events->page_count .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            //$_numList .= '<a href="./events?keyword='.$_keyword.'&page='.$pnum.'">'.$pnum.'</a>&nbsp;';
            $_numList .= '<a href="'.Router::url('/eventful/'.$keyword.'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }

        $firstpage = '<a href="'.Router::url('/eventful/'.$keyword).'/1">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$events->page_count).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('EventsPagination', $pagenotice.$nextpage);
        }
        else if($page == $events->page_count) {
            $this->set('EventsPagination',$firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('EventsPagination', $pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }
        $this->set('EventsTotal',$events->total_items);
        $this->set('eventResults',$events->events->event);
        $this->set('keyword' , $keyword);
    }

}
