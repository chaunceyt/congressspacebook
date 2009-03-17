<?php
class CongressVotesController extends AppController {

    /**
     * name 
     * 
     * @var string
     * @access public
     */
	var $name = 'CongressVotes';

    /**
     * helpers 
     * 
     * @var string
     * @access public
     */
	var $helpers = array('Html', 'Form');

    /**
     * beforeFilter 
     * 
     * @access public
     * @return void
     */
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }

    /**
     * index 
     * 
     * @access public
     * @return void
     */
	function index() {
        $this->paginate['CongressVote']['order'] = 'CongressVote.vote_id DESC';
        $this->paginate['CongressVote']['limit'] = '20';
		$this->CongressVote->recursive = 0;
		$this->set('congressVotes', $this->paginate());
	}

}
?>
