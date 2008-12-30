<div id="content">
    <div class="post">
                    <div class="entry">
<?php

//echo '<pre>';
//print_r($google_social);
//echo '<ul>';

//echo '</ul>';
echo '<h2>Social Links found for: '.$username.'</h2>';
if(isset($google_social)) {
    foreach($google_social as $weblink) {
        if(!empty($weblink)) {
            if(isset($weblink['attributes']['url'])) {
                $favlink = explode('/',str_replace('http://','', $weblink['attributes']['url']));
                echo '<h2><img src="http://'.$favlink[0].'/favicon.ico" class="favicon" width="16" /> ';
                echo '<a href="'.$weblink['attributes']['url'].'" target="_new">'.$weblink['attributes']['url'].'</a></h2>'."<br/>\n";
            }
            else {
                $weblink['attributes']['url']=null;
                echo '<h2>'. $username . ': activity</h2>';
            }
                
                if(isset($weblink['attributes']['rss'])) {
                    $rss_link = $weblink['attributes']['rss'];
                    //fixme: parse rss
                    echo 'RSS Feed:<br/>';
                    echo $weblink['attributes']['rss'] ."<br/>";
    //process rss
    $mashup->RssFeed($weblink['attributes']['rss']);
    /*
       $feed_url = $weblink['attributes']['rss'];
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
           $item['intro']    = @$intro;
           $item['type']     = @$token;
           $item['username'] = $username;

               $items[] = $item;
       }

       unset($feed);

       $items;
    foreach($items as $_item) {
        echo '<a href="'.$_item['url'].'">'.$_item['title'].'</a><br/>';
    }*/
    //end process rss
                    
                }

                if(isset($weblink['nodes_referenced']) && sizeof($weblink['nodes_referenced']) > 0) {
                    echo '<p><strong>Made Reference to: </strong></p>';
                    foreach($weblink['nodes_referenced'] as $key => $type) { 
                        if(preg_match('/http:\/\/twitter.com/',$key)) {
                            $username = str_replace('http://twitter.com/','',$key);
                            echo $key . ' (' . $type['types'][0].') <a href="'.Router::url('/social_stream/user/'.$username).'">social stream</a><br/>';
                        }
                        else {
                            echo $key . ' (' . $type['types'][0].') <br/>';
                        }
                        
                    }
                }
                
                if(isset($weblink['nodes_referenced_by']) && sizeof($weblink['nodes_referenced']) > 0) {
                    echo '<p><strong>Referenced By</strong></p>';
                    foreach($weblink['nodes_referenced_by'] as $key => $type) {
                        if(preg_match('/http:\/\/twitter.com/',$key)) {
                            $username = str_replace('http://twitter.com/','',$key);
                            echo $key . ' (' . $type['types'][0].') <a href="'.Router::url('/social_stream/user/'.$username).'">social stream</a><br/>';
                        }
                        else {
                            echo $key . ' (' . $type['types'][0].') <br/>';
                        }

                    }
                }
            //}
        }
        //echo '<pre>';
        //print_r($weblink);
        //echo '</pre>';
    }
}

//echo '<p>' . $username .' friends</p>';
//foreach($FriendsVcard as $_friends) {
//    echo $_friends;
//}
?>

      </div><!-- end entry -->
          </div>

          </div>
