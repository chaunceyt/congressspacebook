<h2>Co-Sponsored Bills</h2>
<p>
<?php
foreach($govtrack_results->CosponsoredBills->Bill as $bill) {
    echo '<p><strong>' . $bill->attributes()->Session . ' ' . $bill->attributes()->Type . '
    ' .$bill->attributes()->Number .' ('.$bill->Status.')</strong></p>';
    echo '<p>' . $bill->OfficialTitle . '</p>';
}
?>
</div>
</div>

