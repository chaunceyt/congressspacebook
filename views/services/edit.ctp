<div class="services form">
<?php echo $form->create('Service');?>
	<fieldset>
 		<legend><?php __('Edit Service');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('internal_name');
		echo $form->input('name');
		echo $form->input('url');
		echo $form->input('service_type_id');
		echo $form->input('help');
		echo $form->input('icon');
		echo $form->input('has_feed');
		echo $form->input('is_contact');
		echo $form->input('minutes_between_updates');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Service.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Service.id'))); ?></li>
		<li><?php echo $html->link(__('List Services', true), array('action'=>'index'));?></li>
	</ul>
</div>
