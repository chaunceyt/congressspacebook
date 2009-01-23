<?php echo $this->element('foaf', array('lawmaker' => $lawmaker)); ?>
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
    <div class="vcard">
    <div class="fn org">
    <p><h4> <?php echo $lawmaker['Lawmaker']['title']; ?> 
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?></h4><br/>
    </p>
    </div>

    <p class="profile_thumb_img">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
            <a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$username); ?>"><img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="" /></a>
            <?php } else {  ?>
                <img class="photo fn" src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" />

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
        <div class="adr">    
          <div class="street-address"> Office :<br/><?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/></div>
        </div>
     </div>   
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
        <span><a class="url" rel="contact met colleague co-resident friend" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
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
        <span><a class="url" rel="contact met colleague friend" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
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

<div id="member-container">
<ul id="member-menu">
<?php
//this is a hack. dealing with nav links
if(!isset($_page_)) {
    $_page_ = 'history';
}
?>
<?php if($_page_ == 'history') { ?>
    <li><a href="<?php echo Router::url('/profiles/'.$username.''); ?>" title="Home" class="current">Info</a></li>
<?php } else { ?>
    <li><a href="<?php echo Router::url('/profiles/'.$username.''); ?>" title="Home">Info</a></li>
<?php } ?>
<?php
    if($_page_ == 'bills') {?>
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/bills'); ?>" title="Home" class="current">Bills</a></li>
<?php  
    }
    else { ?>
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/bills'); ?>" title="Home">Bills</a></li>
<?php } ?>

<?php
    if($_page_ == 'fundraising' || $_page_ == 'contributors' || $_page_ == 'industries' || $_page_ == 'sectors') {?>
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/fundraising'); ?>" title="Home" class="current">Fund Raising</a></li>
<?php  
    }
    else { ?>
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/fundraising'); ?>" title="Home">Fund Raising</a></li>
<?php } ?>
    <li><a href="<?php echo Router::url('/profiles/'.$username.'/state'); ?>" title="Home">My State</a></li>
<?php

    if($_page_ == 'wall') {?>
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/wall'); ?>" title="Home" class="current">Wall</a></li>
<?php  
    }
    else { ?>        
        <li><a href="<?php echo Router::url('/profiles/'.$username.'/wall'); ?>" title="Home">Wall</a></li>
<?php } ?>

</ul>
</div>

    <div id="fragment-1" style="padding-left:25px;">

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
    else if($_page_ == 'history')  {
        echo $this->element('lawmakers_history', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'fundraising')  {
        echo $this->element('lawmakers_fundrasing', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'bills')  {
        echo $this->element('lawmakers_sponsoredbills', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'wall')  {
        echo $this->element('lawmakers_wall', array('_year_' => $_year_)); 
    }
    else if($_page_ == 'state')  {
        echo $this->element('lawmakers_state', array('_year_' => $_year_)); 
    }
}//see if $_page_ isset
else {
        echo $this->element('lawmakers_history', array('_year_' => $_year_)); 
}
?>
</div>

<div id="fragment-2" style="padding-left:220px;">
<p></p>
<p>
<?php
//$govtrack_results;
//echo $govtrack_results->Title .' '. $govtrack_results->FullName."<br/>"; 
?>
</p>

</div>
    </div> <!-- end profile_right -->
    </div> <!-- end profile_page -->
</div>
        </div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

