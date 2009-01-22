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

