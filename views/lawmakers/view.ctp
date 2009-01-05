<div id="content">
    <div class="post">
        <div class="entry">

<div id="profile_page">

<div id="profile_left">
    <h3><?php  __('Member Profile');?></h3>
    <p><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></p>

            <?php
                $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
                $this_person = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
                if(strlen($lawmaker['Lawmaker']['district']) == 1) {
                    $_district = '0'.$lawmaker['Lawmaker']['district'];
                }
                else {
                    $_district = $lawmaker['Lawmaker']['district'];
                }

                $openSecretWidgitData = $lawmaker['Lawmaker']['state'].$_district;
            ?>
            Title: <?php echo $lawmaker['Lawmaker']['title']; ?><br/>
			Name: <?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?><br/>
			Party-State-District: <?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>
            <br/>

        </p>
       <h3>MASHUP</h3> 
       <p> the public is saying...</p>
               <ul>
                    <li><img src="http://twitter.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/twitter/'. @urlencode($this_person)); ?>" title="Twitter Chatter">Twitter Post</a>  </li>
                    <li><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/friendfeed/'. @urlencode($this_person)); ?>" title="Friend Feed">FriendFeed Chatter</a>  </li>
                    <li><img src="http://backtype.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/comments/'.@urlencode($this_person)); ?>" title="Comments: Blogs">User Comments</a>  </li>
                    <li><img src="http://www.technorati.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/technorati/'.@urlencode($this_person)); ?>" title="Blog Chatter">Blogs Chatter</a> </li>
                    <li><img src="http://www.flickr.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/flickr/'.@urlencode($this_person)); ?>" title="Images">Flickr Images</a>  </li>
                    <li><img src="http://youtube.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/youtube/'.@urlencode($this_person)); ?>" title="Videos">Youtube Videos</a>  </li>
                    <li><img src="http://www.google.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/news/'. @urlencode($this_person)); ?>" title="News">Google News</a> </li>
                    <li><img src="http://www.eventful.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/eventful/'.@urlencode($this_person)); ?>" title="Event">EventFul</a> </li>
                    <!--<li> Audioscrobbler </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/similar/'.@urlencode($this_person)); ?>" title="Similar Artist">Similar Artist</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/albums/'.@urlencode($this_person)); ?>" title="Albums">Albums</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/tracks/'.@urlencode($this_person)); ?>" title="Top Tracks">Top Tracks</a> </li>-->
                    <!--<li><a href="./lyricwiki/<?php echo @urlencode($this_person); ?>" title="Lyrics">Lyrics</a> </li>-->
                </ul>
        
</div>
<div id="profile_right">
<h3>Contact Info</h3>
<p>
			<strong>Office</strong>:<br/> <?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>
			Phone: <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
			Fax: <?php echo $lawmaker['Lawmaker']['fax']; ?><br/>
			Website: 
            <?php 
            if(!empty($lawmaker['Lawmaker']['website'])) {
                echo '<a href="'.$lawmaker['Lawmaker']['website'].'" target="_new">click here</a>'; 
            }
            else {
                echo 'not found';
            }
            ?><br/>
            <p>
            <strong>Bio Information</strong>: <a href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            <strong>Voting</strong>: <a href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            <strong>Campaign Finance/Money</strong> : <a href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" target="_new">summary</a><br/>
            <strong>FEC Candidate Summary</strong> : <a href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            <strong>Congresspedia URL</strong>: <a href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new"><?php echo $congresspedia_name; ?></a><br/>
            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
               <strong> On the issues</strong>: <a href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                <strong>On the issues</strong>: <a href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?>
</p>
<h3>SuperWall</h3>
<p>
            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span> twitter social_stream <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php
            //$url = "http://www.govtrack.us/congress/person_api.xpd?id=".$lawmaker['Lawmaker']['govtrack_id'];
            //$response = @file_get_contents($url);
            ?>
            <?php } ?><br/>
</p>
<p>
<center>
<script type='text/javascript' src='http://www.opensecrets.org/widgets/races_widget.php?id=<?php echo $openSecretWidgitData; ?>'></script>
</center>
</p>
<p>
<center>
<?php // echo $this->element('industry_by_race', array('code' => $openSecretWidgitData)); ?>
</center>
</p>
</div> <!-- end profile_right -->
</div> <!-- end profile_page -->



        </div>
    </div>
</div>
