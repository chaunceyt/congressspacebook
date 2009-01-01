<div class="lawmakers form">
<?php echo $form->create('Lawmaker');?>
	<fieldset>
 		<legend><?php __('Add Lawmaker');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('firstrname');
		echo $form->input('middlename');
		echo $form->input('lastname');
		echo $form->input('name_suffix');
		echo $form->input('nickname');
		echo $form->input('party');
		echo $form->input('state');
		echo $form->input('district');
		echo $form->input('in_office');
		echo $form->input('gender');
		echo $form->input('phone');
		echo $form->input('fax');
		echo $form->input('website');
		echo $form->input('webform,email');
		echo $form->input('congress_office');
		echo $form->input('bioguide_id');
		echo $form->input('votesmart_id');
		echo $form->input('fec_id');
		echo $form->input('govtrack_id');
		echo $form->input('crp_id');
		echo $form->input('eventful_id');
		echo $form->input('sunlight_old_id');
		echo $form->input('twitter_id');
		echo $form->input('congresspedia_url');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Lawmakers', true), array('action'=>'index'));?></li>
	</ul>
</div>
