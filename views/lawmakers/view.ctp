<div id="content">
    <div class="post">
        <div class="entry">

<div class="lawmakers view">
<h2><?php  __('US '.$lawmaker['Lawmaker']['title']);?></h2>
<table>
<tr>
<td valign="top">
 <span><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></span>
</td>
<td valign="top">
            <?php echo $lawmaker['Lawmaker']['title']; ?>
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?>
			[<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>]
            <br/>
			Phone: <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
			Fax: <?php echo $lawmaker['Lawmaker']['fax']; ?><br/>
			Website: <?php echo $lawmaker['Lawmaker']['website']; ?><br/>
			Office: <?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>
            <p>mashup:
            <span><a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="Latest News"> news</a> </span>
            <span><a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter">blogs</a> </span>
            <span><a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs">comments</a>  </span>
            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span><a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php
            $url = "http://www.govtrack.us/congress/person_api.xpd?id=".$lawmaker['Lawmaker']['govtrack_id'];
            $response = @file_get_contents($url);
            ?>

            <?php } ?><br/>
            Biographical Information <a href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            Voting: <a href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            Campaign Finance/Money : <a href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" target="_new">summary</a><br/>
            FEC Candidate Summary : <a href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            Congresspedia URL: <a href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new"><?php echo $congresspedia_name; ?></a><br/>

            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
                On the issues: <a href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                On the issues: <a href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?>
        </p>
        <br/>

</td>
</tr>
</table>
</div>

        </div>
    </div>
</div>
