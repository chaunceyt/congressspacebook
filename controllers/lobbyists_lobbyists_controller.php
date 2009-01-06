<?php
class LobbyistsLobbyistsController extends AppController {

	var $name = 'LobbyistsLobbyists';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


	function index() {
		$this->LobbyistsLobbyist->recursive = 0;
		$this->set('lobbyistsLobbyists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid LobbyistsLobbyist.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lobbyistsLobbyist', $this->LobbyistsLobbyist->read(null, $id));
	}

}
?>
