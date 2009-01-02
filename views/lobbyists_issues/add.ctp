<div class="lobbyistsIssues form">
<?php echo $form->create('LobbyistsIssue');?>
	<fieldset>
 		<legend><?php __('Add LobbyistsIssue');?></legend>
	<?php
		echo $form->input('code');
		echo $form->input('specific_issue');
		echo $form->input('filing_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List LobbyistsIssues', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lobbyists Filing', true), array('controller'=> 'lobbyists_filings', 'action'=>'add')); ?> </li>
	</ul>
</div>
