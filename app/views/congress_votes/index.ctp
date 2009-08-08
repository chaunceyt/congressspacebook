<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">

<h2><?php __('Congressional Votes');?></h2>
<span style="margin:0 auto"><?php echo $this->element('congress_votes_search'); ?></span>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% votes out of %count% total', true)
));
?></p>
<?php
$i = 0;
foreach ($congressVotes as $congressVote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
			<p><strong><?php echo $congressVote['CongressVote']['vote_title']; ?></strong><br/>
			<?php echo $time->nice($congressVote['CongressVote']['vote_date']); ?><br/>
            <?php echo ucfirst($congressVote['CongressVote']['vote_where']); ?> Roll: <?php echo $congressVote['CongressVote']['vote_roll']; ?> 
			vote:  <a href="http://www.govtrack.us/congress/vote.xpd?vote=<?php echo $congressVote['CongressVote']['vote_id']; ?>" target="_blank"><?php echo $congressVote['CongressVote']['vote_id']; ?></a>, 
            result: <?php echo $congressVote['CongressVote']['vote_result']; ?>,   counts: <?php echo $congressVote['CongressVote']['vote_counts']; ?><br/>
            Bill: <a href="http://www.govtrack.us/congress/bill.xpd?bill=<?php echo $congressVote['CongressVote']['vote_bill']; ?>" target="_blank"><?php echo $congressVote['CongressVote']['vote_bill']; ?></a> 
			<?php echo $congressVote['CongressVote']['vote_bill_title']; ?>
            <?php
            if(!empty($congressVote['CongressVote']['vote_admendment_title']) && !empty($congressVote['CongressVote']['vote_admendment'])) { ?>
            Admendment Title:<?php echo $congressVote['CongressVote']['vote_admendment_title']; ?><br/>
			Admendment: <?php echo $congressVote['CongressVote']['vote_admendment']; ?>
            </p>
            <?php } ?>
<?php endforeach; ?>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p><span>source: <a href="http://govtrack.us/" title="Govtrack.us" target="_new">Govtrack.us</a></span></p>
</div>
</div>
</div>
