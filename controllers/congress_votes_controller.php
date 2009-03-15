<?php
class CongressVotesController extends AppController {

	var $name = 'CongressVotes';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }

	function index() {
        $this->paginate['CongressVote']['order'] = 'CongressVote.vote_id DESC';
        $this->paginate['CongressVote']['limit'] = '20';
		$this->CongressVote->recursive = 0;
		$this->set('congressVotes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid CongressVote.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('congressVote', $this->CongressVote->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CongressVote->create();
			if ($this->CongressVote->save($this->data)) {
				$this->Session->setFlash(__('The CongressVote has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressVote could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid CongressVote', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->CongressVote->save($this->data)) {
				$this->Session->setFlash(__('The CongressVote has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressVote could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CongressVote->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for CongressVote', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CongressVote->del($id)) {
			$this->Session->setFlash(__('CongressVote deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
