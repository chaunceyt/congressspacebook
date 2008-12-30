<?php

class EventfulController extends AppController {

    var $name = 'Eventful';
    var $helpers = array('Html', 'Form');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

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
        $events = $this->Mashup->eventfulSearch($keyword, $page);
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
