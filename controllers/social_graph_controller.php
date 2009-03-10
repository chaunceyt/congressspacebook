<?php
/**
 * File used as application controller
 *
 * Contains actions for application controller
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Controller class containing application controller's actions
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

class SocialGraphController extends AppController {

    var $name = 'SocialGraph';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }


    function beforeRender()
    {
        parent::beforeRender();
    }

    function index()
    {
       // $this->autoRender=false;
       if($this->data) { 
           $url = $this->data['Search']['url'];
           $google_social_map = $this->Mashup->googleSocialGraph($url);
           //print_r($google_social_map);
           $this->set('google_social', $google_social_map);
           $this->set('url', $url); 
           //if(preg_match('/twitter.com\/'.$username.'/is',$weblink['attributes']['url'])) {
           //foreach($weblink['nodes_referenced'] as $key => $type) {
           //echo '<pre>';
           //$keyword = $this->params['username'];
           //$page = $this->params['page'];
       }
    }
}
