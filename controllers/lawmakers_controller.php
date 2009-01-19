<?php
class LawmakersController extends AppController {

    var $name = 'Lawmakers';
    var $components = array('Opensecrets', 'Fedspending', 'Zend', 'Govtrack');
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
                                            'bill',
                                            'search'
                                            );
        parent::beforeFilter();
    }

    function index() 
    {
        //setup zend cache
        $_cache = $this->Zend->cache();


        $this->Lawmaker->recursive = 0;
   
        $leaders_congress = $this->Lawmaker->getCurrentCongress();
        $this->set('leaders_congress', $leaders_congress);
        $webuser = $this->Session->read('current_webuser');
        $state = strtolower($webuser->region);
        
        /* get congress members by state: cache since data isn't going to change*/
        $current_congress_key = md5('current_congress_key_'.$state);
        if(!$current_congress = $_cache->load($current_congress_key)) {
            $current_congress = $this->Lawmaker->getCongressMembersByState($state);
            $_cache->save($current_congress, $current_congress_key, array(), (86400*3));
        }
        $this->set('current_congress', $current_congress);

        /* cache support built into fedspending component */
        $fedSpendingSummary = $this->Fedspending->getFedSpendingSummary($state);
        $this->set('fedSpending', $fedSpendingSummary);

        /* cache the state array since we don't need it that often*/
        $stateTagCloud_key = md5('state_tag_cloud_key');
        if(!$stateTagCloud = $_cache->load($stateTagCloud_key)) {
            $stateTagCloud = $this->Lawmaker->stateTagCloud();
            $_cache->save($stateTagCloud, $stateTagCloud_key, array(), (86400*3));
        }
        $this->set('stateTagCloud', $stateTagCloud);
        
        /* get party tagcloud cache it since it's not going to change unless I update the db*/
        $partyTagCloud_key = md5('party_tag_cloud_key');
        if(!$partyTagCloud = $_cache->load($partyTagCloud_key)) {
            $partyTagCloud = $this->Lawmaker->partyTagCloud();
            $_cache->save($partyTagCloud, $partyTagCloud_key, array(), (86400*3));
        }
        $this->set('partyTagCloud', $partyTagCloud);
       
        /* get gender tag cloud and cache it.*/
        //fixme: check view to see if we're using this method.
        $genderTagCloud_key = md5('gender_tag_cloud_key');
        if(!$genderTagCloud = $_cache->load($genderTagCloud_key)) {
            $genderTagCloud = $this->Lawmaker->genderTagCloud();
            $_cache->save($genderTagCloud, $genderTagCloud_key, array(), (86400*3));
        }
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

        if(isset($this->params['page'])) {
            switch($this->params['page']) {
                case 'contributors' :
                    $_page = 'contributors';
                    break;
                case 'sectors' :
                    $_page = 'sectors';
                    break;
                case 'fedspending' :
                    $_page = 'fedspending';
                    break;
                case 'industries' :
                    $_page = 'industries';
                    break;
                case 'history' :
                    $_page = 'history';
                    break;
                case 'bills' :
                    $_page = 'bills';
                    break;
                case 'wall' :
                    $_page = 'wall';
                    break;
                case 'fundraising' :
                    $_page = 'fundraising';
                    break;
                default :
                    $_page = 'default';
            }
            $this->set('_page_', $_page);
        }
        
        $_cache = $this->Zend->cache();

        //let's get this lawmaker
        /* cache lawmaker no need to keep hitting the database */
        $lawmaker_key = md5('lawmaker_key_'.$id);
        if(!$lawmaker = $_cache->load($lawmaker_key)) {
            $lawmaker = $this->Lawmaker->read(null, $id);
            $_cache->save($lawmaker, $lawmaker_key, array(), (84600*3));
        }

        //we always want to get last years data - ??
        //fixme: rethink this..
        $_year = date("Y")-1;

        $cid = $lawmaker['Lawmaker']['crp_id'];
        $state = $lawmaker['Lawmaker']['state'];
        $party = $lawmaker['Lawmaker']['party'];
        
        /* cache built into fedspending component */
        $fedSpendingSummary = $this->Fedspending->getFedSpendingSummary($state);
        $this->set('fedSpending', $fedSpendingSummary);

        $govtrack_results = $this->Govtrack->getPerson($lawmaker['Lawmaker']['govtrack_id'], '110');
        $this->set('govtrack_results', $govtrack_results);

        /* we want to cache the top friends it's not going to change until a database update */
        $profile_top_friends_key = md5('profile_top_friends_key_'.$state.$party.$id);
        if(!$profile_top_friends = $_cache->load($profile_top_friends_key)) {
            $profile_top_friends = $this->Lawmaker->getProfileTopFriends($state, $party, $id, '4');
            $_cache->save($profile_top_friends, $profile_top_friends_key, array(), (86400*3));
        }

        $profiles_friends_key = md5('profile_friends_key_'.$state.$party.$id);
        if(!$profile_friends = $_cache->load($profiles_friends_key)) {
            $profile_friends = $this->Lawmaker->getProfileFriends($state, $party, $id);
            $_cache->save($profile_friends, $profiles_friends_key, array(), (86400*3));
        }

        $this->set('profile_top_friends', $profile_top_friends);
        $this->set('profile_friends', $profile_friends);

        /* cache built into component */        
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

    function bill($id=null)
    {
        list($session, $type, $number) = explode('-', $id);
        $bill_path = '/home/govtrack/data/us/'.$session.'/'.$type.'/'.$type.$number.'.txt';
        $raw_text = file_get_contents($bull_path);
        $utf8_text = iconv( $encoding, "utf-8", $raw_text );
        $data = html_entity_decode( $utf8_text, ENT_QUOTES, "utf-8" ); 
        $this->set('data', $data);

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

