<div id="content">
    <div class="post">

        <div class="entry">

<div class="accounts index">
<h2><?php __('People with the Most Twitter Friends...');?></h2>
<p>
<?php echo $html->link(__('Add your Twitter account ...', true), '/people_who_have_the_most_twitter_friends/add'); ?>
<?php
/*
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
*/
?></p>
<table cellpadding="0" cellspacing="5">
<?php
$i = 0;
foreach ($accounts as $account):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr>
		<td>
			<img src="http://twitter.com/favicon.ico" class="favicon" width="16" /> <a href="<?php echo Router::url('/social_stream/user/'.$account['Twitterfriend']['username']); ?>"> <?php echo $account['Twitterfriend']['username']; ?></a>
		</td>
		<td>
			<?php echo $account['Twitterfriend']['twitter_friends']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<!--<div class="paging">
	<?php //echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php //echo $paginator->numbers();?>
	<?php //echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>-->
        </div>
    </div>
</div>
