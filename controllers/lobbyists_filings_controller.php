<?php
class LobbyistsFilingsController extends AppController {

	var $name = 'LobbyistsFilings';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


	function index() {
		$this->LobbyistsFiling->recursive = 0;
        $this->paginate['LobbyistsFiling'] = array('order' => array('filing_amount' => 'desc'),'limit' => '50');
		$this->set('lobbyistsFilings', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid LobbyistsFiling.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lobbyistsFiling', $this->LobbyistsFiling->read(null, $id));
	}

}
?>
