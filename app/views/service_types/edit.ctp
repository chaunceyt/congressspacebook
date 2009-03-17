<div class="serviceTypes form">
<?php echo $form->create('ServiceType');?>
	<fieldset>
 		<legend><?php __('Edit ServiceType');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('token');
		echo $form->input('name');
		echo $form->input('intro');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ServiceType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ServiceType.id'))); ?></li>
		<li><?php echo $html->link(__('List ServiceTypes', true), array('action'=>'index'));?></li>
	</ul>
</div>
