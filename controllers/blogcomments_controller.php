<?php

class BlogcommentsController extends AppController {

    var $name = 'Blogcomments';
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

        $blogcomments = $this->Mashup->searchBacktype($keyword, $page);
        
        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        //fixme: get total results and calulate pages
        $totalpages = 5;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $totalpages .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList ='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            $_numList .= '<a href="'.Router::url('/comments/'.urlencode($keyword).'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }
        //fixme: url routes
        $firstpage = '<a href="'.Router::url('/comments/'.urlencode($keyword).'/1').'">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/comments/'.urlencode($keyword).'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/comments/'.urlencode($keyword).'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/comments/'.urlencode($keyword).'/'.$totalpages).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('CommentsPagination',$pagenotice.$nextpage);
        }
        else if($page == $totalpages) {
            $this->set('CommentsPagination',$firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('CommentsPagination',$pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }

        
        $this->set('blogcomments',$blogcomments);
        $this->set('keyword', $keyword);
        //echo '<pre>';
        //print_r($blogcomments);
    }
}
