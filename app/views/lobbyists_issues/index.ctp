<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">


<h2><?php __('LobbyistsIssues');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('filing_id');?></th>
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
			<?php echo $lobbyistsIssue['LobbyistsIssue']['code']; ?>
		</td>
		<td>
			<?php echo $html->link($lobbyistsIssue['LobbyistsFiling']['filing_id'], array('controller'=> 'lobbyists_filings', 'action'=>'view', $lobbyistsIssue['LobbyistsFiling']['filing_id'])); ?>
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
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
</div>
</div>
</div>
