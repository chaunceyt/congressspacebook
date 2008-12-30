<?php

class YoutubeController extends AppController {

    var $name = 'Youtube';
    var $helpers = array('Html', 'Form', 'Javascript');
    var $components = array('Zend', 'Mashup');
    var $uses = array();

    function index()
    {
        $keyword = $this->params['keyword'];
        if(isset($this->params['page'])) {
            $_page = $this->params['page'];
        }
        else {
            $_page = 1;
        }

        $_per_page = '50';
        $_start = ($_per_page * $_page);
        $url = 'http://gdata.youtube.com/feeds/api/videos?format=1&vq='.urlencode($keyword).'&start-index=1&max-results=2&orderby=viewCount&alt=rss';

        $_total_response = file_get_contents($url);
        preg_match('#<openSearch:totalResults>(.*)</openSearch:totalResults>#', $_total_response, $matches);
        $pages = ($matches[1] / $_per_page);
        $youtubeSearch = $this->Mashup->youtubeSearch($keyword, $_per_page, $_start);

        $totalpages = number_format($pages,0);
        $_nextpage = $_page + 1;
        $_prevpage = $_page - 1;
        $pagenotice = 'Page &nbsp;&nbsp;'.$_page .' of ' . number_format($pages,0) .'&nbsp;&nbsp;';

        $numList = $_page + 5;
        $_numList ='';
        for($i=1; $i < 6; $i++) {
            $pnum = $_page + $i;
            $_numList .= '<a href="'.Router::url('/youtube/'.$keyword.'/'.$pnum).'">'.$pnum.'</a>&nbsp;';
        }
        
        $firstpage = '<a href="'.Router::url('/youtube/'.$keyword.'/1').'">Start </a>&nbsp;';
        $nextpage = '<a href="'.Router::url('/youtube/'.$keyword.'/'.$_nextpage).'">Next </a>&nbsp;';
        $prevpage = '<a href="'.Router::url('/youtube/'.$keyword.'/'.$_prevpage).'">Prev </a>&nbsp;';
        $lastpage = '<a href="'.Router::url('/youtube/'.$keyword.'/'.number_format($pages,0)).'">Last </a>&nbsp;';

        if($_page == 1) {
            $this->set('YoutubePagination', $pagenotice.$nextpage);
        }
        else if($_page == $totalpages) {
            $this->set('YoutubePagination', $firstpage.$prevpage.$pagenotice);
        }
        else {
            $this->set('YoutubePagination', $pagenotice.$firstpage.$prevpage.$_numList.$nextpage.$lastpage);
        }

        $this->set('keyword',$keyword);
        $this->set('TotalPages', $pages);
        $this->set('TotalVideos',number_format($matches[1],0));
        $this->set('YoutubeSearch', $youtubeSearch);
    }

    function video()
    {
        $videoId = $this->params['id'];
        $yt = new Zend_Gdata_YouTube();
        $entry = $yt->getVideoEntry($videoId);
        $this->set('videoTitle', $entry->mediaGroup->title);
        $this->set('description',$entry->mediaGroup->description);
        $this->set('authorUsername', $entry->author[0]->name);
        $this->set('authorUrl', 'http://www.youtube.com/profile?user=' . $entry->author[0]->name);
        $this->set('tags', $entry->mediaGroup->keywords);
        $this->set('duration', $entry->mediaGroup->duration->seconds);
        $this->set('watchPage', $entry->mediaGroup->player[0]->url);
        $this->set('viewCount', $entry->statistics->viewCount);
        $this->set('rating', $entry->rating->average);
        $this->set('numRaters', $entry->rating->numRaters);



        /* Get related Videos */
        $ytQuery = $yt->newVideoQuery();
        $ytQuery->setFeedType('related', $videoId);
        $ytQuery->setOrderBy('rating');
        $ytQuery->setMaxResults(5);
        $ytQuery->setFormat(5);
        $this->set('videoId', $videoId);
        $this->set('related', $yt->getVideoFeed($ytQuery));
        
    }
}
