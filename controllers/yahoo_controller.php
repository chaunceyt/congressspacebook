<?php

class YahooController extends AppController 
{
    /**
     * Property used to store name of controller
     *
     * @access public
     * @var string Name of controller
     */
    var $name = 'Yahoo';

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
     * Property used to store list of models used by this controller's actions
     *
     * @access public
     * @var string List of components used by this controller's actions
     */
    var $uses = array();

    /**
     * Method called automatically before each action execution
     *
     * @access public
     */
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }

    /**
     * Method used to get yahoo results
     *
     * @access public
     * @param string $keyword via $this->params['keyword']
     */
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
