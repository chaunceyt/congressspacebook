<div class="services index">
<h2><?php __('Services');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('internal_name');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('service_type_id');?></th>
	<th><?php echo $paginator->sort('help');?></th>
	<th><?php echo $paginator->sort('icon');?></th>
	<th><?php echo $paginator->sort('has_feed');?></th>
	<th><?php echo $paginator->sort('is_contact');?></th>
	<th><?php echo $paginator->sort('minutes_between_updates');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($services as $service):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $service['Service']['id']; ?>
		</td>
		<td>
			<?php echo $service['Service']['internal_name']; ?>
		</td>
		<td>
			<?php echo $service['Service']['name']; ?>
		</td>
		<td>
			<?php echo $service['Service']['url']; ?>
		</td>
		<td>
			<?php echo $service['Service']['service_type_id']; ?>
		</td>
		<td>
			<?php echo $service['Service']['help']; ?>
		</td>
		<td>
			<?php echo $service['Service']['icon']; ?>
		</td>
		<td>
			<?php echo $service['Service']['has_feed']; ?>
		</td>
		<td>
			<?php echo $service['Service']['is_contact']; ?>
		</td>
		<td>
			<?php echo $service['Service']['minutes_between_updates']; ?>
		</td>
		<td>
			<?php echo $service['Service']['created']; ?>
		</td>
		<td>
			<?php echo $service['Service']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $service['Service']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $service['Service']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $service['Service']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $service['Service']['id'])); ?>
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
		<li><?php echo $html->link(__('New Service', true), array('action'=>'add')); ?></li>
	</ul>
</div>
