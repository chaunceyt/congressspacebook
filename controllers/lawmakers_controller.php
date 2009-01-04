<?php
class LawmakersController extends AppController {

	var $name = 'Lawmakers';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'browse', 'lawmakers_with_twitter_accounts', 'view');
        parent::beforeFilter();
    }

	function index() {
		$this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));
        /* not working as expected.
        require APP . 'vendors' . DS .'JSON.php';
        $json = new Services_JSON();
        //need to cache this
        $captial_words_today_url = 'http://www.capitolwords.org/api/word/iraq/2008/05/23/feed.json';
        $data = file_get_contents($captial_words_today_url);
        $results = $json->decode($data);
        echo '<pre>';
        print_r($results);
        $this->set('words', $results);
        */
    
        $stateTagCloud = $this->Lawmaker->stateTagCloud();
        $this->set('stateTagCloud', $stateTagCloud);

        $partyTagCloud = $this->Lawmaker->partyTagCloud();
        $this->set('partyTagCloud', $partyTagCloud);
        
        $genderTagCloud = $this->Lawmaker->genderTagCloud();
        $this->set('genderTagCloud', $genderTagCloud);

        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
		$this->set('lawmakers', $this->paginate());
	}

	function browse($by=null, $value=null) {
		$this->Lawmaker->recursive = 0;
        //check to see if we're doing a search.
        if(isset($this->passedArgs['query'])) { 
            $value = $this->passedArgs['query'];
            $this->paginate['Lawmaker'] = array('limit' => '25' );
            $this->paginate['Lawmaker']['conditions'] = "concat(firstname, lastname, phone, email) like '%".$value."%'";
        }
        else { // deal with params state, party, house, senate
            if(isset($by)) { 
                switch($by) {
                    case 'state' :
                        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
                        $this->paginate['Lawmaker']['conditions'] = "state = '{$value}'";
                        break;
                    case 'party' :
                        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
                        $this->paginate['Lawmaker']['conditions'] = "party = '{$value}'";
                        break;
                    case 'letter' :
                        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
                        $this->paginate['Lawmaker']['conditions'] = "firstname like '{$value}%'";
                        break;
                    case 'house' :
                        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
                        $this->paginate['Lawmaker']['conditions'] = "congress_office like '%House%'";
                        break;
                    case 'senate' :
                        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
                        $this->paginate['Lawmaker']['conditions'] = "congress_office like '%Senate%'";
                        break;
                    default :
                }   
            }
        }
		$this->set('lawmakers', $this->paginate());
	}

	function lawmakers_with_twitter_accounts() {
		$this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));
        $conditions = array('conditions' => "twitter_id != ' '" ); 
        //$conditions = array('Lawmaker.twitter_id != ' => $conditions);
		$this->set('lawmakers', $this->Lawmaker->find('all', $conditions));
	}

	function view($id=null) 
    {
        if(!$id) {
            $this->redirect('/');
            exit();
        }
        $lawmaker = $this->Lawmaker->read(null, $id);
		$this->set('lawmaker', $lawmaker);
	}

    function search()
    {
        if(!empty($this->data)){
            $params['query'] = $this->data['Search']['query'];
            $params['action'] = 'browse';
            $this->redirect($params);
        }        
    }


	function add() {
		if (!empty($this->data)) {
			$this->Lawmaker->create();
			if ($this->Lawmaker->save($this->data)) {
				$this->Session->setFlash(__('The Lawmaker has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lawmaker could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Lawmaker', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Lawmaker->save($this->data)) {
				$this->Session->setFlash(__('The Lawmaker has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lawmaker could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Lawmaker->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Lawmaker', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lawmaker->del($id)) {
			$this->Session->setFlash(__('Lawmaker deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
