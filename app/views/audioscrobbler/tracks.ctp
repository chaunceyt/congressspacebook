<div id="page">
        <div id="content">
                <div class="post">
                        <h2 class="title">/Top Tracks for <?php echo $keyword; ?></h2>
                        <div class="entry">
            <p></p>
<div id="thumbnails">
<ul id="image_set">
<?php
//require 'keywords/top_rnb_artist_keywordsearch.php';
foreach($TopTracks as $track) {
        echo '<li><a href="'.$track['url'].'" target="_blank">'.$track['name'].'</a></li>'."\n";
}
?>
</ul>
</div>
<br clear="all"/>

<p>Powered By: <a href="http://www.lastfm.com/" target="_blank">LastFM</a> via ws.audioscrobbler.com API</p>

                        </div>
                </div>

        </div>
        <!-- end #content -->

