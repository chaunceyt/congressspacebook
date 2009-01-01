<?php
class LawmakersController extends AppController {

	var $name = 'Lawmakers';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }

	function index() {
		$this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));
        $this->paginate['Lawmaker'] = array('limit' => '25' ); 
		$this->set('lawmakers', $this->paginate());
	}

	function lawmakers_with_twitter_accounts() {
		$this->Lawmaker->recursive = 0;
        //$conditions = array('twitter_id' ));
        $conditions = array('conditions' => "twitter_id != ' '" ); 
        //$conditions = array('Lawmaker.twitter_id != ' => $conditions);
		$this->set('lawmakers', $this->Lawmaker->find('all', $conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Lawmaker.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lawmaker', $this->Lawmaker->read(null, $id));
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
