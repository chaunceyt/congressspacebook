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

class IndustriesController extends AppController {

	var $name = 'Industries';
    /**
     * Property used to store list of helpers used by this controller's actions' views
     *
     * @access public
     * @var string List of helpers used by this controller's actions' views
     */
    var $helpers = array('Html', 'Form');

    /**
     * Property used to store list of components used by this controller's actions
     *
     * @access public
     * @var string List of components used by this controller's actions
     */
    var $components = array('Zend', 'Mashup');

    /**
     * Method called automatically before each action execution
     *
     * @access public
     */

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


	function index() 
    {
        $this->pageTitle = 'The Influencers';

		$this->Industry->recursive = 0;

        if(isset($this->params['query'])) {
            $url_params = explode(':',$this->params['query']);
            $this->set('query_url', $this->params['query']);

            $query = str_replace('*','/',$url_params[1]);
            if($url_params[0] == 'industry') {
                $conditions = array('industry =' => $query);
                $section = $query;
                
            }
            else if($url_params[0] == 'sector') {
                $conditions = array('sector =' => $query);
                $section = $query;
            }
            else {
            }
            $this->paginate['Industry'] = array(
                    'conditions' => $conditions,
                    'order' => array('Industry.catname' => 'asc'),
                    'limit' => '10',
                    );
        }
        else {
            $this->paginate['Industry'] = array(
                    'order' => array('Industry.catname' => 'asc'),
                    'limit' => '10',
                    );

        }
        $this->set('section', $section);
		$this->set('industries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Industry.', true));
			$this->redirect(array('action'=>'index'));
		}
        $industry = $this->Industry->read(null, $id);
        $data_rpt_url = 'http://www.opensecrets.org/industries/indus.php?ind='.$industry['Industry']['catorder'];
        $rpt_data = $this->Industry->get_remote_file($data_rpt_url);
        preg_match('#<table class=\'datadisplay\'>(.*?)<\/table>#i',$rpt_data['content'], $results);
        $this->set('data_rpt_url',$data_rpt_url);
        $this->set('data_rpt', $results[0]);
        
        $summary_url = 'http://www.opensecrets.org/industries/summary.php?cycle=2008&ind'.$industry['Industry']['catorder'];
        $summary_data = $this->Industry->get_remote_file($summary_url);
        preg_match_all('#<table class=\'datadisplay\'>(.*?)<\/table>#i',$summary_data['content'], $summary_results);
        $this->set('summary_results', $summary_results[0]);

        $recips_url = 'http://www.opensecrets.org/industries/recips.php?cycle=2008&ind='.$industry['Industry']['catorder'];
        $recips_data = $this->Industry->get_remote_file($recips_url);
        preg_match_all('#<table class=\'datadisplay\'>(.*?)<\/table>#i',$recips_data['content'], $recips_results);
        $this->set('summary_recips', $recips_results[0][0]);
        
        $pacrecips_url = 'http://www.opensecrets.org/industries/pacrecips.php?cycle=2008&ind='.$industry['Industry']['catorder'];
        $pacrecips_data = $this->Industry->get_remote_file($pacrecips_url);
        preg_match_all('#<table class=\'datadisplay\'>(.*?)<\/table>#i',$pacrecips_data['content'], $recips_results);
        $this->set('summary_pacrecips', $pacrecips_results[0][0]);
        


		$this->set('industry', $industry);
	}

}
?>
