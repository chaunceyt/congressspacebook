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

class TechnoratiController extends AppController 
{
     /**
     * Property used to store name of controller
     *
     * @access public
     * @var string Name of controller
     */
    var $name = 'Technorati';

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
     * @var string List of models used by this controller's actions
     */
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
