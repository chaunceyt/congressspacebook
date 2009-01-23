<div class="accounts form">
<?php echo $form->create('Account');?>
	<fieldset>
 		<legend><?php __('Add Account');?></legend>
	<?php
		echo $form->input('lawmaker_id');
		echo $form->input('service_id');
		echo $form->input('service_type_id');
		echo $form->input('title');
		echo $form->input('username');
		echo $form->input('account_url');
		echo $form->input('feed_url');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Accounts', true), array('action'=>'index'));?></li>
	</ul>
</div>
