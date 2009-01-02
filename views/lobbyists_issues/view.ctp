<div class="lobbyistsIssues view">
<h2><?php  __('LobbyistsIssue');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specific Issue'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['specific_issue']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lobbyists Filing'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($lobbyistsIssue['LobbyistsFiling']['filing_id'], array('controller'=> 'lobbyists_filings', 'action'=>'view', $lobbyistsIssue['LobbyistsFiling']['filing_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit LobbyistsIssue', true), array('action'=>'edit', $lobbyistsIssue['LobbyistsIssue']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete LobbyistsIssue', true), array('action'=>'delete', $lobbyistsIssue['LobbyistsIssue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lobbyistsIssue['LobbyistsIssue']['id'])); ?> </li>
		<li><?php echo $html->link(__('List LobbyistsIssues', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New LobbyistsIssue', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lobbyists Filing', true), array('controller'=> 'lobbyists_filings', 'action'=>'add')); ?> </li>
	</ul>
</div>
