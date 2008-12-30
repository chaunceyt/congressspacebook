<?php

class MashupController extends AppController {

    var $name = 'Mashup';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        $this->autoRender=false;
        $yahooImages = $this->Mashup->yahooImageSearch($keyword);
    }
}
