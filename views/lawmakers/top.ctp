<div id="content">
    <div class="post">
        <div class="entry" style="padding-left:90px;">

<?php
//print_r($data);
switch($type) {
    case 'novote' :
        $repstats->renderNoVote($data);
        break;
    case 'introduced' :
        $repstats->renderIntroduced($data);
        break;
    case 'enacted' :
        $repstats->renderEnacted($data);
        break;
    case 'cosponsored' :
        $repstats->renderCoSponsored($data);
        break;
    case 'verbosity' :
        echo 'Number of debates this representative has risen to say something and average number of words per debate made by the representative.';
        $repstats->renderVerbosity($data);
        break;

}
?>
<p><span>source: <a href="http://govtrack.us/" title="Govtrack.us" target="_new">Govtrack.us</a></span></p>
        </div>
    </div>
</div>
