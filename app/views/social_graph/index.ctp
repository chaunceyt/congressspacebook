<div id="content">
    <div class="post">
                    <div class="entry"  style="padding-left:90px;">
<?php

//echo '<pre>';
//print_r($google_social);
//echo '<ul>';

//echo '</ul>';
echo '<h2>Social Graph found </h2>';
if(isset($google_social)) {
    foreach($google_social as $weblink) {
        if(!empty($weblink)) {
            if(isset($weblink['attributes']['url'])) {
                $favlink = explode('/',str_replace('http://','', $weblink['attributes']['url']));
                echo '<h2><img src="http://'.$favlink[0].'/favicon.ico" class="favicon" width="16" /> ';
                if(preg_match('/http:\/\/twitter.com/',$weblink['attributes']['url'])) {
                        $username = str_replace('http://twitter.com/','',$weblink['attributes']['url']);
                        echo '<a href="'.$weblink['attributes']['url'].'" target="_new">'.$weblink['attributes']['url'].'</a> <a href="'.Router::url('/social_stream/user/'.$username).'">social stream</a>'."</h2><br/>\n";
                }
                else {
                    echo '<a href="'.$weblink['attributes']['url'].'" target="_new">'.$weblink['attributes']['url'].'</a></h2>'."<br/>\n";
                }
            }
            else {
                $weblink['attributes']['url']=null;
            }
                
                
                if(isset($weblink['attributes']['rss'])) {
                    $rss_link = $weblink['attributes']['rss'];
                    //fixme: parse rss
                    echo 'RSS Feed:<br/>';
                    echo $weblink['attributes']['rss'] ."<br/>";
                    $mashup->RssFeed($rss_link);
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
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
          
