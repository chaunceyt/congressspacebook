<?php
require APP . 'vendors' . DS .'JSON.php';
require APP . 'vendors' . DS .'facebook'. DS .'facebook.php';
require APP . 'vendors' . DS .'fbconnect.php';
uses('Sanitize');
class AppController extends Controller 
{
    var $components = array('Auth', 'RequestHandler', 'Zend', 'Mashup');
    var $helpers = array('Html', 'Form', 'Time', 'Javascript', 'Cache', 'Mashup', 'Site', 'Bookmark','Minify');
    //var $helpers = array('Html', 'Form', 'Mashup');

    function beforeFilter()
    {
        $this->Auth->loginAction = '/users/login';
        $this->Auth->logoutRedirect = '/';
        //fixme: add facebook connect.
        //$fb_uid = facebook_client()->get_loggedin_user();

        $this->Auth->fields = array('username'=> 'username', 'password'=>'psword');
        $this->Auth->loginError = 'Invalid e-mail/password combination.  Please try again.';
        $this->Auth->allow('display');
        $this->Auth->authorize = 'controller';
        //$this->Auth->object = $this;
        //$this->Auth->authenticate = $this;
        $this->_siteSettings = Configure::read('AppSettings');
 
        $this->Cookie->name = 'CongressSpacebook';
        $this->Cookie->time =  $this->cookie_expires;
        $this->Cookie->path = '/';
        $this->Cookie->domain = '.congressspacebook.com';
        $this->Cookie->secure = false;
        $this->Cookie->key = Configure::read('Security.salt');


        // Compress output to save bandwith / speed site up
        //if (!isset($this->params['requested'])) {
        //    $this->_gzipOutput();
        //}

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
        $gi = geoip_open(APP . 'geocity' . DS .'GeoLiteCity.dat',GEOIP_MEMORY_CACHE);
        $_current_webuser = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
        $this->set('current_webuser', $_current_webuser);
        $this->Session->write('current_webuser', $_current_webuser); 
        $json = new Services_JSON();
        $_random_keyword = $this->_words();
        //$this->_words();
        //fixme
        if(isset($this->params['keyword'])) {
            $keyword = $this->params['keyword'];
            $this->set('keyword', $keyword);
            
            //$captial_words_today_url = 'http://www.capitolwords.org/api/word/'.$keyword.'/2008/feed.json';
            //$data = @file_get_contents($captial_words_today_url);
            //$results = $json->decode($data);
              
            //$_wordused=0;
            //foreach($results as $result) {
            //    $_wordused += $result->word_count;
            //}

            //$this->set('wordused', $_wordused);
        }
        else if(isset($this->params['username'])) {
            $keyword = str_replace('_', ' ', $this->params['username']);
            $this->set('keyword', $keyword);
            $this->set('username', $this->params['username']);

            //$captial_words_today_url = 'http://www.capitolwords.org/api/word/'.$keyword.'/2008/feed.json';
            //$data = @file_get_contents($captial_words_today_url);

            //$results = $json->decode($data);
            //$_wordused=0;
            
            //if($results) {
            //    foreach($results as $result) {
            //       $_wordused += $result->word_count;
            //   }
            //}
           //$this->set('wordused', $_wordused);

            
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
                    if(isset($this->data['Search']['url'])) {
                        $keyword = @$this->data['Search']['url'];    
                    }
                    else {
                        $keyword = 'congress';
                    }
                    
                }
                $this->set('keyword', $keyword);
            }
            else {
                
                //need to cache this
                
                //$captial_words_today_url = 'http://www.capitolwords.org/api/word/'.$_random_keyword.'/2008/feed.json';
                //$data = @file_get_contents($captial_words_today_url);
               //$results = $json->decode($data);
                
                //$_wordused=0;
                //foreach($results as $result) {
                //    $_wordused += $result->word_count;
                //}

                //$this->set('wordused', $_wordused);
                $this->set('keyword', $_random_keyword);
               
                /*
                //get random value
                $this->{$this->modelClass}->currentWebuser = $_current_webuser;
                if(isset($_current_webuser->city)) {
                    $this->set('keyword', $_current_webuser->city);
                }
                else {
                    $this->set('keyword', 'Obama');
                }
                */
            }
        }
        if($this->params['controller'] == 'social_graph') {
            $this->set('keyword', 'Social');
        }
        if($this->params['controller'] == 'twitter' && $this->params['action'] == 'user') {
            $this->set('keyword', 'Social');
           
        }
    }

    function _words()
    {
        srand((float) microtime() * 10000000);
        $words = array('health','energy','security','public','report','service','country','percent','fiscal','services',
                       'care','programs','education','date','iraq','tax','information','funds','amount','assistance',
                       'defense','community','children','military','development','system','oil','term','office','plan',
                       'family', 'help', 'economy', 'jobs', 'school', 'money', 'administration','entitled', 'economic',
                       'billion','security','communication','plan', 'auto');
        $rand_keys = shuffle($words);
        return $words[$rand_keys];
    }
    
    function _gzipOutput() {
        if (@ob_start('ob_gzhandler')) {
            header('Content-type: text/html; charset: UTF-8');
            header('Cache-Control: must-revalidate');
            $offset = -1;
            $expireTime = gmdate('D, d M Y H:i:s', time() + $offset);
            $expireHeader = "Expires: $expireTime GMT";
            header($expireHeader);
        }
    }
}
