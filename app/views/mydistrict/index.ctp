<?php
//print_r($lawmakers);
?>
<div id="content">
    <div class="post">
                <div class="entry" style="padding-left:90px;">
                <h2>For Transparency to work. <br/> <small>get to know your Senators and Representative.</small></h2>

<span style="margin:0 auto"><?php echo $this->element('mydistrict_search'); ?></span>
    <p></p>
    <div>
    <?php if(isset($myZipcode,$myDistrict)) { ?>
    <h2>The zipcode <?php echo $myZipcode; ?> is located in <br/> <?php echo str_replace('-',' Congressional District # ', $myDistrict); ?></h2>
    <?php } ?>
    <div id="profileresults"> 
<?php
if(isset($president)) {
    $president_keyword = $president[0]['Lawmaker']['firstname'] . ' ' .$president[0]['Lawmaker']['lastname'];
    $president_congresspedia_name = ucfirst($president[0]['Lawmaker']['firstname']) . '_' .ucfirst($president[0]['Lawmaker']['lastname']);
?>

        <div class="imageblock">
        <p><strong>US President</strong></p>
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$president[0]['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$president[0]['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"
/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            <strong><?php echo $president[0]['Lawmaker']['firstname']; ?> <?php echo $president[0]['Lawmaker']['lastname']; ?></strong><br/>
            <?php 
            if($president[0]['Lawmaker']['party'] == "D") {
                $party_str = 'Democrat';
            }
            else if($president[0]['Lawmaker']['party'] = "R") {
                $party_str = 'Republican';
            }
            echo $party_str; 
            ?>
        </div>
<?php
}
?>
<?php
if(isset($lawmakers)) { 
$i = 0;
foreach ($lawmakers as $lawmaker):
    $keyword = $lawmaker['lawmaker']['firstname'] . ' ' .$lawmaker['lawmaker']['lastname'];
    $title_str = $lawmaker['lawmaker']['firstname'] . ' ' .$lawmaker['lawmaker']['lastname'] .' ['.$lawmaker['lawmaker']['party'] .'-'.$lawmaker['lawmaker']['district'].']'
;
    $congresspedia_name = ucfirst($lawmaker['lawmaker']['firstname']) . '_' .ucfirst($lawmaker['lawmaker']['lastname']);
?>
        <div class="imageblock" style="width:138px">
        <p><strong><?php
           if(isset($president)) {
            if(is_numeric($lawmaker['lawmaker']['district'])) {
                echo '<font color="green">US Representative</font>';
            }
            else {
                echo 'US Senator - ' . $lawmaker['lawmaker']['district']; 
            }
           }
        ?></strong></p>
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['lawmaker']['username']); ?>" title="<?php echo $title_str; ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            </a>
            <br/>
            <strong><a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['lawmaker']['username']); ?>" title="<?php echo $title_str; ?>"><?php echo $lawmaker['lawmaker']['firstname']; ?> <?php echo $lawmaker['lawmaker']['lastname']; ?></a></strong><br/>
            <?php 
            if($lawmaker['lawmaker']['party'] == "D") {
                $party_str = 'Democrat';
            }
            else if($lawmaker['lawmaker']['party'] = "R") {
                $party_str = 'Republican';
            }
            echo $party_str;
            if(!empty($lawmaker['lawmaker']['webform'])) {
                echo ' - <a href="'.$lawmaker['lawmaker']['webform'].'" title="Contact Me" target="_blank">Contact</a><br/>';
            }
            
           // echo '<br/>';
           // echo '<a href="'.Router::url('/profiles/'.$lawmaker['lawmaker']['username']).'">State Spending</a>';
            ?>
            <div class="clear"></div>
            <br/>
            <br/>
        </div>


<?php endforeach; 
}
?>
    </div> <!-- end profileresults -->
    </div>
    <div class="clear"></div>
<br/>
<br/>
<br/>
</div>
</div>
</div>
</div>
