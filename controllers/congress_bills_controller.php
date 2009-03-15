<?php
class CongressBillsController extends AppController {

	var $name = 'CongressBills';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


	function index() {
        $this->paginate['CongressBill']['order'] = 'CongressBill.bill_num DESC';
        $this->paginate['CongressBill']['limit'] = '20';
		$this->CongressBill->recursive = 0;
		$this->set('congressBills', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid CongressBill.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('congressBill', $this->CongressBill->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CongressBill->create();
			if ($this->CongressBill->save($this->data)) {
				$this->Session->setFlash(__('The CongressBill has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressBill could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid CongressBill', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->CongressBill->save($this->data)) {
				$this->Session->setFlash(__('The CongressBill has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressBill could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CongressBill->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for CongressBill', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CongressBill->del($id)) {
			$this->Session->setFlash(__('CongressBill deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
