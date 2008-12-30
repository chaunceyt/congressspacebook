<?php

class FlickrController extends AppController {

    var $name = 'Flickr';
    var $helpers = array('Html', 'Form', 'Mashup');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        //$this->autoRender=false;
        $keyword = $this->params['keyword'];
        $page = $this->params['page'];

        if(isset($this->params['page'])) {
            $page = $this->params['page'];
        }
        else {
            $page = 1;
        }
        $totalpages = $this->Mashup->flickrImagePageTotal($keyword, $page);
        $totalimages = $this->Mashup->flickrImageTotal($keyword, $page);

        $flickrSearchCacheKey = md5('FLICKRSEARCH'.md5($keyword).$page);
        /* Flickr Search */
        $flickrSearchCacheKey = md5('FLICKRSEARCH'.md5($keyword).$page);
        $flickrSearch = $this->Mashup->flickrSearch($keyword,$page);
        /*
        if(!$flickrSearch = $this->_cache->load($flickrSearchCacheKey)) {
            $flickrSearch = $mashup->flickrSearch();
            $this->_cache->save($flickrSearch, $flickrSearchCacheKey, array(), (86400*3));
        }
        */

        $_nextpage = $page + 1;
        $_prevpage = $page - 1;
        $pagenotice = 'Page &nbsp;&nbsp;'.$page .' of ' . $totalpages .'&nbsp;&nbsp;';

        $numList = $page + 5;
        $_numList ='';
        for($i=1; $i < 6; $i++) {
            $pnum = $page + $i;
            $_numList .= '<a href="'.Router::url('/flickr/'.urlencode($keyword).'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }
        //fixme: url routes
        $firstpage = '<a href="'.Router::url('/flickr/'.urlencode($keyword).'/1').'">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/flickr/'.urlencode($keyword).'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/flickr/'.urlencode($keyword).'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/flickr/'.urlencode($keyword).'/'.$totalpages).'">Last </a>&nbsp;';

        if($page == 1) {
            $this->set('FlickrPagination',$pagenotice.$nextpage);
        }
        else if($page == $totalpages) {
            $this->set('FlickrPagination',$firstpage.$prevpage.$pagenotice);
            //$this->view->FlickrPagination = $firstpage.$prevpage.$pagenotice;
        }
        else {
            $this->set('FlickrPagination',$pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
            //$this->view->FlickrPagination = $pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage;
        }
        $this->set('FlickrTotalImageCount', $totalimages);
        //$this->view->FlickrTotalImageCount = $totalimages;
        $this->set('FlickrSearch', $flickrSearch);
        $this->set('keyword',$keyword);
        //$this->view->FlickrSearch = $flickrSearch;
    }

    function image()
    {
        $id = $this->params['id'];
        $image_info = $this->Mashup->flickrImageInfo($id);
        
        //fixme: Notice $image_info->author[0]
        $user_id = $this->Mashup->flickrFindByUsername(@$image_info->author[0]);
        $this->set('imageInfo',$image_info);
        $this->set('ImageOwner', $user_id);
    }
}
