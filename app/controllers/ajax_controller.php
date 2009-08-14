<?php
//Configure::write('debug', 1);
class AjaxController extends AppController {

    var $name = 'Ajax';
    var $uses = array();
    var $components = array('Cookie');
    var $helpers = array('State');
    var $cookie_expires = '2592000';
    var $cookie_encrypted = true;

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('get_state_districts', 'set_state_district');
        parent::beforeFilter();
    }
    

    function get_state_districts($state=null)
    {
        $this->autoRender=false;

        if($state) {
            $this->Lawmaker =& ClassRegistry::init('Lawmaker'); 
        
            $sql = "SELECT firstname, lastname, state, party, district FROM lawmakers WHERE state = '".$state."'
                    AND in_office = 1
                    AND district NOT IN ('Senior Seat', 'Junior Seat')
                    ORDER BY district";
            $districts = $this->Lawmaker->query($sql);
            $this->Cookie->write('state', $state, $this->cookie_encrypted, $this->cookie_expires);
            $sizeofDistrict = sizeof($districts);
        
            echo 'Select your Representative/District: <select name="cong_district"  onChange="setStateDistrict(\'district_saved\', this.value); return false;">'."\n";
            echo '<option value="">Select Your Congressional District</option>';
            for($i=0; $i < $sizeofDistrict; $i++) {
                $text_str = $districts[$i]['lawmakers']['firstname']. ' ' . $districts[$i]['lawmakers']['lastname'];
                $text_str .=  ' ['.$districts[$i]['lawmakers']['district'].']'; 
                echo '<option value="'.$districts[$i]['lawmakers']['state'].'-'.$districts[$i]['lawmakers']['district'].'">'.$text_str.'</option>'."\n";
            }
            echo '</select>';
        }
    }

    function set_state_district($district)
    {
        $this->autoRender=false;
        $data = explode('-', $district);
        $this->Cookie->write('state', $data[0], $this->cookie_encrypted, $this->cookie_expires);
        $this->Cookie->write('district', $data[1], $this->cookie_encrypted, $this->cookie_expires);
        echo '<br/>View your <a href="'.Router::url('/mydistrict').'">Congress</a> members.';
    }
}
