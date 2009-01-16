<p></p>
<p style="text-aligh:center">Last updated: <?php echo $candSummary->summary->attributes()->last_updated; ?></p>
<p>
Raised: $<?php echo number_format($candSummary->summary->attributes()->total);?><br/>
Spent: $<?php echo number_format($candSummary->summary->attributes()->spent);?><br/>
Cash Available: $<?php echo number_format($candSummary->summary->attributes()->cash_on_hand);?><br/>
Debt: $<?php echo number_format($candSummary->summary->attributes()->debt);?><br/>
</p>
<p>
View by: 
<a href="<?php echo Router::url('/profiles/'.$username.'/contributors'); ?>">Contributors</a>
<a href="<?php echo Router::url('/profiles/'.$username.'/industries'); ?>">Industries</a>
<a href="<?php echo Router::url('/profiles/'.$username.'/sectors'); ?>">Sectors</a>
</p>


<!--
<p style="text-align:center">
<img src="http://chart.apis.google.com/chart?
chs=300x100
&amp;chd=t:<?php echo trim($candSummary->summary->attributes()->total);?>,<?php echo trim($candSummary->summary->attributes()->spent);?>,<?php echo trim($candSummary->summary->attributes()->cash_on_hand);?>,<?php echo trim($candSummary->summary->attributes()->debt);?>
&amp;cht=p3
&amp;chl=Raised|Spent|Cash|Debt"
alt="Member Fundraising" /><br/>
</p>
-->
<h2><p style="text-align:center">avg. to other House members</p></h2>
<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/totVSavg.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>&chamber=H" alt="" border="0" /></a><br/><span>source: opensecrets.org</span> </p>
<h2><p style="text-align:center">avg. to other Senate members</p></h2>
<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/totVSavg.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>&chamber=S" alt="" border="0" /></a><br/><span>source: opensecrets.org</span> </p>
<h2><p style="text-align:center">Member's Honesty Meter</p></h2>
<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/scoff_img.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" alt="" border="0" /></a><br/><span>source: opensecrets.org</span> </p>

            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span> twitter social_stream <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php } ?><br/>
<?php //fixme: do not remove the last 2 div it will break.. ?>
</div>
</div>

