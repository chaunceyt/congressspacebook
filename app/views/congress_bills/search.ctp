<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">

<h2><?php __('Congressional Bills');?></h2>
<span style="margin:0 auto"><?php echo $this->element('congress_bills_search'); ?></span>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% congressional bills out of %count% total', true)
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
			<p><?php echo $congressBill['CongressBill']['bill_official_title']; ?></p><br/>
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
