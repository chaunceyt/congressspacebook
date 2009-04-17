<div class="congressionalReports form">
<?php echo $form->create('CongressionalReport');?>
	<fieldset>
 		<legend><?php __('Edit CongressionalReport');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('filename');
		echo $form->input('location');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('CongressionalReport.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('CongressionalReport.id'))); ?></li>
		<li><?php echo $html->link(__('List CongressionalReports', true), array('action'=>'index'));?></li>
	</ul>
</div>
