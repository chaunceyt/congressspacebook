<?php
class CongressBillsController extends AppController {

    /**
     * name 
     * 
     * @var string
     * @access public
     */
	var $name = 'CongressBills';
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
        $this->Auth->allowedActions = array('index', 'view', 'search');
        parent::beforeFilter();
    }


    /**
     * index 
     * 
     * @access public
     * @return void
     */
	function index() {
        $this->CongressBill =& ClassRegistry::init('CongressBill');

        $this->paginate['CongressBill']['order'] = 'CongressBill.bill_num DESC';
        $this->paginate['CongressBill']['limit'] = '20';
		$this->CongressBill->recursive = 0;
		$this->set('congressBills', $this->paginate());
	}


    function search() {

        $this->CongressBill =& ClassRegistry::init('CongressBill');
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
            $this->redirect('/congress_bills');
            exit;
        }
        $this->paginate['CongressBill']['conditions'] = "MATCH(bill_title,bill_official_title) AGAINST ('".$args."')";

        $this->paginate['CongressBill']['order'] = 'CongressBill.id DESC';
        $this->paginate['CongressBill']['limit'] = '10';
        $this->CongressBill->recursive = 0;
        $this->set('congressBills', $this->paginate());
    }


}
?>
