<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }


	function index() {
        echo $this->Account->currentUserId;
		$this->Account->recursive = 0;
        $conditions = array('Account.identity_id' => $this->Account->currentUserId);
        $this->paginate['Account'] = array('conditions' => $conditions);
		$this->set('accounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Account.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('account', $this->Account->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Account->create();
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The Account has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Account could not be saved. Please, try again.', true));
			}
		}
		//$identities = $this->Account->User->find('list');
		$services = $this->Account->Service->find('list');
		//$serviceTypes = $this->Account->ServiceType->find('list');
        $this->set('userId', $this->Account->currentUserId);
		$this->set('services', $services);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Account', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The Account has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		$identities = $this->Account->Identity->find('list');
		$services = $this->Account->Service->find('list');
		$serviceTypes = $this->Account->ServiceType->find('list');
		$this->set(compact('identities','services','serviceTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Account->del($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
