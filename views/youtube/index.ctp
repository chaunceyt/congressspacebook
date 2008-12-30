        <div id="content">
                <div class="post">
                        <div class="entry">
<p align="center"><?php echo $YoutubePagination; ?></p>

<div id="thumbnails">
<ul id="image_set">
<?php
            echo '<tbody width="100%">';
            $i=0;
            foreach ($YoutubeSearch as $entry) {
            $videoId = $entry->getVideoId();
            $thumbnailUrl = $entry->mediaGroup->thumbnail[0]->url;
            $videoTitle = $entry->mediaGroup->title;
            $videoDescription = $entry->mediaGroup->description;
            echo '
                <li id="image_set_youtubeVideo"><a href="'.Router::url('/youtube/video/'.$videoId).'"  onmouseout="popUp(event,\'L'.$i.'\')" onmouseover="popUp(event,\'L'.$i.'\')"><img src="'.$thumbnailUrl.'" alt="'.$videoTitle.'" width="100px" height="100px" border="0"/></a></li>
                <div id="L'.$i.'" class="tip">'.$videoTitle.'<br/>'.nl2br($videoDescription).'</div>
            ';
            $i++;
        }

?>
</ul>
<br clear='all' />
</div>
<p align="center"><?php echo $YoutubePagination; ?></p>

<p>Powered By: <a href="http://www.youtube.com/" target="_new">Youtube</a> API</p>
                        </div>
                </div>

        </div>
        <!-- end #content -->

