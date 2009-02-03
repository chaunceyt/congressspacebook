<?php

class SiteHelper extends Helper
{

    function checkForRss($site)
    {
        $response = @file_get_contents($site);
        preg_match_all('/<link[^>]* href="(.*?)"[^>]*>/', $response, $matches);
        foreach($matches[1] as $match) {
            //we only want rss
            if(preg_match('/RSS/',$match) || preg_match('/rss/',$match)) {
                //$match ."\n";

                $rss = @simplexml_load_file($match);
                $entries = 10;
                if (!empty($rss)) {
                    $title = $rss->channel[0]->title[0];
                    $url = $rss->channel[0]->link[0];
                    $desc = $rss->channel[0]->description[0];
                    echo '<h2>'.$title.'</h2>'."\n";
                    echo '<b><a href="'.$url.'" target="_new">'.$url.'</a></b><br />'."\n";
                    echo $desc.'<br /><br />'."\n";
                    $c=0;
                    foreach($rss->channel->item as $item) {
                        $_title = $item->title;
                        $_url = $item->link;
                        $_desc = $item->description;
                        echo '<b>'.$_title.'</b><br />'."\n";
                        echo '<a href="'.$_url.'">'.$_title.'</a><br />'."\n";
                        echo '<i>'.$_desc.'</i><br /><br />'."\n";
                        $c++;
                    }
                } else {
                    //echo "Could not grab feed.";
                }
            }
        }
    }//end function

    //fixme: buggy use simplepie
    function getGovTrackMonitor($govtrack_id)
    {
            $site = 'http://www.govtrack.us/users/events-rdf.xpd?monitors=p:'.$govtrack_id;
            $response = file_get_contents($site);
            echo $response;
            echo $site;
            $rss = @simplexml_load_file($response);
            $entries = 10;
            if (!empty($rss)) {
                $title = $rss->channel[0]->title[0];
                $url = $rss->channel[0]->link[0];
                $desc = $rss->channel[0]->description[0];
                echo "<h2>$title</h2>\n";
                echo "<b><a href='$url'>$url</a></b><br />\n";
                echo "$desc<br /><br />\n";
                $c=0;
                foreach($rss->channel->item as $item) {
                    $_title = $item->title;
                    $_url = $item->link;
                    $_desc = $item->description;
                    echo '<b>'.$_title.'</b><br />'."\n";
                    echo '<a href="'.$_url.'">'.$_title.'</a><br />'."\n";
                    echo '<i>'.$_desc.'</i><br /><br />'."\n";
                    $c++;
                }
            } else {
                echo "<p>Found nothing on the GovTrack Monitor.</p>";
            }
    }//end function

    function getYoutubeVideoRss($site, $display_title=null)
    {
    //$response = file_get_contents($site);

            $rss = @simplexml_load_file($site);
            $entries = 10;
            if (!empty($rss)) {
                $title = $rss->channel[0]->title[0];
                $url = $rss->channel[0]->link[0];
                $desc = $rss->channel[0]->description[0];
                if($display_title) {
                    echo "<h2>Youtube $title</h2>\n";
                    echo "$desc<br /><br />\n";
                }
                $c=0;
                foreach($rss->channel->item as $item) {
                    $_title = str_replace("Video: ","", $item->title);
                    $video_id = str_replace('http://www.youtube.com/watch?v=','',$item->link);
                    $_desc = $item->description;
                    echo '<a href="'.Router::url('/youtube/video/'.$video_id).'">'. $_title .'</a>'."<br/>\n";
                    //echo $url ."\n";
                    //echo "<i>$_desc</i><br /><br />\n";
                    $c++;
                }
            } else {
                echo "<p>Found no videos on Youtube.";
            }
    }//end function
    

}
