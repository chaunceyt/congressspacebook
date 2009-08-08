<?php
Configure::write('debug', 1);
class MydistrictController extends AppController {

    var $name = 'Mydistrict';
    var $helpers = array('Html', 'Form');
    var $components = array('Sunlightlabs', 'Cookie');
    var $uses = array();
    var $cookie_expires = 2592000; // 30 days
    var $cookie_encrypted = true;

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'zipcode');
        parent::beforeFilter();
    }


    function index($district=null)
    {

        $web_userdata = $this->Session->read('current_webuser');
        if(!$district) {
            if($this->Cookie->read('district') != null) {
                $district = $this->Cookie->read('district');
                $this->set('myDistrict', $district);
            }

            if($this->Cookie->read('zipcode') != null) {
                $zipcode = $this->Cookie->read('zipcode');
                $this->set('myZipcode', $zipcode);
            }

            if($this->Session->read('district') !=null) {
                $district = $this->Session->read('district');
                $this->set('myDistrict', $district);
            }

            if($this->Session->read('zipcode') !=null) {
                $zipcode = $this->Session->read('zipcode');
                $this->set('myZipcode', $zipcode);
            }

        }

        
        //$this->autoRender=false;
        $this->Lawmaker =& ClassRegistry::init('Lawmaker');
        $st_dist = explode('-',$district);
        $lawmakers = $this->Lawmaker->getMyDistrict($st_dist[0], $st_dist[1]);
        $president = $this->Lawmaker->getPresident();
        //print_r($lawmakers);
        $this->set('lawmakers', $lawmakers);
        $this->set('president', $president);
    }

    function zipcode()
    {
        $this->autoRender=false;
        $zipcode = $this->params['form']['zipcode'];
        $districts = $this->Sunlightlabs->getDistrictsFromZip($zipcode);
        print_r($districts); 
        if(sizeof($districts->response->districts) > 1) {
            $total_dist = sizeof($districts->response->districts);
            for($i=0; $i < $total_dist; $i++) {
                $dist = $districts->response->districts[$i]->district->state.'-'.$districts->response->districts[$i]->district->number;
                $zip4dists[$dist][] = $this->Sunlightlabs->getZipsFromDistrict($districts->response->districts[$i]->district->state, $districts->response->districts[$i]->district->number);                
            }

            foreach($zip4dists as $state_dist => $data) {
                if(in_array($zipcode, $data[0]->response->zips)) {
                    $mydistrict =  $state_dist;
                }
            }
        }
        else {
            $mydistrict = $dist = $districts->response->districts[0]->district->state.'-'.$districts->response->districts[0]->district->number;
        }//end if


        if(isset($this->params['form']['myzip'])) {
                $this->Cookie->write('district', $mydistrict, $this->cookie_encrypted, $this->cookie_expires);
                $this->Cookie->write('zipcode', $zipcode, $this->cookie_encrypted, $this->cookie_expires);
        }
        else {
            $this->Session->write('district', $mydistrict);
            $this->Session->write('zipcode', $zipcode);
        }
        $this->redirect('/mydistrict/');

    }
}
