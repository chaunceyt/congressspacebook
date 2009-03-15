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

    /**
     * beforeFilter 
     * 
     * @access public
     * @return void
     */
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


    /**
     * index 
     * 
     * @access public
     * @return void
     */
	function index() {
        $this->paginate['CongressBill']['order'] = 'CongressBill.bill_num DESC';
        $this->paginate['CongressBill']['limit'] = '20';
		$this->CongressBill->recursive = 0;
		$this->set('congressBills', $this->paginate());
	}

}
?>
