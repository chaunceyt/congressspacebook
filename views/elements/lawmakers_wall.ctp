<?php
if(!empty($lawmaker['Lawmaker']['youtube_url'])) {
    echo '<h2>Youtube Channel</a></h2>';

    $yt_username = str_replace('http://www.youtube.com/','',$lawmaker['Lawmaker']['youtube_url']);
    $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
    $site->getYoutubeVideoRss($yt_url);
}
else {
    echo '<p>No Youtube Channel</p>';
}

if(!empty($lawmaker['Lawmaker']['official_rss'])) {
    if(preg_match('/.xml/i',$lawmaker['Lawmaker']['official_rss'])) {
        echo $lawmaker['Lawmaker']['official_rss'];
        $site->getRssFeed($lawmaker['Lawmaker']['official_rss']);
    }
    else {
        echo $lawmaker['Lawmaker']['official_rss'];
        $site->checkForRss($lawmaker['Lawmaker']['official_rss']);
    }
}
else {
    $site->checkForRss($lawmaker['Lawmaker']['website']);
}
?>
</div>
</div>
