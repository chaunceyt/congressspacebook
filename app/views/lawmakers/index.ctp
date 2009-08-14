<div id="content">
    <div class="post">
        <div class="entry">
<div id="homepage_page">
<div id="homepage_right">
<h2>...striving to make Congress more accountable and transparent...</h2>
<?php
$today = date("F j, Y, g:i a");
echo '<small> by congressSB - '.$today.'</small>';
?>
</p>
<br/>
<br/>
<p>Here we're tracking each member's voting records, FEC reports, Campaign Finance summary, their opinions on the issues, and even their state's federal spending reports. </p>

<?php /* ?>
<p>
View the congressional <a href="<?php echo Router::url('/congressional_reports/'); ?>">reports</a> and search, 
<a href="<?php echo Router::url('/congress_votes/'); ?>">votes</a> and/or, 
<a href="<?php echo Router::url('/congress_bills/'); ?>">bills</a> and then
find out who is <a href="<?php echo Router::url('/congress_parties/'); ?>">partying</a> with who and where and when.
</p>
<p><h2>Browse  <a href="<?php echo Router::url('/lawmakers/browse/house'); ?>" title="House">House</a> or <a href="<?php echo Router::url('/lawmakers/browse/senate'); ?>" title="Senate">Senate</a> Members</h2></p>
<p style="margin-top:15px">
View by letter: 
<?php
$letters = range('a','z');
foreach($letters as $letter) {
    echo '<span style="padding:1px;font-size:16px;"><a href="'.Router::url('/lawmakers/browse/letter/'.strtoupper($letter)).'" title="'.strtoupper($letter).'"><strong>'.strtoupper($letter).'</a></strong></span>';
}
?>
</p>
<p style="margin-top:15px;"> So you know ...! some of our congressional members are using <strong><a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">twitter</a> and <a href="<?php echo Router::url('/lawmakers_with_youtube_channel'); ?>">youtube</a></strong> to get their message out.
</p>
<p>
<strong>...see who's has</strong>
the most bills <a href="<?php echo Router::url('/lawmakers/top/enacted'); ?>" title="Top 100 Lawmakers to Enact Laws">enacted</a>,  
the most <a href="<?php echo Router::url('/lawmakers/top/novote'); ?>" title="Top 100 Lawmakers with the most No Votes">novotes</a>, 
and <a href="<?php echo Router::url('/lawmakers/top/cosponsored'); ?>" title="Top 100 Lawmakers who co-sponsored the most Bills">co-sponsored</a> the most bills...<br/>
</p>
<?php */ ?>
<p><?php echo $this->element('congress'); ?></p>
<br/>
<p><small>0 COMMENTS</small></p>
<?php /* ?>
<?php */ ?>
<hr noshade />
<br/>
<h2><small>Stay Informed! Take Action in your Political Scene.</small></h2>
<p>
<?php
$today = date("F j, Y, g:i a");
echo '<small> by congressSB - '.$today.'</small>';
?>
</p>
<p><span style="margin:0 auto"><?php echo $this->element('mydistrict_search'); ?></span></p>
<br/>
<p><small>0 COMMENTS</small></p>
<hr noshade />
<p><h2>Poll(s) <br/> <small>American Recovery and Reinvestment Act</small> <a href="/recoveryact_100days_report" title="100 Days 100 Projects" target="_blank">100-Days-100-Projects</a></h2></p>
<br/>
<p>
<?php
/*
echo '<p><h2>Whitehouse Video Stream</h2></p>';

foreach($videos as $yt_username) {
    $yt_url = 'http://gdata.youtube.com/feeds/base/users/'.trim($yt_username).'/uploads?alt=rss&v=2&client=ytapi-youtube-profile';
    $site->getYoutubeVideoRss($yt_url);
}
*/
?>
</p>



</div>

<div id="homepage_left">
<h2>You are from: <?php echo $current_webuser->region; ?> </h2>
<p><a style="hover:none;" href="<?php echo Router::url('/nearby/lawmakers'); ?>">
<img src="<?php echo Router::url('/'); ?>img/states/<?php echo strtolower($current_webuser->region); ?>.png" alt="default" border="0" /></p></a>

<?php /* ?>
<h3>Browse other states</h3>
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
<h3>Browse by party</h3> 
<p></p>
<p>
<?php
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

?>
</p>
<?php */ ?>
<?php echo $this->element('state_senators'); ?>
<h3><a href="<?php echo Router::url('/lawmakers/browse/'); ?>" title="Browse">Browse</a> all</h3>
<br/>
</div> <!-- page_left -->
</div>
</p>
<p></p>
</div>
    </div>

</div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
</div>
<?php
//print_r($webuser_district);
?>
