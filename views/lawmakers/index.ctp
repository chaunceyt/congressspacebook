<div id="content">
    <div class="post">
        <div class="entry">

<div class="lawmakers index">
<h2><?php __('Congressional Mashup');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% lawmakers out of %count% total', true)
));
?></p>
<p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</p>
<p></p>
<table cellpadding="0" cellspacing="5">
<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
?>
	<tr<?php echo $class;?>>
        <td valign="top">
        <span><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></span>
        </td>
		<td>
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?>
			[<?php echo $lawmaker['Lawmaker']['party']; ?>-
			<?php echo $lawmaker['Lawmaker']['state']; ?>] <br/>
            Office: <?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>
            Phone:  <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
            Email: <?php echo $lawmaker['Lawmaker']['email']; ?><br/>
            <p>mashup: 
            <span><a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="Latest News"> news</a> </span>
            <span><a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter">blogs</a> </span>
            <span><a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs">comments</a>  </span>
            <?php if(!empty($lawmaker['Lawmaker']['lastname'])) { ?>
            <span><a href="<?php echo Router::url('/social_stream/user/'.@urlencode($keyword)); ?>" title="Comments: Blogs">comments</a>  </span>
            <?php
            $url = "http://www.govtrack.us/congress/person_api.xpd?id=".$lawmaker['Lawmaker']['govtrack_id'];
            $response = file_get_contents($url);
            ?>

            <?php } ?>
            </p>
        <br/>
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
<p></p>
<p>Powered by:<a href="http://services.sunlightlabs.com/api/" target="_new">Sunlight Labs API</a> data feed.</p>
</div>
    </div>
</div>
