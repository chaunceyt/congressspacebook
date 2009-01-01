<div id="content">
    <div class="post">
        <div class="entry">

<h2><?php __('Lawmakers who have Twitter accounts...');?></h2>
<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
        //$url = 'http://twitter.com/'.urlencode($lawmaker['Lawmaker']['twitter_id']);
        //$response = file_get_contents($url);
        //preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
?>

		<li><a href="<?php echo Router::url('/social_stream/user/'.urlencode($lawmaker['Lawmaker']['twitter_id']));?>"><?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?></a>
			[<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>] </li>
<?php endforeach; ?>
<p></p>
        </div>
    </div>
</div>
