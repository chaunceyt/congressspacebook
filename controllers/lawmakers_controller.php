<?php
class LawmakersController extends AppController {

	var $name = 'Lawmakers';
    var $components = array('Opensecrets', 'Fedspending', 'Zend');
	var $helpers = array('Html', 'Form');
    public $_cache = null;

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 
                                            'browse', 
                                            'lawmakers_with_twitter_accounts', 
                                            'view', 
                                            'campaign_cost',
                                            'industry_by_race',
                                            'search'
                                            );
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
   
        //$current_congress = $this->Lawmaker->getCurrentCongress();
        $webuser = $this->Session->read('current_webuser');
        $state = strtolower($webuser->region);
        $current_congress = $this->Lawmaker->getCongressMembersByState($state);
        $this->set('current_congress', $current_congress);
        $fedSpendingSummary = $this->Fedspending->getFedSpendingSummary($state);
        $this->set('fedSpending', $fedSpendingSummary);

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
            $this->paginate['Lawmaker'] = array('limit' => '28' ); 
            if(isset($by)) { 
                switch($by) {
                    case 'state' :
                        $this->paginate['Lawmaker']['conditions'] = "state = '{$value}'";
                        break;
                    case 'party' :
                        $this->paginate['Lawmaker']['conditions'] = "party = '{$value}'";
                        break;
                    case 'letter' :
                        $this->paginate['Lawmaker']['conditions'] = "firstname like '{$value}%'";
                        break;
                    case 'house' :
                        $this->paginate['Lawmaker']['conditions'] = "congress_office like '%House%'";
                        break;
                    case 'senate' :
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
        if(!isset($this->params['username'])) {

            if(!$id) {
                $this->redirect('/');
                exit();
            }
        }

        if(isset($this->params['username'])) {
            $id = $this->Lawmaker->getProfileIdByName($this->params['username']);
        }
        
        $this->Zend->startup();
        $_cache = $this->Zend->cache();
        //require APP . 'vendors' . DS .'JSON.php';
        //$json = new Services_JSON();
        $lawmaker = $this->Lawmaker->read(null, $id);
        $_year = date("Y")-1;
        $cid = $lawmaker['Lawmaker']['crp_id'];
        $state = $lawmaker['Lawmaker']['state'];
        $party = $lawmaker['Lawmaker']['party'];
        
        $fedSpendingSummary = $this->Fedspending->getFedSpendingSummary($state);
        $this->set('fedSpending', $fedSpendingSummary);

        $profile_top_friends = $this->Lawmaker->getProfileTopFriends($state, $party, $id, '4');
        $profile_friends = $this->Lawmaker->getProfileFriends($state, $party, $id);

        $this->set('profile_top_friends', $profile_top_friends);
        $this->set('profile_friends', $profile_friends);

        
        $candSummary = $this->Opensecrets->candSummary($cid, $_year, 'xml');
        $candContrib = $this->Opensecrets->candContrib($cid, $_year,'xml');
        $candIndustry = $this->Opensecrets->candIndustry($cid, $_year,'xml');
        $candSector = $this->Opensecrets->candSector($cid, $_year,'xml');
        $this->set('candSummary', $candSummary);
        $this->set('candContrib', $candContrib);
        $this->set('candIndustry', $candIndustry);
        $this->set('candSector', $candSector);
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
    
    function campaign_cost()
    {
    }

    function industry_by_race()
    {
    }

    function industry()
    {
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
