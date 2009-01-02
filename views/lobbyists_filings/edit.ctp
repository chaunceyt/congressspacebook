<div class="lobbyistsFilings form">
<?php echo $form->create('LobbyistsFiling');?>
	<fieldset>
 		<legend><?php __('Edit LobbyistsFiling');?></legend>
	<?php
		echo $form->input('filing_id');
		echo $form->input('filing_period');
		echo $form->input('filing_date');
		echo $form->input('filing_amount');
		echo $form->input('filing_year');
		echo $form->input('filing_type');
		echo $form->input('client_senate_id');
		echo $form->input('client_name');
		echo $form->input('client_country');
		echo $form->input('client_state');
		echo $form->input('client_ppb_country');
		echo $form->input('client_ppb_state');
		echo $form->input('client_description');
		echo $form->input('client_contact_firstname');
		echo $form->input('client_contact_middlename');
		echo $form->input('client_contact_lastname');
		echo $form->input('client_contact_suffix');
		echo $form->input('client_raw_contact_name');
		echo $form->input('registrant_senate_id');
		echo $form->input('registrant_name');
		echo $form->input('registrant_description');
		echo $form->input('registrant_address');
		echo $form->input('registrant_country');
		echo $form->input('registrant_ppb_country');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('LobbyistsFiling.filing_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('LobbyistsFiling.filing_id'))); ?></li>
		<li><?php echo $html->link(__('List LobbyistsFilings', true), array('action'=>'index'));?></li>
	</ul>
</div>
