<div id="content">
    <div class="post">
        <div class="entry">
<div class="lobbyistsLobbyists view">
		<p><?php echo $html->link(__('Browse other Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </p>
<h2><?php  __('Lobbyist');?></h2>
		<?php __('Firstname'); ?>:
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['firstname']; ?>
			<br/>
		
		<?php __('Middlename'); ?>:
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['middlename']; ?>
			<br/>
		
		<?php __('Lastname'); ?>:
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['lastname']; ?>
			<br/>
		<?php __('Official Position'); ?>:
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['official_position']; ?>
			<br/>
		
		<?php __('Filing'); ?>:
			<?php echo $html->link($lobbyistsLobbyist['LobbyistsFiling']['filing_id'], array('controller'=> 'lobbyists_filings', 'action'=>'view', $lobbyistsLobbyist['LobbyistsFiling']['filing_id'])); ?>
			<br/>
		
</div>
        </div>
    </div>
</div>
