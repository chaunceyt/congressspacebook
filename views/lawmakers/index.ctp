    <div id="singleContent">

            <div id="archiveEntries">
                  <div class="archivePost">

<h1> CongressSpacebook</h1>
<h2>...striving to make Congress more accountable and transparent...</h2>
<p>Here we're tracking each member's voting records, FEC reports, Campaign Finance summary, their opinions on the issues, and even their state's federal spending reports. </p>
<p><h2>Browse  <a href="<?php echo Router::url('/lawmakers/browse/house'); ?>" title="House">House</a> or <a href="<?php echo Router::url('/lawmakers/browse/senate'); ?>" title="Senate">Senate</a> profiles</h2></p>
<h2>Top 100</h2>
<strong>...see who's had</strong>:<br/> 
the most bills <a href="<?php echo Router::url('/lawmakers/top/enacted'); ?>" title="Top 100 Lawmakers to Enact Laws">enacted</a>,  
the most <a href="<?php echo Router::url('/lawmakers/top/novote'); ?>" title="Top 100 Lawmakers with the most No Votes">novotes</a>, 
and <a href="<?php echo Router::url('/lawmakers/top/cosponsored'); ?>" title="Top 100 Lawmakers who co-sponsored the most Bills">co-sponsored</a> the most bills...<br/>
</p>
<h2>YouTube Stream</h2>
<p>
<?php
foreach($videos as $yt_username) {
    $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
    $site->getYoutubeVideoRss($yt_url);
}
?>
</p>

                <div class="clear margintop"></div>
                <div class="postinfo">
                    October 27, 2008 | Posted in <a href="http://www.wpnewspaper.com/category/business/" title="View all posts in Business" rel="category tag">Business</a>, <a href="http://www.wpnewspaper.com/category/politics/" title="View all posts in Politics" rel="category tag">Politics</a> | <a href="http://www.wpnewspaper.com/white-house-rivals-rally-faithful-for-last-push-2/" rel="bookmark">Read More &raquo;</a>
                </div>
            </div>

            <div class="clear"></div>

            <div class="navigation">
                <div class="previous"></div>
                <div class="next"></div>
                <div class="clear"></div>
            </div>
                    </div>

        <div id="singlePostSidebarLeft">
                        <div class="widget">
                <h3 class="widgetTitleSbLeft">Recently Commented</h3>

<h2>You are from: <?php echo $current_webuser->region; ?> </h2>
<p><a style="hover:none;" href="<?php echo Router::url('/nearby/lawmakers'); ?>"><img src="<?php echo Router::url('/'); ?>img/states/<?php echo strtolower($current_webuser->region); ?>.png" alt="default" border="0" /></p></a>
<h3>Browse by party</h3> 
<p></p>
<p>
<?php
/*
    $max_size = 250; // max font size in %
    $min_size = 100; // min font size in %

    $max_qty = max(array_values($partyTagCloud));
    $min_qty = min(array_values($partyTagCloud));

    $spread = $max_qty - $min_qty;
    if (0 == $spread) { // we don't want to divide by zero
        $spread = 1;
    }

    $step = ($max_size - $min_size)/($spread);
    $i=0;
    foreach ($partyTagCloud as $key => $value) {
        $size = $min_size + (($value - $min_qty) * $step);
        switch($key) {
            case 'D' :
                $key_str = 'Democratic';
                break;
            case 'R' :
                $key_str = 'Republican';
                break;
            case 'I' :
                $key_str = 'Independent';
                break;
            case 'C' :
                $key_str = '';
                break;
            default :   
                $key_str = '';
        }
        echo '<p><a href="'.Router::url('/lawmakers/browse/party/'.$key).'" style="padding:5px;font-size: '.$size.'%"';
        echo ' title="'.$value.' lawmakers in  '.$key.'"';
        echo '>'.$key_str.'</a></p> ';
        $i++;
    }
*/
?>
</p>
<h3>.. or just <a href="<?php echo Router::url('/lawmakers/browse/'); ?>" title="Browse">Browse</a> them all.</h3>
            </div>

            <div class="widget">
                <h3 class="widgetTitleSbLeft">The States </h3>
                <div id="tagcloud">
<?php
    $max_size = 250; // max font size in %
    $min_size = 100; // min font size in %

    $max_qty = max(array_values($stateTagCloud));
    $min_qty = min(array_values($stateTagCloud));

    $spread = $max_qty - $min_qty;
    if (0 == $spread) { // we don't want to divide by zero
        $spread = 1;
    }

    $step = ($max_size - $min_size)/($spread);
    $i=0;
    foreach ($stateTagCloud as $key => $value) {
        $size = $min_size + (($value - $min_qty) * $step);
        echo '<a href="'.Router::url('/lawmakers/browse/state/'.$key).'" style="padding:2;font-size: '.$size.'%"';
        echo ' title="'.$value.' lawmakers in  '.$key.'"';
        echo '>'.$key.'</a> ';
        $i++;
    }

?>
<p></p>
                </div>
            </div>

            <div class="widget">
                <h3 class="widgetTitleSbLeft">Recent Entries </h3>
                <ul>
                Data here
                </ul>
            </div>
                    </div>

        <div class="clear"></div>
    </div>


    <div id="singlePostSidebarRight">
                                    <h3 class="photoGallery">Video Stream</h3>
        <ul id="singpPhotoGalleryList">
        Video feed
        </ul>

        <div id="innerSidebarRight">

        </div>
    </div>

