<h3>** has this Member attended a (fundraising) <a href="/<?php Router::url('/'); ?>congress_parties/<?php echo $lawmaker['Lawmaker']['username']; ?>">Event/Party</a> as a Beneficiary</h3><br/> 

<?php
if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
<p><a href="http://twitter.com/home?source=congressSB&status=@<?php echo $lawmaker['Lawmaker']['twitter_id']; ?>%20Just%20reviewed%20your%20profile%20on%20CongressSpacebook:%20http://www.congressspacebook.com/profiles/<?php echo $lawmaker['Lawmaker']['username']; ?>" target="_blank">Tweet @<?php echo $lawmaker['Lawmaker']['twitter_id']; ?></a> letting him know about this page..</p>
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

