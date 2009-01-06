<?php
class LobbyistsIssuesController extends AppController {

	var $name = 'LobbyistsIssues';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }
    
	function index() {
		$this->LobbyistsIssue->recursive = 0;
		$this->set('lobbyistsIssues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid LobbyistsIssue.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lobbyistsIssue', $this->LobbyistsIssue->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LobbyistsIssue->create();
			if ($this->LobbyistsIssue->save($this->data)) {
				$this->Session->setFlash(__('The LobbyistsIssue has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The LobbyistsIssue could not be saved. Please, try again.', true));
			}
		}
		$lobbyistsFilings = $this->LobbyistsIssue->LobbyistsFiling->find('list');
		$this->set(compact('lobbyistsFilings'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid LobbyistsIssue', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->LobbyistsIssue->save($this->data)) {
				$this->Session->setFlash(__('The LobbyistsIssue has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The LobbyistsIssue could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LobbyistsIssue->read(null, $id);
		}
		$lobbyistsFilings = $this->LobbyistsIssue->LobbyistsFiling->find('list');
		$this->set(compact('lobbyistsFilings'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for LobbyistsIssue', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LobbyistsIssue->del($id)) {
			$this->Session->setFlash(__('LobbyistsIssue deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
