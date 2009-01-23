<div class="accounts index">
<h2><?php __('Accounts');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('lawmaker_id');?></th>
	<th><?php echo $paginator->sort('service_id');?></th>
	<th><?php echo $paginator->sort('service_type_id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('username');?></th>
	<th><?php echo $paginator->sort('account_url');?></th>
	<th><?php echo $paginator->sort('feed_url');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($accounts as $account):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $account['Account']['id']; ?>
		</td>
		<td>
			<?php echo $account['Account']['lawmaker_id']; ?>
		</td>
		<td>
			<?php echo $account['Account']['service_id']; ?>
		</td>
		<td>
			<?php echo $account['Account']['service_type_id']; ?>
		</td>
		<td>
			<?php echo $account['Account']['title']; ?>
		</td>
		<td>
			<?php echo $account['Account']['username']; ?>
		</td>
		<td>
			<?php echo $account['Account']['account_url']; ?>
		</td>
		<td>
			<?php echo $account['Account']['feed_url']; ?>
		</td>
		<td>
			<?php echo $account['Account']['created']; ?>
		</td>
		<td>
			<?php echo $account['Account']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $account['Account']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $account['Account']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $account['Account']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $account['Account']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Account', true), array('action'=>'add')); ?></li>
	</ul>
</div>
