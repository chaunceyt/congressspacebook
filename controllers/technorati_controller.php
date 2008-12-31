<?php

class TechnoratiController extends AppController {

    var $name = 'Technorati';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }
    
    function index()
    {
        $keyword = $this->params['keyword'];
        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page = 1;
        }
        $technoratiSearch = $this->Mashup->technoratiSearch($keyword, $page);
        $this->set('keyword', $keyword);
        $this->set('TechnoratiSearch', $technoratiSearch);
    }
}
