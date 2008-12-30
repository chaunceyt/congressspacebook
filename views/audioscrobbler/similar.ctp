<div id="page">
        <div id="content">
                <div class="post">
                        <h2 class="title">/Similar Artist(s) to <?php echo $keyword'; ?></h2>
                        <div class="entry">
            <p></p>
<div id="thumbnails">
<ul id="image_set">
<?php
//require 'keywords/top_rnb_artist_keywordsearch.php';
$i=0;
foreach($SimilarArtist as $artist) {
        echo '<li><a href="./app?keyword='.urlencode($artist['name']).'" onmouseout="popUp(event,\'RNB'.$i.'\')" onmouseover="popUp(event,\'RNB'.
$i.'\')"><img src="'.$artist['image_small'].'" border="0" /></a></li>'."\n";
        echo '<div id="RNB'.$i.'" class="topartist">'.$artist['name'].'</div>'."\n";
        $i++;
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

