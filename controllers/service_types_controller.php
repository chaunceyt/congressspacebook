<?php
/**
 * File used as application controller
 *
 * Contains actions for application controller
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Controller class containing application controller's actions
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */


class ServiceTypesController extends AppController {

	var $name = 'ServiceTypes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ServiceType->recursive = 0;
		$this->set('serviceTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ServiceType.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('serviceType', $this->ServiceType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ServiceType->create();
			if ($this->ServiceType->save($this->data)) {
				$this->Session->setFlash(__('The ServiceType has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ServiceType could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ServiceType', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceType->save($this->data)) {
				$this->Session->setFlash(__('The ServiceType has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ServiceType could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ServiceType', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceType->del($id)) {
			$this->Session->setFlash(__('ServiceType deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
