<div id="content">
    <div class="post">
        <div class="entry">
<div id="homepage_page">
<div id="homepage_left">
<p style="font-size:12px;">member of the month</p>
<p><img src="<?php echo Router::url('/'); ?>img/noprofile.jpg" alt="default" border="0" /></p>

<p style="font-size:12px;">random Dem</p>
<p>
<div>
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" /><br/>
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
</div>
</p>
<p>&nbsp;</p>
<p style="font-size:12px;">random Repub</p>
<p>
<div>
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" /><br/>
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
<img src="<?php echo Router::url('/'); ?>img/no_profile_small.jpg" alt="default" border="0" />
</div>
</p>

</div>
<div id="homepage_right">
<p><strong>CongressSpaceBook members also <a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">using twitter</a></strong></p>
<p>
<form method="post" action="<?php echo Router::url('/lawmakers/search'); ?>">
    <input type="hidden" name="_method" value="POST" />
    <input name="data[Search][query]" type="text" value="" class="query" id="Search" />
    <input type="submit" id="searchbtn" value="Search Profiles" />
</form> 
</p>
<p>&nbsp;</p>
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
</p>

<p>
<?php
//$letters = range('a','z');
//foreach($letters as $letter) {
//    echo '<span style="padding:1px;font-size:16px;"><a href="'.Router::url('/lawmakers/browse/letter/'.strtoupper($letter)).'" title="'.strtoupper($letter).'"><strong>'.strtoupper($letter).'</a></strong></span>';
//}
?>
</p>
<p><h3>.. or start with either <a href="<?php echo Router::url('/lawmakers/browse/house'); ?>" title="House">House</a> or <a href="<?php echo Router::url('/lawmakers/browse/senate'); ?>" title="Senate">Senate</a> member profiles</h3></p>

<h3>.. or just <a href="<?php echo Router::url('/lawmakers/browse/'); ?>" title="Browse">Browse</a> to see who they are.</h3>

<h3><a href="<?php echo Router::url('/nearby/lawmakers'); ?>">In your state</a></h3>


</div><!-- end of homepage_right -->
</div>
</p>
<p></p>
</div>
    </div>
</div>
