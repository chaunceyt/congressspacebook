<div id="page">
	<div id="content">
		<div class="post">
			<div class="entry"  style="padding-left:90px;">
			<h2 class="title"><a href="#"><?php echo  $videoTitle; ?></a></h2>

    <p>
    <object width="425" height="350">
      <param name="movie" value="http://www.youtube.com/v/<?php echo $videoId; ?>&autoplay=1"></param>
      <param name="wmode" value="transparent"></param>
      <embed src="http://www.youtube.com/v/<?php echo $videoId; ?>&autoplay=1" type="application/x-shockwave-flash" wmode="transparent"
        width=425" height="350"></embed>
    </object>
    </p>
    <b>Title:</b><?php echo  $videoTitle; ?><br />
    <b>Description:</b><?php echo $description; ?><br />
    <b>Author:</b> <?php echo $authorUsername; ?> <a href="<?php echo Router::url('/social_stream/link/'.$authorUsername.'/youtube'); ?>">social_stream</a><br />
    <b>Tags:</b>
    <?php
    //echo $this->tags;
    $tags = explode(', ', trim($tags));
    foreach($tags as $tag) {
        echo '<a href="'.Router::url('/youtube/'.$tag).'">'.$tag.'</a> &nbsp;';
    }
    ?><br />
    <b>Duration:</b> <?php echo $duration; ?> seconds<br />
    <b>View count:</b> <?php echo $viewCount; ?><br />
    <b>Rating:</b> <?php echo $rating; ?> (<?php $numRaters;?> ratings)<br />
    <b>Watch page:</b> <a href="<?php echo $watchPage; ?>"><?php echo $watchPage; ?></a> <br />

<div id="thumbnails">
<h2>Related Videos</h2>
<ul id="image_set">
<?php
            echo '<tbody width="100%">';
            foreach ($related as $entry) {
            $videoId = $entry->getVideoId();
            $thumbnailUrl = $entry->mediaGroup->thumbnail[0]->url;
            $videoTitle = $entry->mediaGroup->title;
            $videoDescription = $entry->mediaGroup->description;
            echo '
                <li id="image_set_youtubeVideo"><a href="./video?v='.$videoId.'"><img src="'.$thumbnailUrl.'" alt="'.$videoTitle.'" border="0"/></a></li>
            ';
        }

?>
</ul>
</div>
<br clear="all" />


			</div>
		</div>

	</div>
	<!-- end #content -->
    <!-- end #sidebar -->
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
    
