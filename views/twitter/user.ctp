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
                
                if(preg_match('/twitter.com\/'.$username.'/is',$weblink['attributes']['url'])) {
                    //echo 'T W I TT E R';
                    echo '<h2><p>Twitter Chatter</p></h2>';
                    echo $AuthorVcard;
                    //echo '</pre>';
                    //print_r($TwitterSearch);
                    echo '<h2>From: '.$username.'</h2>';
                    if(isset($TwitterSearchFrom->results)) {
                        foreach($TwitterSearchFrom->results as $res) {
                            //print_r($res);
                            echo '
                                <img src="'.$res['link']['image']->attributes()->href.'" alt="'.$res['author']['name'][0].' Avatar" />
                                <a href="'.$res['author']['uri'][0].'">'.$res['author']['name'][0].'</a>
                                <div class="what">'.$res['title'][0].'</div>
                                <div class="l"><span class="date">
                                <a href="'.$res['link']['status']->attributes()->href.'" title="View original post">Original Post</a>
                                <a href="'.Router::url('/social_stream/user/'.str_replace('http://twitter.com/','',$res['author']['uri'][0])).'">social stream</a>
                                </span></div>
                            ';
                        }
                    }
                    else {
                        echo 'Nothing found here';
                    }

                    echo '<h2>To: '.$username.'</h2>';
                    if(isset($TwitterSearchTo->results)) {
                        foreach($TwitterSearchTo->results as $res) {
                            //print_r($res);
                            echo '
                                <img src="'.$res['link']['image']->attributes()->href.'" alt="'.$res['author']['name'][0].' Avatar" />
                                <a href="'.$res['author']['uri'][0].'">'.$res['author']['name'][0].'</a>
                                <div class="what">'.$res['title'][0].'</div>
                                <div class="l"><span class="date">
                                <a href="'.$res['link']['status']->attributes()->href.'" title="View original post">Original Post</a>
                                <a href="'.Router::url('/social_stream/user/'.str_replace('http://twitter.com/','',$res['author']['uri'][0])).'">social stream</a>
                                </span></div>
                            ';
                        }
                    }
                    else {
                        echo 'Nothing found here';
                    }

                echo '<h2>@'.$username.': </h2>';
                if(isset($TwitterSearchRef->results)) {
                    foreach($TwitterSearchRef->results as $res) {
                        //print_r($res);
                        echo '
                            <img src="'.$res['link']['image']->attributes()->href.'" alt="'.$res['author']['name'][0].' Avatar" />
                            <a href="'.$res['author']['uri'][0].'">'.$res['author']['name'][0].'</a>
                            <div class="what">'.$res['title'][0].'</div>
                            <div class="l"><span class="date">
                            <a href="'.$res['link']['status']->attributes()->href.'" title="View original post">Original Post</a>
                            <a href="'.Router::url('/social_stream/user/'.str_replace('http://twitter.com/','',$res['author']['uri'][0])).'">social stream</a>
                            </span></div>
                        ';
                    }
                }
                else {
                    echo 'Nothing found here';
                }

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
