<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">

<h2><?php __('Congress Bills Blog');?></h2>
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

		<h3>
        <?php echo $congressBill['CongressBill']['bill_title']; ?>
        </h3>
        </p>
		<p class="byline">	
	    <?php echo $congressBill['CongressBill']['bill_status']; ?> - 
        <?php echo $time->niceShort($congressBill['CongressBill']['bill_last_action']); ?> 
        </p>
			<?php echo $congressBill['CongressBill']['bill_official_title']; ?>
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
