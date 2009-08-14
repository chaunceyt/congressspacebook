<div style="padding-left:20px">
<?php
if(isset($senators)) {
$i = 0;
foreach ($senators as $lawmaker):

    //print_r($lawmaker);
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
    $title_str = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'] .' ['.$lawmaker['Lawmaker']['party'] .'-'.$lawmaker['Lawmaker']['district'].']'
;
    $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
?>
      <div class="imageblock">  
        <p><strong><?php
           //if(isset($president)) {
            if(is_numeric($lawmaker['Lawmaker']['district'])) {
                echo '<font color="green">Representative</font>';
            }
            else {
                echo $lawmaker['Lawmaker']['state'] . ' Senator - ' . $lawmaker['Lawmaker']['district'];
            }
          // }
        ?></strong></p>
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>" title="<?php echo $title_str; ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else { ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>
 
            <?php } ?>
            </a>
            <br/>
            <strong><a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>" title="<?php echo $title_str; ?>"><?php echo $lawmaker['Lawmaker']['firstname']; ?> <?php echo $lawmaker['Lawmaker']['lastname']; ?></a></strong><br/>
            <?php
            if($lawmaker['Lawmaker']['party'] == "D") {
                $party_str = 'Democrat';
            }
            else if($lawmaker['Lawmaker']['party'] = "R") {
                $party_str = 'Republican';
            }
            echo $party_str;
            /*
            if(!empty($lawmaker['Lawmaker']['webform'])) {
                echo ' - <a href="'.$lawmaker['Lawmaker']['webform'].'" title="Contact Me" target="_blank">Contact</a><br/>';
            }*/
            
           // echo '<br/>';
           // echo '<a href="'.Router::url('/profiles/'.$lawmaker['lawmaker']['username']).'">State Spending</a>';
            ?>
            </div>
            <div class="clear"></div>
            <br/>
            <br/>
        
 
 
<?php endforeach;
}
?>
<?php
      echo '<p><strong>Governor of '.$governor[0]['state_governors']['governor_state_name'].'</strong></p>';
      echo '<img src="'.$governor[0]['state_governors']['wikipedia_image'].'" alt="" /><br/>';
      echo '<a href="'.$governor[0]['state_governors']['wikipedia_url'].'" target="_blank"><small>'.$governor[0]['state_governors']['governor_name'].'</small></a><br/>';
      echo '<small>'.$governor[0]['state_governors']['governor_party'].'</small><br/>';
?>

</div>  
