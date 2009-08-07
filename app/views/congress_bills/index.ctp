<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">

<h2><?php __('Congressional Bills');?></h2>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<?php
$i = 0;
foreach ($congressBills as $congressBill):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
 <div class="blogDetails">

		<p>
        <strong>
        <?php echo $congressBill['CongressBill']['bill_title']; ?>
        </strong><br/>
			<?php echo $congressBill['CongressBill']['bill_official_title']; ?><br/>
	    <?php echo ucfirst($congressBill['CongressBill']['bill_status']); ?> - 
        <?php echo $time->nice($congressBill['CongressBill']['bill_last_action']); ?><br/> 
        </p>
		<p>	
        </p>
    </div>
<?php endforeach; ?>
</div>
<p></p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</div>
</div>
