<div class="congressBills form">
<?php echo $form->create('CongressBill');?>
	<fieldset>
 		<legend><?php __('Add CongressBill');?></legend>
	<?php
		echo $form->input('bill_num');
		echo $form->input('bill_type');
		echo $form->input('bill_title');
		echo $form->input('bill_official_title');
		echo $form->input('bill_last_action');
		echo $form->input('bill_status');
		echo $form->input('ts');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List CongressBills', true), array('action'=>'index'));?></li>
	</ul>
</div>
