<?php
class AppController extends Controller 
{
    var $components = array('Auth', 'RequestHandler', 'Zend', 'Mashup');
    var $helpers = array('Html', 'Form', 'Time', 'Javascript', 'Cache', 'Mashup');
    //var $helpers = array('Html', 'Form', 'Mashup');

    function beforeFilter()
    {
        $this->Auth->loginAction = '/users/login';
        $this->Auth->logoutRedirect = '/';

        $this->Auth->fields = array('username'=> 'username', 'password'=>'psword');
        $this->Auth->loginError = 'Invalid e-mail/password combination.  Please try again.';
        $this->Auth->allow('display');
        $this->Auth->authorize = 'controller';
        //$this->Auth->object = $this;
        //$this->Auth->authenticate = $this;

        $realReferer = $this->referer(null, true);
        $sessionReferer = $this->Session->read('referer');
        if (!$sessionReferer) {
            $this->Session->write('referer', $this->referer(null, true));
            if (!$this->Auth->user()) {
                $this->Auth->authError = __('Please login to continue', true);
            }
            //$this->Auth->allowedActions('*');
        }

        if($this->Auth->user()) {
            $this->{$this->modelClass}->currentUserId = $this->Auth->user('id');
        }
    }

   function isAuthorized() {
        return true;
   }


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
                    //fixme: generating a notice. @ fornow..
                    //cthorn - thinking about something else and noticed the warning
                    //12302008
                    $keyword = @$this->data['Search']['url'];
                }
                $this->set('keyword', $keyword);
            }
            else {
                //get random value
                $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
                $_current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
                $this->{$this->modelClass}->currentWebuser = $_current_webuser;
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
