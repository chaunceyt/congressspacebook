<?php

class DistrictController extends AppController {

    var $name = 'District';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array('Lawmaker', 'District');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }


    function index($state=null, $district=null)
    {
        $lawmakers = $this->Lawmaker->getCongressMembersByState($state, $district);
        $districts = $this->District->getDistictOverlay($state, $district);
        $dist = $state.$district;
        $this->set('state_dist', $dist);
        $this->set('lawmakers', $lawmakers);
        $this->set('districts', $districts);
        //ABQIAAAASRRg767hPjhGnvMC6zjRwRQnVCDsJmVZ_VUOYRegIY0jUIcKeBQqdIes47LQbKWs3cVZYcrqj47WDA
        //$this->autoRender=false;
    }
}
