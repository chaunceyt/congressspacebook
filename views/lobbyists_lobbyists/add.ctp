<div class="lobbyistsLobbyists form">
<?php echo $form->create('LobbyistsLobbyist');?>
	<fieldset>
 		<legend><?php __('Add LobbyistsLobbyist');?></legend>
	<?php
		echo $form->input('firstname');
		echo $form->input('middlename');
		echo $form->input('lastname');
		echo $form->input('suffix');
		echo $form->input('official_position');
		echo $form->input('raw_name');
		echo $form->input('filing_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List LobbyistsLobbyists', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lobbyists Filing', true), array('controller'=> 'lobbyists_filings', 'action'=>'add')); ?> </li>
	</ul>
</div>
