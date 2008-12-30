<div id="page">
        <div id="content">
                <div class="post">
                        <div class="entry">

  <div align="center">
    <p><?php echo  $imageInfo['description'][0]; ?></p>
<?php
$mashup->displayFlickrImage(0, $imageInfo['farm_id'], $imageInfo['server_id'], $imageInfo['photo_id'], $imageInfo['secret']);
?>
<p style="margin:0px auto;">
Link to <a href="http://flickr.com/photos/<?php echo $ImageOwner[0]; ?>/<?php echo $imageInfo['photo_id']; ?>" target="_new">Flickr</a>
page for
this image <br/>
Link to <a href="http://flickr.com/photos/<?php echo $ImageOwner[0]; ?>/" target="_new">copyright holder/photographer</a><br/>
<br clear='all' />
View the <a href="#" onclick="checkFavs('<?php //echo $_GET['id'];?>'); return false;">images</a> of people who liked this image enough to make it a
favorit
es<br/>
</p>
</div>
<br clear='all' />
<?php // print_r($this->FlickrHistory); ?>
    <p>
    </p>
    <b>Author:</b> <?php echo $imageInfo['author'][0]; ?> <br />
    <b>Tags:</b>
    <?php
    //echo $this->imageInfo['tags'];
    $tags = explode(', ', trim($imageInfo['tags']));
    foreach($tags as $tag) {
        echo '<a href="'.Router::url('/flickr/'.$tag).'">'.$tag.'</a> &nbsp;';
    }
    ?><br />

<p></p>
<ul id="image_set">
<?php
echo '<pre>';
echo '</pre>';
/*
foreach($authorPics as $pic) {
            $mashup->displayFlickrImages(3, $pic['farm'], $pic['server'], $pic['id'], $pic['secret']);
}
*/
?>
</ul>
<br clear='all' />

<ul id="image_set">
<div id="favs"></div>
</ul>
</div>








                        </div>
                </div>

        </div>
        <!-- end #content -->
    <?php //include '/var/www/mashupkeyword.com/application/views/scripts/sidebar.phtml'; ?>
        <?php //include '/var/www/dev.mashupkeyword.com/dev/mashup/application/views/scripts/sidebar.phtml'; ?>
    <!-- end #sidebar -->

