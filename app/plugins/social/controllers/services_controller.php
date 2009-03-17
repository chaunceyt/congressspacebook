<?php
class ServicesController extends AppController {

	var $name = 'Services';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Service->recursive = 0;
		$this->set('services', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Service.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('service', $this->Service->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Service->create();
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(__('The Service has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Service could not be saved. Please, try again.', true));
			}
		}
		$serviceTypes = $this->Service->ServiceType->find('list');
		$this->set(compact('serviceTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Service', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(__('The Service has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Service could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Service->read(null, $id);
		}
		$serviceTypes = $this->Service->ServiceType->find('list');
		$this->set(compact('serviceTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Service', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Service->del($id)) {
			$this->Session->setFlash(__('Service deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>