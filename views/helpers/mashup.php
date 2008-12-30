<?php
class MashupHelper extends Helper {

    function displayFeed($feed, $total = 10)
    {
        for($i=0; $i < sizeof($feed['ResultSet']['Result']); $i++) {
            if($i < $total) {
                echo '<a href="'.$feed['ResultSet']['Result'][$i]['Url'].'" target="_blank">' . $feed['ResultSet']['Result'][$i]['Title'] ."</a><br/>";
                echo  $feed['ResultSet']['Result'][$i]['Summary'] ."<br/>";
            }
        }
    }

    function displayImageFeed($feed)
    {
        for($i=0; $i < sizeof($feed['ResultSet']['Result']); $i++) {
            //echo '<a href="'.$feed['ResultSet']['Result'][$i]['Url'].'">' . $feed['ResultSet']['Result'][$i]['Title'] ."</a><br/>";
            echo '<li id="image_set_yahooImages"><a href="'.$feed['ResultSet']['Result'][$i]['Url'].'" rel="lightbox" title="' . $feed['ResultSet']['Result'][$i]['Title'] .'"><img src="'.$feed['ResultSet']['Result'][$i]['Thumbnail']['Url'].'" border="0" width="100px" height="100px"/></a></li>';
            //echo  $feed['ResultSet']['Result'][$i]['Summary'] ."<br/>";
        }   

    }

    function displayVideoFeed($feed)
    {
        for($i=0; $i < sizeof($feed['ResultSet']['Result']); $i++) {
            //echo '<a href="'.$feed['ResultSet']['Result'][$i]['Url'].'">' . $feed['ResultSet']['Result'][$i]['Title'] ."</a><br/>";
            $videoID = preg_match('#docid=(.*)&#', $feed['ResultSet']['Result'][$i]['Url'], $match);
            //echo @$match[1];
            if(isset($match[1])) {
                echo '<li id="image_set_yahooVideo"><a href="googlevideo.php?vid='.$match[1].'"><img src="'.$feed['ResultSet']['Result'][$i]['Thumbnail']['Url'].'" border="0"  width="100px" height="100px" /></a></li>';
            }
            //echo  $feed['ResultSet']['Result'][$i]['Summary'] ."<br/>";
        }

    }

    function displayFlickrImages($type, $farm_id, $server_id, $photo_id, $secret, $keyword)
    {
        $_url = sprintf('http://farm%d.static.flickr.com/%d/%s_%s%%s.jpg', $farm_id, $server_id, $photo_id, $secret);

        switch($type) {
            case '1' : // thumbnail
                $_type = '_t';
                break;
            case '2' : // small
                $_type = '_m';
                break;
            case '3' : // square
                $_type = '_s';
                break;
            case '4' : // large
                $_type = '_b';
                break;
            default :
                $_type = '';
        }
        $url = sprintf($_url, $_type);
        $image_url = sprintf($_url, '_m');
        //echo '<li id="image_set_flickr"><a href="/flickr/image/'.$photo_id.'&keyword='.$_GET['keyword'].'"><img src='.$url.' alt="" border="0"/></a></li>';
        echo '<li id="image_set_flickr"><a href="'.Router::url('/flickr/image/'.$photo_id.'/tag/'.urlencode($keyword)).'"><img src='.$url.' alt="" border="0"/></a></li>';
    }

    function displayFlickrImage($type, $farm_id, $server_id, $photo_id, $secret)
    {
        $_url = sprintf('http://farm%d.static.flickr.com/%d/%s_%s%%s.jpg', $farm_id, $server_id, $photo_id, $secret);

        switch($type) {
            case '1' : // thumbnail
                $_type = '_t';
                break;
            case '2' : // small
                $_type = '_m';
                break;
            case '3' : // square
                $_type = '_s';
                break;
            case '4' : // large
                $_type = '_b';
                break;
            default :
                $_type = '';
        }
        $url = sprintf($_url, $_type);
        $image_url = sprintf($_url, '_m');
        echo '<img src='.$url.' alt="" border="0"/>';
    }
    function RssFeed($link) 
    {
    //process rss
       $feed_url = $link;
       $items_per_feed = 10;
       $items_max_age = '-60 days';
       $max_age = $items_max_age ? date('Y-m-d H:i:s', strtotime($items_max_age)) : null;
       $items = array();
       App::import('vendor', 'simplepie/simplepie');
       $feed = new SimplePie();
       $feed->set_cache_location(CACHE . 'simplepie');
       $feed->set_feed_url($feed_url);
       $feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_NONE);
       $feed->init();
       if($feed->error() || $feed->feed_url != $feed_url ) {
           return false;
       }

       for($i=0; $i < $feed->get_item_quantity($items_per_feed); $i++) {
               $feeditem = $feed->get_item($i);
               # create a NoseRub item out of the feed item
               $item = array();
               $item['datetime'] = $feeditem->get_date('Y-m-d H:i:s');
               if($max_age && $item['datetime'] < $max_age) {
                   # we can stop here, as we do not expect any newer items
                   break;
               }

               $item['title']    = $feeditem->get_title();
               $item['url']      = $feeditem->get_link();
           //$item['intro']    = @$intro;
           //$item['type']     = @$token;
           //$item['username'] = $username;

               $items[] = $item;
       }

       unset($feed);

       $items;
    foreach($items as $_item) {
        echo '<a href="'.$_item['url'].'">'.$_item['title'].'</a><br/>';
    }
    //end process rss
    }

}
