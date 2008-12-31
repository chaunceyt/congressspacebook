<div id="content">
    <div class="post">

        <div class="entry">

<div class="accounts index">
<h2><?php __('Your Social Accounts');?></h2>
<p>
<?php echo $html->link(__('Add another one...', true), array('action'=>'add')); ?>
<?php
/*
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
*/
?></p>
<table cellpadding="0" cellspacing="5">
<?php
$i = 0;
foreach ($accounts as $account):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr>
		<td>
			<img src="<?php echo $account['Service']['url']; ?>/favicon.ico" class="favicon" width="16" /> <?php echo $account['Service']['name']; ?>
		</td>
		<td> 
			<?php echo $account['Account']['title']; ?>
		</td>
		<td>
			<?php echo $account['Account']['username']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Remove', true), array('action'=>'delete', $account['Account']['id']), null, sprintf(__('Are you sure you want to delete the account:  %s?', true), $account['Service']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<!--<div class="paging">
	<?php //echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php //echo $paginator->numbers();?>
	<?php //echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>-->
        </div>
    </div>
</div>
