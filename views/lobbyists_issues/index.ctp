<div class="lobbyistsIssues index">
<h2><?php __('LobbyistsIssues');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('specific_issue');?></th>
	<th><?php echo $paginator->sort('filing_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lobbyistsIssues as $lobbyistsIssue):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['id']; ?>
		</td>
		<td>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['code']; ?>
		</td>
		<td>
			<?php echo $lobbyistsIssue['LobbyistsIssue']['specific_issue']; ?>
		</td>
		<td>
			<?php echo $html->link($lobbyistsIssue['LobbyistsFiling']['filing_id'], array('controller'=> 'lobbyists_filings', 'action'=>'view', $lobbyistsIssue['LobbyistsFiling']['filing_id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $lobbyistsIssue['LobbyistsIssue']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $lobbyistsIssue['LobbyistsIssue']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $lobbyistsIssue['LobbyistsIssue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lobbyistsIssue['LobbyistsIssue']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New LobbyistsIssue', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lobbyists Filing', true), array('controller'=> 'lobbyists_filings', 'action'=>'add')); ?> </li>
	</ul>
</div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

