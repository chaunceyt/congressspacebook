<div class="lobbyistsIssues form">
<?php echo $form->create('LobbyistsIssue');?>
	<fieldset>
 		<legend><?php __('Edit LobbyistsIssue');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('code');
		echo $form->input('specific_issue');
		echo $form->input('filing_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('LobbyistsIssue.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('LobbyistsIssue.id'))); ?></li>
		<li><?php echo $html->link(__('List LobbyistsIssues', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lobbyists Filing', true), array('controller'=> 'lobbyists_filings', 'action'=>'add')); ?> </li>
	</ul>
</div>
