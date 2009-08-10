<h2>Sponsored Bills</h2>
<p>
<div style="overflow:scroll; overflow-x:hidden;height:700px;"> 
<?php
$govtrack_results->SponsoredBills->Bill = array_reverse($govtrack_results->SponsoredBills->Bill);
foreach($govtrack_results->SponsoredBills->Bill as $bill) {
    $_url_param = $bill->attributes()->Type.$bill->attributes()->Session .'-'.$bill->attributes()->Number;

    echo '<p><strong><a class="url" rel="me" href="http://www.govtrack.us/congress/bill.xpd?bill='.$_url_param .'" target="_blank">'. $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '' .$bill->attributes()->Number .'</a> ('. $bill->Status .')</strong></p>';
    //echo '<p><strong>'. $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '' .$bill->attributes()->Number .' ('. $bill->Status .')</strong></p>';
    echo '<p>' . $bill->OfficialTitle . '</p>';
}
?>
</p>
<h2>Co-Sponsored Bills</h2>
<p>
<?php
$govtrack_results->CosponsoredBills->Bill = array_reverse($govtrack_results->CosponsoredBills->Bill);
foreach($govtrack_results->CosponsoredBills->Bill as $bill) {
    $_url_param = $bill->attributes()->Type.$bill->attributes()->Session .'-'.$bill->attributes()->Number;
    echo '<p><strong><a class="url" rel="me" href="http://www.govtrack.us/congress/bill.xpd?bill='.$_url_param .'" target="_blank">' . $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '    ' .$bill->attributes()->Number .'</a>  ('.$bill->Status.')</strong></p>';
    //echo '<p><strong>' . $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '    ' .$bill->attributes()->Number .' ('.$bill->Status.')</strong></p>';
    echo '<p>' . $bill->OfficialTitle . '</p>';
}
?>
</p>
</div>
<p><span>source: <a href="http://govtrack.us/" title="Govtrack.us" target="_new">Govtrack.us</a></span></p>

</div>
</div>
