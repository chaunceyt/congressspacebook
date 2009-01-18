<div id="content">
    <div class="post">
        <div class="entry"   style="padding-left:90px; padding-right:10px;">
<div class="lobbyistsFilings index">
<h2><?php __('Lobbyist @ Work their expenditures...');?></h2>
<img src="http://www.opensecrets.org/lobby/IMG_client_year_comp.php?lname=Pfizer+Inc&type=c" alt="chart" />
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% ', true)
));
?></p>
<p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</p>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php 
        if(isset($this->params['client'])) {
            $paginator->options(array('url' => '/'.urlencode($this->params['client'])));
        }
        else if(isset($this->params['pass'][0])) {
            $paginator->options(array('url' => '/'.urlencode($this->params['pass'][0])));
        }
        ?>
        <th><?php echo $paginator->sort('Registrant filing on behalf of: '. $client, 'client_name');?></th>
        <th><?php echo $paginator->sort('Expenditures','filing_amount');?></th>
</tr>

<?php
$i = 0;

foreach ($lobbyistsFilings as $lobbyistsFiling):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<a href="<?php echo Router::url('/lobbyists_filings/view/'.$lobbyistsFiling['LobbyistsFiling']['filing_id']);?>"><?php echo $lobbyistsFiling['LobbyistsFiling']['registrant_name']; ?></a>
		</td>
		<td style="text-align:right">
			$<?php echo number_format($lobbyistsFiling['LobbyistsFiling']['filing_amount']); ?> 
            <?php      //echo date("m-d-Y", strtotime($lobbyistsFiling['LobbyistsFiling']['filing_date'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</p>
        </div>
    </div>
</div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

