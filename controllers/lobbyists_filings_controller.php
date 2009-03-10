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
        if(!isset($this->params['client'])) {
            if(isset($this->params['pass'][0])) {
                $client = $this->params['pass'][0];
            }
        }
        else {
            $client = $this->params['client'];
        }
        $conditions = array('LobbyistsFiling.client_name = ' => $client);
        $this->paginate['LobbyistsFiling'] = array(
                'conditions' => $conditions,
                'order' => array('filing_amount' => 'desc'),'limit' => '20');
        $this->set('client', $client);
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
