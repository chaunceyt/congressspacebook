<?php
class TwitterfriendsController extends AppController {

	var $name = 'Twitterfriends';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'add');
        parent::beforeFilter();
    }


	function index() {
		$this->Twitterfriend->recursive = 0;
        $this->paginate['Twitterfriend'] = array(
                'limit' => '10',
                'order' => array('Twitterfriend.twitter_friends' => 'desc'));

		$this->set('accounts', $this->paginate());
	}

	function add() {
        //$this->autoRender=false;
		if (!empty($this->data)) {
           $twitter_url = 'http://twitter.com/'.urlencode($this->data['Twitter']['username']);
           //echo $twitter_url;
           $google_social_map = $this->Mashup->googleSocialGraph($twitter_url);
           $friends=0;
           $friends1=0;
           $friends2=0;
           foreach($google_social_map as $gsm) {
            if(isset($gsm['attributes']['url'])) {
                if(preg_match('/http:\/\/twitter.com\/'.urlencode($this->data['Twitter']['username']).'/is',$gsm['attributes']['url'])) {
                    if(isset($gsm['nodes_referenced_by']) && sizeof($gsm['nodes_referenced']) > 0) {
                        //print_r($gsm);
                        foreach($gsm['nodes_referenced_by'] as $key => $type) {
                            if($type['types'][0] == 'contact') {
                                $friends1++;
                                //echo $key . ' (' . $type['types'][0].') <br/>';
                            }
                        }
                    
                    }
                    if(isset($gsm['nodes_referenced_by']) && sizeof($gsm['nodes_referenced']) > 0) {
                        //print_r($gsm);
                        foreach($gsm['nodes_referenced'] as $key => $type) {
                            if($type['types'][0] == 'contact') {
                                $friends2++;
                                //echo $key . ' (' . $type['types'][0].') <br/>';
                            }
                        }
                    
                    }
                }
            }
           }
           $friends = $friends1 + $friends2;
           if($friends > 0) {
                $this->data['Twitterfriend']['twitter_friends'] = $friends;
                $this->data['Twitterfriend']['username'] = $this->data['Twitter']['username'];
           
			    $this->Twitterfriend->create();
			    if ($this->Twitterfriend->save($this->data)) {
				    $this->Session->setFlash(__('The Twitterfriend has been saved', true));
				    $this->redirect(array('action'=>'index'));
			    } else {
				    $this->Session->setFlash(__('The Twitterfriend could not be saved. Please, try again.', true));
			    }
           }
           else {
				    $this->Session->setFlash(__('We couldn\'t find your account, try again.', true));
                    $this->redirect(array('action'=>'index'));
           }
            echo $this->data['Twitterfriend']['twitter_friends'];
        }
    }

    function _test()
    {
           /*require APP . 'vendors' . DS .'JSON.php';
           $json = new Services_JSON();
           $json_data = file_get_contents('http://twitter.com/statuses/public_timeline.json');
           $arr1 = $json->decode($json_data);
           echo '<pre>';
           print_r($arr1);*/
    }
}
?>
