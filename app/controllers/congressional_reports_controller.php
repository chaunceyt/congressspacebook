<?php
class CongressionalReportsController extends AppController {

	var $name = 'CongressionalReports';
	var $helpers = array('Html', 'Form');

    var $components = array('Zend', 'Mashup');

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }


	function index() {
        $Lawmaker = ClassRegistry::init('Lawmaker'); 
        $this->paginate['CongressionalReport']['limit'] = 1;
		$this->CongressionalReport->recursive = 0;
        $reports = $this->paginate();
		$this->set('congressionalReports', $reports);
        //print_r($reports);
        $file_location = '/home/govtrack/data/us/111/cr/';
        $_xmlfile = $file_location.$reports[0]['CongressionalReport']['filename'];

        if(($xmlfile = file_get_contents($_xmlfile)) === false) {
            //return false;

        }
        $xml = simplexml_load_string($xmlfile);
        $_lawmaker = $xml->speaking->attributes()->speaker;
        $lawmaker = $Lawmaker->getProfileByGovtrackId($_lawmaker);
        $this->set('lawmaker', $lawmaker);
		$this->set('xml', $xml);

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid CongressionalReport.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('congressionalReport', $this->CongressionalReport->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CongressionalReport->create();
			if ($this->CongressionalReport->save($this->data)) {
				$this->Session->setFlash(__('The CongressionalReport has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressionalReport could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid CongressionalReport', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->CongressionalReport->save($this->data)) {
				$this->Session->setFlash(__('The CongressionalReport has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The CongressionalReport could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CongressionalReport->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for CongressionalReport', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CongressionalReport->del($id)) {
			$this->Session->setFlash(__('CongressionalReport deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
