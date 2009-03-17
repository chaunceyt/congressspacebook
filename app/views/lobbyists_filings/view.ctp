
<div id="content">
    <div class="post">

        <div class="entry">
		<p><?php echo $html->link(__('Browse other Filings', true), array('action'=>'index')); ?> </p>

<div class="lobbyistsFilings view">
<h2>
<?php  __('Filling ID: '.$lobbyistsFiling['LobbyistsFiling']['filing_id']);?><br/>
<a href="http://soprweb.senate.gov/index.cfm?event=printFiling&filingId=<?php echo trim($lobbyistsFiling['LobbyistsFiling']['filing_id']); ?>">view pdf</a>
</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

        <strong><?php __('Period of the filing'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['filing_period']; ?><br/>
		
        <strong><?php __('Filing Date sent to Senate'); ?></strong>:
			<?php echo date("F j, Y", strtotime($lobbyistsFiling['LobbyistsFiling']['filing_date'])); ?><br/>

        <strong><?php __('Filing Amount'); ?></strong>:
			<?php echo number_format($lobbyistsFiling['LobbyistsFiling']['filing_amount']); ?> (total amount of expenditures on filing)<br/>
		
		<strong><?php __('Filing Year'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['filing_year']; ?><br/>
		
		<strong><?php __('Filing Type'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['filing_type']; ?><br/>
			
		<strong><?php __('Client Senate Id - assigned to client'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_senate_id']; ?><br/>
			
		<strong><?php __('Client Name - lobbying is done on behalf of'); ?></strong>:<br/>
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_name']; ?><br/>
			
		<strong><?php __('Client Country'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_country']; ?><br/>
			
		<strong><?php __('Client State'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_state']; ?><br/>
			
		<strong><?php __('Client Ppb Country'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_ppb_country']; ?><br/>
			
		<strong><?php __('Client Ppb State'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_ppb_state']; ?><br/>
			
		<strong><?php __('Client Description'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_description']; ?><br/>
			
		<strong><?php __('Client Contact Firstname'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_contact_firstname']; ?><br/>
			
		
		<strong><?php __('Client Contact Middlename'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_contact_middlename']; ?><br/>
			
		<strong><?php __('Client Contact Lastname'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_contact_lastname']; ?><br/>
		
		<strong><?php __('Client Contact Suffix'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_contact_suffix']; ?><br/>
		
		<strong><?php __('Client Raw Contact Name'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['client_raw_contact_name']; ?><br/>
		
		<strong><?php __('Registrant Senate Id'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_senate_id']; ?><br/>
			
		<strong><?php __('Registrant Name'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_name']; ?><br/>
			
		<strong><?php __('Registrant Description'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_description']; ?><br/>
			
		<strong><?php __('Registrant Address'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_address']; ?><br/>
		
		<strong><?php __('Registrant is located'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_country']; ?><br/>
			
		<strong><?php __('Registrant\'s primary place of business'); ?></strong>:
			<?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_ppb_country']; ?><br/>
			
		
	</dl>
</div>
        </div>
    </div>
</div>   
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

