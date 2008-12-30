<div id="page">
        <div id="content">
                <div class="post">
                        <h2 class="title">/Top Album(s) for <?php echo $keyword; ?></h2>
                        <div class="entry">
            <p></p>
<div id="thumbnails">
<ul id="image_set">
<?php
//require 'keywords/top_rnb_artist_keywordsearch.php';
$k=0;
foreach($TopAlbums as $album) {
echo '<li><a href="'.$album['url'].'" target="_blank"><img src="'.$album['small'].'" width="100px" height="100px" border="0"></a>'."</li>\n";
$k++;
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

