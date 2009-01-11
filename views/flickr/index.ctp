<div id="content">
    <div class="post">
        <center>Total images found <?echo number_format($FlickrTotalImageCount,0); ?> with the tag <?php echo $keyword; ?></center>
        <center><?echo $FlickrPagination; ?></center>
        
        <div class="entry">
<?php
$i=0;
foreach($FlickrSearch as $fImage) {
    if($i % 2) {
        $_rightSide[] = $fImage;
    }
    else {
        $_leftSide[] = $fImage;
    }
    //displayFlickrImages(3, $fImage['farm'], $fImage['server'], $fImage['id'], $fImage['secret']);
    $i++;
}
?>

        <div id="thumbnails">
            <ul id="image_set">
            <?php
                foreach($_rightSide as $fImage) {
                    $mashup->displayFlickrImages(3, $fImage['farm'], $fImage['server'], $fImage['id'], $fImage['secret'], $keyword);
                }
            ?>
            <?php
                foreach($_leftSide as $fImage) {
                    $mashup->displayFlickrImages(3, $fImage['farm'], $fImage['server'], $fImage['id'], $fImage['secret'], $keyword);
                }
            ?>
            </ul>
            <br clear='all' />

            <div id="dash">
                <center><?echo $FlickrPagination; ?></center>
            </div><!-- end dash -->

            <p>Powered By: <a href="http://www.flickr.com/" target="_new">Flickr</a> API</p>
            <p></p>
        </div><!-- end thumbnails -->


      </div><!-- end entry -->
    </div>

</div>
        <!-- end #content -->
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

