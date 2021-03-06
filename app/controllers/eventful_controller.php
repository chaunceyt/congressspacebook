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

class EventfulController extends AppController 
{

    /**
     * Property used to store name of controller
     *
     * @access public
     * @var string Name of controller
     */    
    var $name = 'Eventful';

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
     * Method used to get eventful results based on keyword
     *
     * @access public
     */

    function index()
    {
        //$this->autoRender=false;
        $keyword = $this->params['keyword'];
        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page = 1;
        }
        $_cache = $this->Zend->cache();

        $events_key = md5('events_key_'.$keyword.$page);
        if(!$events = $_cache->load($events_key)) {
            $events = $this->Mashup->eventfulSearch($keyword, $page);
            $_cache->save($events, $events_key, array(), (86400*3));
        }

        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $events->page_count .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            //$_numList .= '<a href="./events?keyword='.$_keyword.'&page='.$pnum.'">'.$pnum.'</a>&nbsp;';
            $_numList .= '<a href="'.Router::url('/eventful/'.$keyword.'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }

        $firstpage = '<a href="'.Router::url('/eventful/'.$keyword).'/1">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/eventful/'.$keyword.'/'.$events->page_count).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('EventsPagination', $pagenotice.$nextpage);
        }
        else if($page == $events->page_count) {
            $this->set('EventsPagination',$firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('EventsPagination', $pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }
        $this->set('EventsTotal',$events->total_items);
        $this->set('eventResults',$events->events->event);
        $this->set('keyword' , $keyword);
        
    }
}
