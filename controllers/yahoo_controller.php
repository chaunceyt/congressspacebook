<?php

class YahooController extends AppController {

    var $name = 'Yahoo';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        echo '<pre>';
        $this->autoRender=false;
        $keyword = $this->params['keyword'];
        //$yahooImages = $this->Mashup->yahooImageSearch($keyword);
        $t = $this->Mashup->youtubeSearch($keyword);
        print_r($t);
    }
}
