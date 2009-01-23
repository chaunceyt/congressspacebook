<div class="serviceTypes form">
<?php echo $form->create('ServiceType');?>
	<fieldset>
 		<legend><?php __('Add ServiceType');?></legend>
	<?php
		echo $form->input('token');
		echo $form->input('name');
		echo $form->input('intro');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ServiceTypes', true), array('action'=>'index'));?></li>
	</ul>
</div>
