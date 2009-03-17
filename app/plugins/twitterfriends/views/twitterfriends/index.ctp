<div id="content">
    <div class="post">

        <div class="entry">

<div class="accounts index">
<h2><?php __('People with the Most Twitter Connections...');?></h2>
<p>People with the most twitter friends/connections (referenced or referenced by) are entered when one clicks on a "social stream" browsing Twitter Posts as a result of a Mashup. 
Or you can click <?php echo $html->link(__('Add your Twitter account ...', true), '/people_who_have_the_most_twitter_friends/add'); ?> we use Google Social Graph to determine the connections/friends totals.
</p>
<p>&nbsp;</p>
<div align="center">
<?php

echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% twitter accounts  out of %count% , starting on record %start%, ending on %end%', true)
));

?>
</div>
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
			<!--<img src="http://twitter.com/favicon.ico" class="favicon" width="16" /> -->
			<h2> <?php echo $account['Twitterfriend']['twitter_friends']; ?>
            <a href="<?php echo Router::url('/social_stream/user/'.$account['Twitterfriend']['username']); ?>"> <?php echo $account['Twitterfriend']['username']; ?></a></h2>
		</td>
		<td>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div align="center">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
| 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>    
        </div>
    </div>
</div>
