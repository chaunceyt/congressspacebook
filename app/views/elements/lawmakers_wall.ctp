<h3>** has this Member Benefited at any (fundraising) <a href="/<?php Router::url('/'); ?>congress_parties/<?php echo $lawmaker['Lawmaker']['username']; ?>">Event/Party</a></h3> 
<?php

if(!empty($lawmaker['Lawmaker']['youtube_url'])) {
    echo '<h2>Youtube Channel</a></h2>';
    echo $lawmaker['Lawmaker']['youtube_url'];
    if(preg_match('/www.youtube.com\/user/', $lawmaker['Lawmaker']['youtube_url'])) {
        $yt_username = str_replace('http://www.youtube.com/user/','',$lawmaker['Lawmaker']['youtube_url']);
    }
    else {
        $yt_username = str_replace('http://www.youtube.com/','',$lawmaker['Lawmaker']['youtube_url']);
    }
    $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
    $site->getYoutubeVideoRss($yt_url);
}
else {
    //echo '<p>No Youtube Channel</p>';
}


if(!empty($lawmaker['Lawmaker']['official_rss'])) {
    if(preg_match('/.xml/i',$lawmaker['Lawmaker']['official_rss'])) {
        echo $lawmaker['Lawmaker']['official_rss'];
        $site->getRssFeed($lawmaker['Lawmaker']['official_rss']);
    }
    else if(preg_match('/www.youtube/s',$lawmaker['Lawmaker']['official_rss'])) {
        echo '<h2>Youtube Channel</a></h2>';
        echo $lawmaker['Lawmaker']['official_rss'];
        if(preg_match('/www.youtube.com\/user/', $lawmaker['Lawmaker']['official_rss'])) {
            $yt_username = str_replace('http://www.youtube.com/user/','',$lawmaker['Lawmaker']['official_rss']);
        }
        else {
            $yt_username = str_replace('http://www.youtube.com/','',$lawmaker['Lawmaker']['official_rss']);
        }
        //$site->checkForRss($lawmaker['Lawmaker']['official_rss']);
        $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
        
        $site->getYoutubeVideoRss($yt_url);
    }
}
else {
    $site->checkForRss($lawmaker['Lawmaker']['website']);
}
?>
</div>
</div>
