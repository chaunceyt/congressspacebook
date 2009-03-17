<div id="content">
    <div class="post">
        <div class="entry">
<div class="lobbyistsLobbyists index">
<h2><?php __('LobbyistsLobbyists');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('firstname');?></th>
	<th><?php echo $paginator->sort('M.', 'middlename');?></th>
	<th><?php echo $paginator->sort('lastname');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lobbyistsLobbyists as $lobbyistsLobbyist):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['firstname']; ?>
		</td>
		<td>
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['middlename']; ?>
		</td>
		<td>
			<?php echo $lobbyistsLobbyist['LobbyistsLobbyist']['lastname']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $lobbyistsLobbyist['LobbyistsLobbyist']['id'])); ?>
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
		<li><?php echo $html->link(__('List Lobbyists Filings', true), array('controller'=> 'lobbyists_filings', 'action'=>'index')); ?> </li>
	</ul>
</div>
        </div>
    </div>
</div>
