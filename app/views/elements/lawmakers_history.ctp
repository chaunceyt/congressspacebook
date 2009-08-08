<h3>** has this Member attended a (fundraising) <a href="/<?php Router::url('/'); ?>congress_parties/<?php echo $lawmaker['Lawmaker']['username']; ?>">Event/Party</a> as a Beneficiary</h3><br/> 
<p>Member's State  <a href="/<?php Router::url('/'); ?>profiles/<?php echo $lawmaker['Lawmaker']['username']; ?>/fedspending">Spending</a></p> 

<?php
if(!empty($lawmaker['Lawmaker']['twitter_id'])) { 
    if($lawmaker['Lawmaker']['gender'] == 'F') {
        $gender_str = ' her';
    }
    else {
        $gender_str = ' him';
    }
    //major hack to get tinyurl first. I know I should never use @
    $url = 'http://www.congressspacebook.com/profiles/'.$lawmaker['Lawmaker']['username'];
    $shortUrl = @file_get_contents("http://tinyurl.com/api-create.php?url=" . $url);

    $getFollowers_resp = @file_get_contents('http://twittercounter.com/api/?username='.$lawmaker['Lawmaker']['twitter_id'].'&output=xml');
    $followersResult = simplexml_load_string($getFollowers_resp);
    $totalFollowers = number_format($followersResult->followers_current);
    ?>
<p>This member has <?php echo $totalFollowers; ?> followers on Twitter, tweet <a href="http://twitter.com/home?status=@<?php echo $lawmaker['Lawmaker']['twitter_id']; ?>%20Just%20reviewed%20your%20profile%20on%20CongressSpacebook:%20<?php echo $shortUrl; ?>" target="_blank">@<?php echo $lawmaker['Lawmaker']['twitter_id']; ?></a> letting <?php echo $gender_str; ?> know about this page or view <span> <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
</p>
<?php }  ?>
<?php
foreach($govtrack_results->CongressionalTerms->Term as $term) {
    echo  $term->Title . ' of ' . $term->State . ' ' . $term->District . '  (' . $term->Start . '-' . $term->End .")<br/>";
}
?>
</p>
<p>
<h2>Subcommittes</h2>

<?php
foreach($govtrack_results->CommitteeMembership->Committee as $committee) {
    echo '<p>'  . $committee->attributes()->Role.' '.$committee->attributes()->name.''."</p>";
    foreach($committee->Subcommittee as $subcommittee) {
        echo $subcommittee->attributes()->name . ' ('. $subcommittee->attributes()->id.')'."<br/>";
    }
}
?>
</p>
<p>
<h2>Terms</h2>
<?php
foreach($govtrack_results->CongressionalTerms->Term as $term) {
    echo '<p>'  . $term->Title.' '.$term->Start.'-'. $term->End. ' ('.$term->State.')'."</p>";
}
?>
</p>
<span>source: <a href="http://govtrack.us/" title="Govtrack.us" target="_new">Govtrack.us</a></span>
</div>
</div>

