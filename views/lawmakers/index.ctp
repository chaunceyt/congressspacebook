<div id="content">
    <div class="post">
        <div class="entry">
<div id="homepage_header">
<h3>Welcome to our Community..!</h3>
</div>
<div id="homepage_page">
<div id="homepage_left">
<h3>These lawmakers</h3>
<p><a href="<?php echo Router::url('/nearby/lawmakers'); ?>"><img src="<?php echo Router::url('/'); ?>img/noprofile.jpg" alt="default" border="0" /></p></a>

<h3>State Cloud</h3>
<div id="homepage_tagcloud">
<?php
    $max_size = 250; // max font size in %
    $min_size = 100; // min font size in %

    $max_qty = max(array_values($stateTagCloud));
    $min_qty = min(array_values($stateTagCloud));

    $spread = $max_qty - $min_qty;
    if (0 == $spread) { // we don't want to divide by zero
        $spread = 1;
    }

    $step = ($max_size - $min_size)/($spread);
    $i=0;
    foreach ($stateTagCloud as $key => $value) {
        $size = $min_size + (($value - $min_qty) * $step);
        echo '<a href="'.Router::url('/lawmakers/browse/state/'.$key).'" style="padding:2;font-size: '.$size.'%"';
        echo ' title="'.$value.' lawmakers in  '.$key.'"';
        echo '>'.$key.'</a> ';
        $i++;
    }

?>
</div>


</div>
<div id="homepage_right">
<p></p>
<h3>Let's get started...</h3>
<p><strong>We</strong> have lawmaking power. The U.S. Constitution created <strong>us</strong> and named <strong>us</strong> the legislative branch - the branch with the power to write laws.</p>
<p> No laws can govern the nation unless <strong>we</strong> enacted them and then approved by the President.</p>
<p>
<strong>We</strong> have the "Power of the Purse." The Constitution grants <strong>us</strong> the power of the purse. Under Article 1 [section 8], <strong>we</strong> are given the power to tax and impose tariffs, duties, and other measures to collect revenue for the U.S. Treasury.</p>
<p> <strong>We</strong> are also given the authority to borrow money on credit on behalf of the United States. Article 1 [section 9, clause 7] of the U.S. Constitution, states no money can be appropriated [spent] out of the U.S. Treasury <strong>unless</strong> we Act. This means that governmental agencies and departments may not spend any money for their operations and programs that <strong>we</strong> have not appropriated nor use any federal money for any purpose that <strong>we</strong> have not expressly authorized.
</p>
<h4>Browse our Profile System</h4>
<p>&nbsp;</p>
<p><h3>start with either our <a href="<?php echo Router::url('/lawmakers/browse/house'); ?>" title="House">House</a> or <a href="<?php echo Router::url('/lawmakers/browse/senate'); ?>" title="Senate">Senate</a> member profiles</h3></p>
<p></p>
<p><strong> some of our members are <a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">using twitter</a></strong></p>
<p><span style="font-size:16px;">Party</span> 
<?php
    $max_size = 250; // max font size in %
    $min_size = 100; // min font size in %

    $max_qty = max(array_values($partyTagCloud));
    $min_qty = min(array_values($partyTagCloud));

    $spread = $max_qty - $min_qty;
    if (0 == $spread) { // we don't want to divide by zero
        $spread = 1;
    }

    $step = ($max_size - $min_size)/($spread);
    $i=0;
    foreach ($partyTagCloud as $key => $value) {
        $size = $min_size + (($value - $min_qty) * $step);
        echo '<a href="'.Router::url('/lawmakers/browse/party/'.$key).'" style="font-size: '.$size.'%"';
        echo ' title="'.$value.' lawmakers in  '.$key.'"';
        echo '>'.$key.'</a> ';
        $i++;
    }

?>
</p>

<p>
<?php
//$letters = range('a','z');
//foreach($letters as $letter) {
//    echo '<span style="padding:1px;font-size:16px;"><a href="'.Router::url('/lawmakers/browse/letter/'.strtoupper($letter)).'" title="'.strtoupper($letter).'"><strong>'.strtoupper($letter).'</a></strong></span>';
//}
?>
</p>
<p><strong> members also <a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">using twitter</a></strong></p>

<h3>.. or just <a href="<?php echo Router::url('/lawmakers/browse/'); ?>" title="Browse">Browse</a> to see who we are.</h3>



</div><!-- end of homepage_right -->
</div>
</p>
<p></p>
</div>
    </div>
</div>
