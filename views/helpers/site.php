<?php

class SiteHelper extends Helper
{

    function checkForRss($site)
    {
        $response = file_get_contents($site);
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

}
