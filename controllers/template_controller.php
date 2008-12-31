<?php

class MashupController extends AppController {

    var $name = 'Mashup';
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
        $this->autoRender=false;
        $yahooImages = $this->Mashup->yahooImageSearch($keyword);
    }
}
