<?php echo $this->element('foaf', array('lawmaker' => $lawmaker)); ?>
<script type="text/javascript">
            $(function() {
                $("#rotate > ul").tabs();
            });
</script>

<?php 
if(strlen($lawmaker['Lawmaker']['district']) == 1) {
    $_district = '0'.$lawmaker['Lawmaker']['district'];
}
else {
    $_district = $lawmaker['Lawmaker']['district'];
}
$widgetID = $lawmaker['Lawmaker']['state'].$_district;
$_year_ = date("Y")-1;
?>

    <!--<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAASRRg767hPjhGnvMC6zjRwRSw4_dCU545QaPZjzXUEikk77PCGhRY6K5QLtCcNsRoLC86QN_6vp7DDA"
          type="text/javascript"></script>-->
<div id="content">
    <div class="post">
        <div class="entry">
            <div id="profile_page">

            <div id="profile_left">

    <p><h4> <?php echo $lawmaker['Lawmaker']['title']; ?> 
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?></h4><br/>
    </p>        
    <p class="profile_thumb_img">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
            <a href="<?php echo Router::url('/profiles/'.$username); ?>"><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="" /></a>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" />

            <?php } ?>
    
    <br/>
			<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>
            </p>
         <p><strong>Information</strong></p>   
            <?php
            if(isset($candSummary)) {
                    echo 'First Elected: '. $candSummary->summary->attributes()->first_elected . '<br/>';
            }
            ?>
           Office :<br/><?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>

            <?php
                $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
                $this_person = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];

                $openSecretWidgitData = $lawmaker['Lawmaker']['state'].$_district;
            ?>
            <br/>

        </p>
			Phone:<br/> <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
			Fax:<br/> <?php echo $lawmaker['Lawmaker']['fax']; ?><br/>
			Website: <br/>
            <?php 
            if(!empty($lawmaker['Lawmaker']['website'])) {
                echo '<a href="'.$lawmaker['Lawmaker']['website'].'" target="_new">'.$lawmaker['Lawmaker']['website'].'</a>'; 
            }
            else {
                echo 'not found';
            }
            ?><br/>
            <p>
            <?php
           
            ?>
            </p>

<p>
<p style="font-size:13px"><strong>Top Friends</strong></p>
<?php
$i=0;
foreach ($profile_top_friends as $current) {
    $fullname = $current['lawmaker']['firstname'].' '.$current['lawmaker']['lastname'];

?>
        <span><a class="url" rel="me co-resident colleague" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img src="<?php echo Router::url('/img/lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0" />
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" width="40" height="50"/>

            <?php } ?>

        </a></span>

<?php
    }
?>
</p>
<p>
<p style="font-size:13px"><strong>Friends</strong></p>
<?php
$i=0;
foreach ($profile_friends as $current) {
    $fullname = $current['lawmaker']['firstname'].' '.$current['lawmaker']['lastname'];

?>
        <span><a class="url" rel="me colleague" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
        <img src="<?php echo Router::url('/img/lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0" />
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" width="40" height="50"/>

            <?php } ?>


<?php
    }
?>
</p>


        <p></p>
       <h3> the public is saying...</h3>
               <ul>
                    <li><img src="http://twitter.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/twitter/'. @urlencode($this_person)); ?>" title="Twitter Chatter">Twitter Post</a>  </li>
                    <li><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/friendfeed/'. @urlencode($this_person)); ?>" title="Friend Feed">FriendFeed Chatter</a>  </li>
                    <li><img src="http://backtype.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/comments/'.@urlencode($this_person)); ?>" title="Comments: Blogs">User Comments</a>  </li>
                    <li><img src="http://www.technorati.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/technorati/'.@urlencode($this_person)); ?>" title="Blog Chatter">Blogs Chatter</a> </li>
                    <li><img src="http://www.google.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/news/'. @urlencode($this_person)); ?>" title="News">Google News</a> </li>
                    <!--<li> Audioscrobbler </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/similar/'.@urlencode($this_person)); ?>" title="Similar Artist">Similar Artist</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/albums/'.@urlencode($this_person)); ?>" title="Albums">Albums</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/tracks/'.@urlencode($this_person)); ?>" title="Top Tracks">Top Tracks</a> </li>-->
                    <!--<li><a href="./lyricwiki/<?php echo @urlencode($this_person); ?>" title="Lyrics">Lyrics</a> </li>-->
                </ul>
        
    </div>

    <div id="profile_right">
    <h2 style="padding-top:20px;"><p style="text-align:center">Member's Fundraising Report</p></h2>
<?php
if(isset($_page_)) {
    if($_page_ == 'contributors') {
        echo $this->element('lawmakers_contributors', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'sectors') {
        echo $this->element('lawmakers_sectors', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'fedspending') {
        echo $this->element('lawmakers_fedspending', array('_year_' => $_year_, 'fedSpending' => $fedSpending)); 
    }
    else if($_page_ == 'industries')  {
        echo $this->element('lawmakers_industries', array('_year_' => $_year_)); 
    }
}//see if $_page_ isset
else {
        echo $this->element('lawmakers_fundrasing', array('_year_' => $_year_)); 
}
?>
    </div> <!-- end profile_right -->
    </div> <!-- end profile_page -->
</div>
        </div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

