<div class="accounts form">
<?php echo $form->create('Account');?>
	<fieldset>
 		<legend><?php __('Edit Account');?></legend>
	<?php
		echo $form->input('id');
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Account.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Account.id'))); ?></li>
		<li><?php echo $html->link(__('List Accounts', true), array('action'=>'index'));?></li>
	</ul>
</div>
