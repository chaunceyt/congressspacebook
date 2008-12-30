<?php
class AppController extends Controller {

    var $helpers = array('Html', 'Form', 'Mashup');
    function beforeRender()
    {
        //fixme
        if(isset($this->params['keyword'])) {
            $keyword = $this->params['keyword'];
            $this->set('keyword', $keyword);
        }
        else {
            if(isset($this->data)) {
                if(isset($this->data['Search']['keyword'])) {
                    $keyword = $this->data['Search']['keyword'];
                }
                else {
                    $keyword = $this->data['Search']['url'];
                }
                $this->set('keyword', $keyword);
            }
            else {
                //get random value
                $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
                $_current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
                $this->set('current_webuser', $_current_webuser);
                if(isset($_current_webuser->city)) {
                    $this->set('keyword', $_current_webuser->city);
                }
                else {
                    $this->set('keyword', 'Obama');
                }
            }
        }
        if($this->params['controller'] == 'social_graph') {
            $this->set('keyword', 'Social');
        }
        if($this->params['controller'] == 'twitter' && $this->params['action'] == 'user') {
            $this->set('keyword', 'Social');
           
        }
    }

}
