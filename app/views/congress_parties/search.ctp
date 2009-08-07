<div id="content">
    <div class="post">
            <div class="entry" style="padding-left:90px;">


<div class="congressParties index">
<h2><?php __('Congressional Events/Party Invite(s)');?></h2>

<span style="margin:0 auto"><?php echo $this->element('congress_party_search'); ?></span>

<?php
if(isset($this->params['pass'][0])) {
    $paginator->options(array('url' => '/'.$this->params['pass'][0]));
}
?>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Invite %page% of %pages%, showing %current% events/parties out of %count% total', true)
));

?></p>
<?php
$i = 0;
if(sizeof($congressParties) == 0) {
    echo 'No records found!';
}
else {

foreach ($congressParties as $congressParty):
?>
		
	<div style="margin-left: 10px; border: #929292 dashed 1px; padding: 10px;">
    <h1>EVENT NOTICE</h1>
			<h3> <?php echo stripslashes($congressParty['CongressParty']['Entertainment_Type']); ?> for: <?php echo $congressParty['CongressParty']['Beneficiary']; ?></h3>
		
		
			<p>Hosts: <br/> <?php echo str_replace('||','<br/>',$congressParty['CongressParty']['Host']); ?></p>
		
		
			<p>Other Beneficiary: <br/>
            <?php 
                $other_members =   str_replace('||','<br/>',$congressParty['CongressParty']['Other_Members']);
                echo $other_members;
            ?>
            </p>
		
		
			<p>Start Date: <?php echo $congressParty['CongressParty']['Start_Date']; ?> - End Date: <?php echo $congressParty['CongressParty']['End_Date']; ?><br/>
			Start Time: <?php echo $congressParty['CongressParty']['Start_Time']; ?> - End Time: <?php echo $congressParty['CongressParty']['End_Time']; ?></p>
		
		
			<p>
		
		
			<strong> <?php echo $congressParty['CongressParty']['Venue_Name']; ?></strong><br/>
		
		
			Address: <?php echo $congressParty['CongressParty']['Venue_Address1']; ?><br/>
			<?php echo $congressParty['CongressParty']['Venue_Address2']; ?><br/>
			<?php echo $congressParty['CongressParty']['Venue_City']; ?>	
			<?php echo $congressParty['CongressParty']['Venue_State']; ?>,
            <?php echo $congressParty['CongressParty']['Venue_Zipcode']; ?>
            </p>
		
		
			<p>Website: <?php echo $congressParty['CongressParty']['Venue_Website']; ?></p>
			<?php // echo $congressParty['CongressParty']['LatLong']; ?>
			
            <p>Contribution Info:<br/> <?php echo str_replace(';','<br/>',$congressParty['CongressParty']['Contributions_Info']); ?></p>
		
			<p>Make Check Payable to:<br/><strong> <?php echo $congressParty['CongressParty']['Make_Checks_Payable_To']; ?></strong><br/>
		
			<?php echo str_replace(';','<br/>',$congressParty['CongressParty']['Checks_Payable_To_Address']); ?></p>
		
			<p><?php echo $congressParty['CongressParty']['Committee_Id']; ?></p>
		
			<p><?php echo str_replace(';','<br/>',$congressParty['CongressParty']['RSVP_Info']); ?></p>
		
			<p>Distribution Paid for by: <?php echo $congressParty['CongressParty']['Distribution_Paid_for_By']; ?></p>
		
		
			<?php //echo $html->link(__('View', true), array('action'=>'view', $congressParty['CongressParty']['id'])); ?>
		
            </div>
            <br/>
<?php endforeach; 
}
?>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p><a href="http://politicalpartytime.org/data/all/" target="_blank">source</a>: Political Partytime</p>

</div>
</div>
</div>
