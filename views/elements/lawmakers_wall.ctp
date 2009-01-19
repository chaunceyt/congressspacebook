<?php
if(!empty($lawmaker['Lawmaker']['youtube_url'])) {
    $yt_username = str_replace('http://www.youtube.com/','',$lawmaker['Lawmaker']['youtube_url']);
    $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
    $site->getYoutubeVideoRss($yt_url);
    $site->checkForRss($lawmaker['Lawmaker']['website']);
}
?>
</div>
</div>
