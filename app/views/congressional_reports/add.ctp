<div class="congressionalReports form">
<?php echo $form->create('CongressionalReport');?>
	<fieldset>
 		<legend><?php __('Add CongressionalReport');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('filename');
		echo $form->input('location');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List CongressionalReports', true), array('action'=>'index'));?></li>
	</ul>
</div>
