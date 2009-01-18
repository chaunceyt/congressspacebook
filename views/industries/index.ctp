<div class="industries index"  style="padding-left:90px; width="100%"">
<h1><?php __('The various industries that influence Congress via lobbying and/or contributions');?></h1>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<p>
<div class="paging"  style="padding-left:90px;">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</p>
<table cellpadding="0" cellspacing="8" align="center">
<tr>
	<th><?php echo $paginator->sort('Sort By Industry Name', 'catname');?></th>
</tr>
<?php
$i = 0;
foreach ($industries as $industry):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
            <p>
            <h2><?php echo $html->link(__(str_replace('*',',',$industry['Industry']['catname']), true), array('action'=>'view', $industry['Industry']['id'])); ?></h2><br/>
			<?php echo $industry['Industry']['industry']; ?><br/><br/>
            <img src="http://www.opensecrets.org/lobby/IMG_client_year_comp.php?lname=<?php echo $industry['Industry']['catorder'];?>&type=n" alt="" /><br/>
            </p>
		</td>
		<td>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<p>
<div class="paging"  style="padding-left:90px;">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</p>
