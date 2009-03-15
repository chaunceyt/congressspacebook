<div class="congressVotes form">
<?php echo $form->create('CongressVote');?>
	<fieldset>
 		<legend><?php __('Add CongressVote');?></legend>
	<?php
		echo $form->input('vote_id');
		echo $form->input('vote_date');
		echo $form->input('vote_where');
		echo $form->input('vote_roll');
		echo $form->input('vote_title');
		echo $form->input('vote_result');
		echo $form->input('vote_counts');
		echo $form->input('vote_bill_title');
		echo $form->input('vote_bill');
		echo $form->input('vote_admendment_title');
		echo $form->input('vote_admendment');
		echo $form->input('ts');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List CongressVotes', true), array('action'=>'index'));?></li>
	</ul>
</div>
