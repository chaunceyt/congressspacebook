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

class FriendfeedController extends AppController {

    var $name = 'Friendfeed';
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
        //$this->autoRender=false;
        App::import('vendor','friendfeed');
        $friendfeed = new Friendfeed;
        //search($query, $service=null, $start=0, $num=30)
        $keyword = $this->params['keyword'];
        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page =1;
        }
        $results = $friendfeed->search($keyword, null, $page);

        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        $totalpages = 7;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $totalpages .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList ='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            $_numList .= '<a href="'.Router::url('/friendfeed/'.urlencode($keyword).'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }
        //fixme: url routes
        $firstpage = '<a href="'.Router::url('/friendfeed/'.urlencode($keyword).'/1').'">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/friendfeed/'.urlencode($keyword).'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/friendfeed/'.urlencode($keyword).'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/friendfeed/'.urlencode($keyword).'/'.$totalpages).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('FriendfeedPagination',$pagenotice.$nextpage);
        }
        else if($page == $totalpages) {
            $this->set('FriendfeedPagination',$firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('FriendfeedPagination',$pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }
        
        //echo '<pre>';
        //print_r($results);
        $this->set('FriendFeed', $results);
        $this->set('keyword', $keyword);


    }
}
