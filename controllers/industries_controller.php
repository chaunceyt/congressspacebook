<?php
class IndustriesController extends AppController {

	var $name = 'Industries';
	var $helpers = array('Html', 'Form');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index', 'view');
        parent::beforeFilter();
    }


	function index() {
		$this->Industry->recursive = 0;

        if(isset($this->params['query'])) {
            $url_params = explode(':',$this->params['query']);
            $query = str_replace('*','/',$url_params[1]);
            print_r($url_params);
            if($url_params[0] == 'industry') {
                $conditions = array('industry =' => $query);
            }
            else if($url_params[0] == 'sector') {
                $conditions = array('sector =' => $query);
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
        
        $summary_url = 'http://www.opensecrets.org/industries/summary.php?cycle=2008&ind=Q14';
        $summary_data = $this->Industry->get_remote_file($summary_url);
        preg_match_all('#<table class=\'datadisplay\'>(.*?)<\/table>#i',$rpt_data['content'], $results);


		$this->set('industry', $industry);
	}

}
?>
