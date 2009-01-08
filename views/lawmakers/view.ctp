<?php 
echo $javascript->includeScript('jquery');
echo $javascript->includeScript('jquery.dimensions');
echo $javascript->includeScript('jquery.accordion');
?>
    <script type="text/javascript">
    jQuery().ready(function(){
        // simple accordion
        jQuery('#list1a').accordion();
        jQuery('#list1b').accordion({
            autoheight: false
        });
        // bind to change event of select to control first and seconds accordion
        // similar to tab's plugin triggerTab(), without an extra method
        var accordions = jQuery('#list1a, #list1b');
        
        jQuery('#switch select').change(function() {
            accordions.accordion("activate", this.selectedIndex-1 );
        });
        jQuery('#close').click(function() {
            accordions.accordion("activate", -1);
        });
        jQuery('#switch2').change(function() {
            accordions.accordion("activate", this.value);
        });
        jQuery('#enable').click(function() {
            accordions.accordion("enable");
        });
        jQuery('#disable').click(function() {
            accordions.accordion("disable");
        });
        jQuery('#remove').click(function() {
            accordions.accordion("destroy");
            wizardButtons.unbind("click");
        });
});
    </script>
<div id="content">
    <div class="post">
        <div class="entry">
<div id="profile_header"><h2>Member Profile</h2></div>
<div id="profile_page">

<div id="profile_left">
    <p class="profile_thumb_img"><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></p>

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
            <?php echo $lawmaker['Lawmaker']['title']; ?> 
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?><br/>
			<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>
            <br/>

        </p>
            <?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>
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
            <?php
           
            if(isset($candSummary)) {
                    echo 'First Elected: '. $candSummary->summary->attributes()->first_elected . '<br/>';
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
<h2>Members Fundraising</h2>
<p>
<img src="http://chart.apis.google.com/chart?
chs=260x100
&amp;chd=t:<?php echo trim($candSummary->summary->attributes()->total);?>,<?php echo trim($candSummary->summary->attributes()->spent);?>,<?php echo trim($candSummary->summary->attributes()->cash_on_hand);?>,<?php echo trim($candSummary->summary->attributes()->debt);?>
&amp;cht=p3
&amp;chl=Raised|Spent|Cash|Debt"
alt="Sample chart" /><br/>
</p>
<p style="text-aligh:center">Last updated: <?php echo $candSummary->summary->attributes()->last_updated; ?></p>
<p>
Raised: $<?php echo number_format($candSummary->summary->attributes()->total);?><br/>
Spent: $<?php echo number_format($candSummary->summary->attributes()->spent);?><br/>
Cash Available: $<?php echo number_format($candSummary->summary->attributes()->cash_on_hand);?><br/>
Debt: $<?php echo number_format($candSummary->summary->attributes()->debt);?><br/>
</p>

            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span> twitter social_stream <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php } ?><br/>
       <?php if(!isset($candContrib, $candIndustry, $candSector)) { ?>
       <a><h4>Info</h4></a>
       <div>
            <p style="padding-top:10px;">
            <strong>Bio Information</strong>: <a href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            <strong>Campaign Finance/Money</strong> : <a href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" target="_new">summary</a><br/>
            <strong>Congresspedia URL</strong>: <a href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new">about</a><br/>
            <strong>FEC Candidate Summary</strong> : <a href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
               <strong> On the issues</strong>: <a href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                <strong>On the issues</strong>: <a href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?><br/>
            <strong>Voting</strong>: <a href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            </p>
            </div>
       <?php } ?>     
<div id="list1a">

    <?php if(isset($candContrib)) { ?>
            <a><h4>Contributors</h4></a>
            <div>
            <table style="width:100%;">
            <?php
              for($i=0; $i < sizeof($candContrib->contributors->contributor); $i++) {     
                  echo '<tr>';
                  echo  '<td>'.$candContrib->contributors->contributor[$i]->attributes()->org_name . '</td>   <td style="text-align:right"> $' . number_format($candContrib->contributors->contributor[$i]->attributes()->total) .'</td>';
                  echo '</tr>';
               }
            ?>
            </table>
            </div>
    <?php } ?> 
    <?php if(isset($candIndustry)) { ?>
            <a><h4>Industries</h4></a>
            
            <div>
            <table style="width:100%;">
            <?php
              for($i=0; $i < sizeof($candIndustry->industries->industry); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candIndustry->industries->industry[$i]->attributes()->industry_name . '</td>';
                  echo '<td  style="text-align:right"> $'.number_format($candIndustry->industries->industry[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
            </div>
      <?php } ?>
      <?php if(isset($candSector)) { ?>
            <a><h4>Sectors</h4></a>
            <div>
            
            <table style="width:100%;">
            <?php
              for($i=0; $i < sizeof($candSector->sectors->sector); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candSector->sectors->sector[$i]->attributes()->sector_name . '</td>';
                  echo '<td  style="text-align:right;"> $'.number_format($candSector->sectors->sector[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
            </div>
      <?php } ?>       
            
</div>
</div> <!-- end profile_right -->
</div> <!-- end profile_page -->



        </div>
    </div>
</div>
