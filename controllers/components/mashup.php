<?php
//@todo explain what each method does in doc style comments
class MashupComponent extends Object
{
    protected $api_yahoo = 'ih4iejbV34ET6Kh_cGtBwwY4lAqRe9jLsydmA2_q.be.f0.b0WPiLhRmAgtWOpapCEiJ6AI-';
    protected $api_flickr = '66828c4ecc3b97fa1b971a28de4eead8';
    protected $api_technorati = 'bdce8489d872bf53f36ff56d95839820';
    //friendfeed = 'tea714wont'; //thezodiac
    /**
     * yahoo image search
     * http://developer.yahoo.com/search/image/V1/imageSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooImageSearch($keyword = null, $per_page = '20', $format = 'jpeg', $sort='rank',$output ='php')
    {
        $_keyword = (string) $keyword;
        $request = file_get_contents('http://search.yahooapis.com/ImageSearchService/V1/imageSearch?'.
                'appid='.$this->api_yahoo.
                '&query='.urlencode($_keyword).
                '&results='.$per_page.
                '&format='.$format.
                '&sort='.$sort.
                '&output='.$output
                );

        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        return unserialize($request);
    }

    /**
     * yahoo web search
     * http://developer.yahoo.com/search/web/V1/webSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooWebSearch($keyword = null, $per_page = '25', $sort = 'rank', $lang = 'en', $type = 'all', $output ='php')
    {
        $_keyword = $keyword;
        $request = file_get_contents('http://search.yahooapis.com/WebSearchService/V1/webSearch?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$per_page.
            '&sort='.$sort.
            '&language='.$lang.
            '&type='.$type.
            '&output='.$output
            );
        
        if(!$request) {
            throw new Exception("There was an error loading the yahooWebSearch Data");
        }
        return unserialize($request);
    }
    
    /**
     * yahoo news search
     * http://developer.yahoo.com/search/news/V1/newsSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooNewsSearch($keyword = null, $per_page = '20', $sort = 'rank', $lang = 'en', $type = 'all', $output ='php')
    {
        $_keyword = (string) $keyword;
        $request = file_get_contents('http://search.yahooapis.com/NewsSearchService/V1/newsSearch?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$per_page.
            '&sort='.$sort.
            '&language='.$lang.
            '&type='.$type.
            '&output='.$output
            );

        if(!$request) {
            throw new Exception("There was an error loading the yahooNewsSearch Data ");
        }
        return unserialize($request);

    }

    /**
     * yahoo video search
     * http://developer.yahoo.com/search/video/V1/videoSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooVideoSearch($keyword = null, $per_page = '20', $sort = 'rank', $lang = 'en', $type = 'all', $output ='php')
    {
        $_keyword = (string) $keyword;
        $request = file_get_contents('http://search.yahooapis.com/VideoSearchService/V1/videoSearch?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$per_page.
            '&sort='.$sort.
            '&language='.$lang.
            '&type='.$type.
            '&output='.$output
            );
        
        if(!$request) {
            throw new Exception("There was an error loading the yahooVideoSearch Data ");
        }
        return unserialize($request);
    }

    
    /**
     * yahoo artist search
     * http://developer.yahoo.com/search/audio/V1/artistSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooArtistSearch($keyword = null, $per_page = '20', $type = 'all', $output = 'php')
    {   
            $_keyword = (string) $keyword;
            $request = file_get_contents('http://search.yahooapis.com/AudioSearchService/V1/artistSearch?'.
            'appid='.$this->api_yahoo.
            '&artist='.urlencode($keyword).
            '&results='.$per_page.
            '&type='.$type.
            '&output='.$output
            );
        return unserialize($request);
    }

    /**
     * yahoo album search
     * http://developer.yahoo.com/search/audio/V1/albumSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooAlbumSearch($keyword = null, $per_page = '20', $sort = 'rank', $format = 'flash', $output = 'php')
    {
        $_keyword = (string) $keyword;
        $request = file_get_contents('http://search.yahooapis.com/AudioSearchService/V1/albumSearch?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$per_page.
            '&sort='.$sort.
            '&format='.$format.
            '&output='.$output
            );
        return unserialize($request);
    }

    /**
     * yahoo song search
     * http://developer.yahoo.com/search/audio/V1/songSearch.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooSongSearch()
    {
        if(is_null($keyword)) {
            $_keyword = $this->keyword;
        }
        else {
            $_keyword = $keyword;
        }
            $request = file_get_contents('http://search.yahooapis.com/AudioSearchService/V1/songSearch?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$this->per_page.
            '&sort=rank'.
            '&format=flash'.
            '&output=php'
            );
        
        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        return unserialize($request);
    }

    /**
     * yahoo song download location search
     * http://developer.yahoo.com/search/audio/V1/songDownloadLocation.html
     * @param string {keyword}
     * @returns array()
     */
    public function yahooSongDownloadLocation()
    {
        if(is_null($keyword)) {
            $_keyword = $this->keyword;
        }
        else {
            $_keyword = $keyword;
        }

            $request = file_get_contents('http://search.yahooapis.com/AudioSearchService/V1/songDownloadLocation?'.
            'appid='.$this->api_yahoo.
            '&query='.urlencode($_keyword).
            '&results='.$this->per_page.
            '&sort=rank'.
            '&format=flash'.
            '&output=php'
            );
        
        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        return unserialize($request);
    }

    /**
     * youtube search
     * using Zend_Gdate_YouTube() class
     *
     */
    public function youtubeSearch($keyword = null, $per_page = '25', $start_index = '1')
    {
        $yt = new Zend_Gdata_YouTube();
        $yt_query = $yt->newVideoQuery();
        $yt_query->videoQuery = urlencode($keyword);
        $yt_query->startIndex = $start_index;
        $yt_query->maxResults = $per_page;
        $yt_query->orderBy = 'viewCount';
        $yt_query->Format = '5';
	    $request = $yt->getVideoFeed($yt_query);
        if(!$request) {
            throw new Exception("There was an error loading the youtubeSearch Data ");
        }
        return $request;
    }

    /**
     * get flickr image total for keyword
     * util method
     * @param string $_keyword
     * @returns mixed 
     */
    public function flickrImageTotal($keyword, $page =1)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search'.
            '&api_key='.$this->api_flickr.
            '&tags='.urlencode($keyword).
            '&license=1,2,3,4,5,6'.
            '&page='.$page;

        $request = file_get_contents($url);
        if(!$request) {
            throw new Exception("There was an error loading the flickrImageTotal Data");
        }
        if(strpos($request, '<rsp') === false) {
            return array();
        }
        $xml = simplexml_load_string($request);
        if($xml->attributes()->stat == 'fail') {
            return array();
        }
        $ret = array();
        $_photos_attr = $xml->photos->attributes()->total;
        return (int) $_photos_attr;
    }

    //@todo : refactor flickrImageTotal to return both values in an array
    // useless code...
    public function flickrImagePageTotal($_keyword, $page)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search'.
               '&api_key='.$this->api_flickr.
               '&tags='.urlencode($_keyword).
               '&license=1,2,3,4,5,6'.
               '&page='.$page;

        $request = file_get_contents($url);
        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        if(strpos($request, '<rsp') === false) {
            return array();
        }
        $xml = simplexml_load_string($request);
        if($xml->attributes()->stat == 'fail') {
            return array();
        }
        $ret = array();
        $_photos_attr = $xml->photos->attributes()->pages;
        return $_photos_attr;
    }      
    
    //@todo: remove this method - useless should be handled by flickrImageTotal
    protected function setFlickrImageTotal($total)
    {
        $this->flickrTotal = $total;
    }
    
    /**
     * flickr image search
     * http://www.flickr.com/services/api/flickr.photos.search.html
     * @param $keyword
     * @returns mixed
     */
    public function flickrSearch($keyword = null, $page = 1)
    {
        //$config = Globals::getConfig();
        $_keyword = (string) $keyword;

        $url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search'.
               '&api_key='.$this->api_flickr.
               '&tags='.urlencode($_keyword).
               '&extras=geo'.
               '&license=1,2,3,4,5,6'.
               '&page='.$page;

        $request = file_get_contents($url);

        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }

        if(strpos($request, '<rsp') === false) {
            return array();
        }

        $xml = simplexml_load_string($request);
        if($xml->attributes()->stat == 'fail') {
            return array();
        }

        $ret = array();
        $_photos_attr = $xml->photos->attributes()->total;
        $this->setFlickrImageTotal($_photos_attr);
        foreach($xml->photos->photo as $photo) {
            $attr = $photo->attributes();
            if($attr->ispublic == '1') {
                 $ret[] = array('id' => (string)$attr->id,
                         'owner' => (string)$attr->owner,
                         'secret' => (string)$attr->secret,
                         'server' => (string)$attr->server,
                         'farm'   => (string)$attr->farm,
                         'title'  => (string)$attr->title,
                         );
            }
        }
        return $ret;

    }

    /**
     * Get image information
     * @param id - flickr photo_id
     * returns mixed
     */
    public function flickrImageInfo($id)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photos.getInfo'.
               '&api_key='.$this->api_flickr.
               '&photo_id='.$id;

        $request = file_get_contents($url);
        if(!$request) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        if(strpos($request, '<rsp') === false) {
            return array();
        }
        $xml = simplexml_load_string($request);
        if($xml->attributes()->stat == 'fail') {
            return array();
        }
        $ret = array();
        $tags = array();

        $i=0;
        foreach($xml->photo->tags->tag as $tag) {
           $tags[]= $tag[0];
           $i++;
        }
        
        $ret['author'] = $xml->photo->owner->attributes()->username;
        $ret['takenon'] = $xml->photo->dates->attributes()->taken;
        $ret['description'] = $xml->photo->description;
        $ret['tags'] = implode(', ', $tags);
        $ret['farm_id'] = $xml->photo->attributes()->farm;
        $ret['server_id']= $xml->photo->attributes()->server; 
        $ret['photo_id'] = $xml->photo->attributes()->id;
        $ret['secret'] = $xml->photo->attributes()->secret;
        return $ret;
    }

    /**
     * get flickr user id
     * @param $username
     * @returns int 
     */
    public function flickrFindByUsername($username)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.people.findByUsername'.
               '&username='.urlencode($username).
               '&api_key='.$this->api_flickr;

        $response = @file_get_contents($url);

        if(!$response) {
            throw new Exception("There was an error loading the url. ".$url);
        }

        if (strpos($response, '<rsp') === false) {
            return array();
        }

        $xml = simplexml_load_string($response);
        if ($xml->attributes()->stat == 'fail') {
            return array();
        }
        $attr = $xml->user->attributes()->id;
        return $attr;
    }

    /**
     * get who made photo a favoriate
     * @param $id - flickr photo_id
     */
    public function flickrGetFavorites($id) 
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photos.getFavorites'.
               '&photo_id='.$id.
               '&api_key='.$this->api_flickr;

        $response = @file_get_contents($url1);
        if(!$response) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        $xml = simplexml_load_string($response);
        $total_favs = $xml->attributes()->total;
        return $total_favs;
    }

    /*
     * get photoset of a user
     * @param int id of flickr user
     * @returns mixed
     */
    public function _getPhotoSetsGetList($user_id)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photosets.getList'.
               '&user_id='.$user_id.'
               &api_key='.$this->api_flickr;

        $response = @file_get_contents($url);
        if(!$response) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        if (strpos($response, '<rsp') === false) {
            return array();
        }
        $xml = simplexml_load_string($response);
        if ($xml->attributes()->stat == 'fail') {
            return array();
        }

        $ret = array();
        foreach($xml->photosets->photoset as $photoset) {
             $attr = $photoset->attributes();
             $ret[] = array('id' => (string) $attr->id,
                            'primary' => (int) $attr->primary,
                            'secret'=> (int) $attr->secret,
                            'server' => (int) $attr->server,
                            'photos' => (int) $attr->photos,
                            'farm' => (int) $attr->farm,
                   'title' => (string) $photoset->title);
        }

        return $ret;
    }

    /* @todo check this - should it be public */
    /**
     * get photos in photoset
     */
    public function _getphotosets_getPhotos($photoset_id, $per_page=500, $page=1)
    {
        $url = 'http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos'.
               '&photoset_id='.$photoset_id.
               '&per_page='.$per_page.
               '&page='.$page.
               '&api_key='.$this->api_flickr;

        $response = @file_get_contents($url);
        if(!$response) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        if (strpos($response, '<rsp') === false) {
            return false;
        }
        $xml = simplexml_load_string($response);
        if ($xml->attributes()->stat == 'fail') {
            return false;
        }

        $ret = array();
        foreach($xml->photoset->photo as $photo) {
            $attr = $photo->attributes();
            $ret[] = array('id' => (string)$attr->id,
                  'owner' => (string)$attr->owner,
                  'secret' => (string)$attr->secret,
                  'server' => (string)$attr->server,
                  'farm'   => (string)$attr->farm,
                  'title'  => (string)$attr->title,
            );
        }
        return $ret;
    }

    /**
     * get google news via their rss feed.
     * using Zend_Feed
     */
    function googleNews($keyword)
    {
        $cur_headlines = Zend_Feed::import("http://news.google.com/news?hl=en&ned=us&ie=UTF-8&q=".urlencode($keyword)."&output=rss");
        foreach($cur_headlines as $item){
            $arr[] = array(
                     "title" => $item->title(),
                     "link" => $item->link(),
                     "description" => $item->description()
                     );
         }
         return $arr;
    }

    /**
     * technorati search (blogs)
     * @param string $keyword
     * returns mixed array
     */
    function technoratiSearch($keyword, $start=1, $limit=100)
    {
        $url = 'http://api.technorati.com/tag?key='.$this->api_technorati.'&start='.$start.'&limit='.$limit.'&tag='.urlencode($keyword);
        $response = file_get_contents($url);
        if(!$response) {
            throw new Exception("There was an error loading the url. ".$url);
        }
        $xml = simplexml_load_string($response);
        //echo '<pre>';
        //print_r($xml);
        for($i=0; $i < count($xml->document->item); $i++) {
            $arr[] = array(
                    "link" => $xml->document->item[$i]->permalink,
                    "title" => $xml->document->item[$i]->title,
                    "description" => $xml->document->item[$i]->excerpt
                    );
        }
        if(!isset($arr)) {
            $arr = array();
        }
        return $arr;
    }

    /* get google search result totals for a search term */
    function get_googleTotal($keyword)
    {
        $url = 'http://www.google.com/search?hl=en&q='.urlencode($keyword).'&btnG=Search';
        $response = @file_get_contents($url);
        preg_match('#&nbsp;Results 1 - 10 of about (.*)\s#iU', strip_tags($response), $matches);
        $number = str_replace(',','',$matches[1]);
        return (int) $number;
    }

    public function asGetTopTracks($_keyword)
    {
        $asUrl = 'http://ws.audioscrobbler.com/1.0/artist/'.urlencode($_keyword).'/toptracks.xml';
        $response = file_get_contents($asUrl);
        $xml = simplexml_load_string($response);
        $arr = array();
        for($i=0; $i < count($xml->track); $i++) {
            $arr[] = array('name' => $xml->track[$i]->name,
                       'url' => $xml->track[$i]->url
                );
        }
        return $arr;
    }

    function asGetSimilarArtist($_keyword)
    {
        $asUrl = 'http://ws.audioscrobbler.com/1.0/artist/'.urlencode($_keyword).'/similar.xml';
        $response = file_get_contents($asUrl);
        $xml = simplexml_load_string($response);
        $arr = array();
        for($i=0; $i < count($xml->artist); $i++) {
            $arr[] = array('name' => $xml->artist[$i]->name,
                       'url' => $xml->artist[$i]->url,
                       'image_small' => $xml->artist[$i]->image_small,
                       'image' => $xml->artist[$i]->image
                );
        }
        return $arr;
    }

    public function asGetTopAlbums($_keyword)
    {
        $asUrl = 'http://ws.audioscrobbler.com/1.0/artist/'.urlencode($_keyword).'/topalbums.xml';
        $response = file_get_contents($asUrl);
        $xml = simplexml_load_string($response);
        $arr = array();
        for($i=0; $i < count($xml->album); $i++) {
            $arr[] = array('name' => $xml->album[$i]->name,
                       'url' => $xml->album[$i]->url,
                       'large' => $xml->album[$i]->image->large,
                       'medium' => $xml->album[$i]->image->medium,
                       'small' => $xml->album[$i]->image->small
                );
        }
        return $arr;
    }
    public function twitterSearch($keyword, $type="word", $page=1)
    {
        switch($type) {
            case 'from' :
                $url = "http://search.twitter.com/search.atom?q=from:".$keyword.'&page='.$page;
                break;
            case 'to' :
                $url = "http://search.twitter.com/search.atom?q=to:".$keyword.'&page='.$page;
                break;
            case 'refto' :
                $url = "http://search.twitter.com/search.atom?q=@".$keyword.'&page='.$page;
                break;
            default :
                $url = "http://search.twitter.com/search.atom?q=".$keyword.'&page='.$page;
        }

        $xml = self::getXML($url);
        $response = simplexml_load_string($xml);
        $_resp = $response->entry;
        $total = sizeof($_resp);
        $results = array();
        for($i=0; $i < $total; $i++) {
            //print_r($_resp[$i]);
            $results[$i]['published'] = $_resp[$i]->published;
            $results[$i]['link']['status'] = $_resp[$i]->link[0];
            $results[$i]['link']['image'] = $_resp[$i]->link[1];
            $results[$i]['title'] = $_resp[$i]->title;
            $results[$i]['content'] = $_resp[$i]->content;
            $results[$i]['updated'] = $_resp[$i]->updated;
            $results[$i]['author']['name'] = $_resp[$i]->author->name;
            $results[$i]['author']['uri'] = $_resp[$i]->author->uri;
        }

        if(!$results) {
            return false;
        }
        $this->results = $results;
        return $this;
    }

    public function eventfulSearch($keyword, $page, $location="")
    {
        $key = 'xP4PjJDbMXdhMFjR';
        if(empty($location)) {
            $url = 'http://api.evdb.com/rest/events/search?app_key='.$key.'&keywords='.urlencode($keyword).'&page_number='.$page.'&date=Future';
        }
        else {
            $url = 'http://api.evdb.com/rest/events/search?app_key='.$key.'&location='.$location.'&page_number='.$page.'&date=Future';
        }
        $response = file_get_contents($url);
        $xml = simplexml_load_string($response);
        return $xml;
    }

    private function getXML($url)
    {
        //http://us2.php.net/manual/en/function.file-get-contents.php#85008
        //ensure we return UTF-8 encoded xml doc
        if(!isset($xml)) $xml = file_get_contents($url);
        if(function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($xml, 'UTF-8', mb_detect_encoding($xml, 'UTF-8, ISO-8859-1', true));
        }
        else {
            return $xml;
        }
    }

    public function searchBacktype($keyword, $page = 1, $per_page = 50)
    {
        $key = 'eff6d51c6fe4b9dd1ebc';
        $url = 'http://api.backtype.com/comments/search.xml?q='.urlencode($keyword).'&page='.$page.'&itemsperpage='.$per_page.'&key='.$key;
        $response = file_get_contents($url);
        $xml = simplexml_load_string($response);
        return $xml;
    }
    public function googleSocialGraph($urls) {
        if(is_array($urls)) {
            $nodes = join(',', $urls);
        } else {
            $nodes = $urls;
        }

        $params = 'q=' . $nodes .
                  '&edo=1' . # Return edges out from returned nodes
                  '&edi=1' . # Return edges in to returned nodes.
                  '&fme=1' . # Follow me links, also returning reachable nodes.
                  '&sgn=0';   # Return internal representation of nodes. */

        $request = 'http://socialgraph.apis.google.com/lookup?' . $params;
        $content = @file_get_contents($request);
        if(!$content) {
            return array();
        }

        $result = Zend_Json::decode($content);
        $data = array();
        //foreach($result['nodes'] as $url => $item) {
        foreach($result['nodes'] as $url) {
            $data[] = $url;
        }
        return $data;
    }

    public function googleSocialGraphOtherMe($urls) {
        //print_r($urls);
        if(is_array($urls)) {
            $nodes = join(',', $urls);
            echo $nodes ."<br/>";
        } else {
            $nodes = $urls;
        }

        $params = 'q=' . $nodes .
                  '&pretty=1' . # Return edges out from returned nodes
                  '&sgn=0';   # Return internal representation of nodes. */

        $request = 'http://socialgraph.apis.google.com/otherme?' . $params;
        $content = @file_get_contents($request);
        if(!$content) {
            return array();
        }
        //echo $request;
        //echo $content;
        $result = Zend_Json::decode($content);
        //print_r($result);
        $data = array();

        //foreach($result as $url => $item) {
        foreach($result as $url) {
            if(sizeof($url['attributes']) > 0) {
            $data[] = $url;
            }
        }
        return $data;
    }
    

} // end of class

