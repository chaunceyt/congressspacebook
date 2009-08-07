<div class="congressParties form">
<?php echo $form->create('CongressParty');?>
	<fieldset>
 		<legend><?php __('Edit CongressParty');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('Beneficiary');
		echo $form->input('Host');
		echo $form->input('Other_Members');
		echo $form->input('Start_Date');
		echo $form->input('End_Date');
		echo $form->input('Start_Time');
		echo $form->input('End_Time');
		echo $form->input('Entertainment_Type');
		echo $form->input('Venue_Name');
		echo $form->input('Venue_Address1');
		echo $form->input('Venue_Address2');
		echo $form->input('Venue_City');
		echo $form->input('Venue_State');
		echo $form->input('Venue_Zipcode');
		echo $form->input('Venue_Website');
		echo $form->input('LatLong');
		echo $form->input('Contributions_Info');
		echo $form->input('Make_Checks_Payable_To');
		echo $form->input('Checks_Payable_To_Address');
		echo $form->input('Committee_Id');
		echo $form->input('RSVP_Info');
		echo $form->input('Distribution_Paid_for_By');
		echo $form->input('ts');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('CongressParty.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('CongressParty.id'))); ?></li>
		<li><?php echo $html->link(__('List CongressParties', true), array('action'=>'index'));?></li>
	</ul>
</div>
