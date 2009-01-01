<div id="content">
    <div class="post">
        <div class="entry">

<h2><?php __('Lawmakers who have Twitter accounts...');?></h2>
<table cellpadding="0" cellspacing="5">
<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
        //$url = 'http://twitter.com/'.urlencode($lawmaker['Lawmaker']['twitter_id']);
        //$response = file_get_contents($url);
        //preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
?>
    <tr<?php echo $class;?>>
        <td valign="top">
        <span><img src="<?php echo Router::url('/img/lawmakers/40x50/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></span>
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
            <span><a href="<?php echo Router::url('/social_stream/user/'.@urlencode($keyword)); ?>" title="Twitter Stream">twitter_stream</a>  </span>
            <?php } ?>
            </p>
        <br/>
        </td>
    </tr>

<?php endforeach; ?>
</table>
<p></p>
<p>Powered by:<a href="http://services.sunlightlabs.com/api/" target="_new">Sunlight Labs API</a> data feed.</p>
        </div>
    </div>
</div>
<p></p>
