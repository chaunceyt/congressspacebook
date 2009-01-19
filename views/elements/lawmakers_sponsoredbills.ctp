<h2>Sponsored Bills</h2>
<p>
<?php
foreach($govtrack_results->SponsoredBills->Bill as $bill) {
    $_url_param = $bill->attributes()->Session .'-'.$bill->attributes()->Type.'-'.$bill->attributes()->Number;

    echo '<p><strong><a href="'.Router::url('/').'/profiles/'.$username.'/bill/'.$_url_param .'">'. $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '' .$bill->attributes()->Number .'</a> ('. $bill->Status .')</strong></p>';
    echo '<p>' . $bill->OfficialTitle . '</p>';
}
?>
</p>
<h2>Co-Sponsored Bills</h2>
<p>
<?php
foreach($govtrack_results->CosponsoredBills->Bill as $bill) {
    echo '<p><strong>' . $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '    ' .$bill->attributes()->Number .' ('.$bill->Status.')</strong></p>';
    echo '<p>' . $bill->OfficialTitle . '</p>';
}
?>
</p>

</div>
</div>
