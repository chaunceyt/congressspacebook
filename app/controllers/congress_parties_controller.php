<?php
//Configure::write('debug', 1);
class CongressPartiesController extends AppController {

	var $name = 'CongressParties';
    var $components = array('RequestHandler');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'search');
        parent::beforeFilter();
    }


	function index($member=null) {
	    $this->CongressParty =& ClassRegistry::init('CongressParty');
        if($member) {
            //print_r($this->CongressParty->getEventInvites($member));
            $member_str = str_replace('_',' ',$member);
            //$this->paginate['CongressParty']['conditions'] = "MATCH(Beneficiary, Other_Members) AGAINST ('".$member_str."')";
            $this->paginate['CongressParty']['conditions'] = "Beneficiary LIKE '%".$member_str."%' OR Other_Members LIKE '%".$member_str."%'";
        }
            $this->CongressParty->recursive = 0;
            $this->paginate['CongressParty']['limit'] = 1;
            $this->paginate['CongressParty']['order'] = 'id DESC';
		    $this->set('congressParties', $this->paginate());
	}

	function search() {
	    
        $this->CongressParty =& ClassRegistry::init('CongressParty');
        if(isset($this->params['form'])) {
            
            if (isset($this->params['form']['field'])) { 
                $field = $this->params['form']['field']; 
                $this->Session->write('_field',$field);
            }

            if (isset($this->params['form']['args'])) { 
                $args = $this->params['form']['args']; 
                $this->Session->write('_args',$args);
            }
        }
        if($this->Session->check('_field') && $this->Session->check('_args')) {
            $field = $this->Session->read('_field');
            $args = $this->Session->read('_args');
        }
        
        if(empty($field) || empty($args)) {
            $this->redirect('/congress_parties');
            exit;
        }

        $this->paginate['CongressParty']['conditions'] = $field ." LIKE '%".$args."%'";
        $this->CongressParty->recursive = 0;
        $this->paginate['CongressParty']['limit'] = 1;
		$this->set('congressParties', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid CongressParty.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('congressParty', $this->CongressParty->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CongressParty->create();
			if ($this->CongressParty->save($this->data)) {
				$this->Session->setFlash(__('The CongressParty has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressParty could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid CongressParty', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->CongressParty->save($this->data)) {
				$this->Session->setFlash(__('The CongressParty has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressParty could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CongressParty->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for CongressParty', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CongressParty->del($id)) {
			$this->Session->setFlash(__('CongressParty deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
