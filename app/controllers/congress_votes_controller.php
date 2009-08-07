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
    var $uses = array();
    /**
     * beforeFilter 
     * 
     * @access public
     * @return void
     */
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'search');
        parent::beforeFilter();
    }

    /**
     * index 
     * 
     * @access public
     * @return void
     */
	function index() {
        $this->CongressVote =& ClassRegistry::init('CongressVote');
        $this->paginate['CongressVote']['order'] = 'CongressVote.vote_id DESC';
        $this->paginate['CongressVote']['limit'] = '10';
		$this->CongressVote->recursive = 0;
		$this->set('congressVotes', $this->paginate());
	}

	function search() {

        $this->CongressVote =& ClassRegistry::init('CongressVote');
        if(isset($this->params['form'])) {

            if (isset($this->params['form']['args'])) { 
                $args = $this->params['form']['args'];
                $this->Session->write('_args',$args);
            }
        }
        if($this->Session->check('_args')) {
            $args = $this->Session->read('_args');
        }

        if(empty($args)) {
            $this->redirect('/congress_votes');
            exit;
        }
        $this->paginate['CongressVote']['conditions'] = "MATCH(vote_title,vote_bill_title,vote_bill) AGAINST ('".$args."')";
        
        $this->paginate['CongressVote']['order'] = 'CongressVote.vote_id DESC';
        $this->paginate['CongressVote']['limit'] = '10';
		$this->CongressVote->recursive = 0;
		$this->set('congressVotes', $this->paginate());
	}

}
?>
