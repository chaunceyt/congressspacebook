<div id="content">
    <div class="post">
        <div class="entry">

<div class="lawmakers index">
<h2 style="text-align:center"><?php __('Browse Congressional Member(s)');?></h2>
<p style="text-align:center">
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% lawmakers out of %count% total', true)
));
?></p>
<p>
    <center>
    <div class="paging">

    <?php
        //print_r($this->params['pass']);
        //hack to make pagination work with params
        if(isset($this->params['pass'][0])) {
            if($this->params['pass'][0] == 'state' || $this->params['pass'][0] == 'party') {
                $paginator->options(array('url' => '/'.$this->params['pass'][0].'/'.$this->params['pass'][1]));
            }
            else if($this->params['pass'][0] == 'house' || $this->params['pass'][0] == 'senate') {
                $paginator->options(array('url' => '/'.$this->params['pass'][0]));
            }
            else {
                //do nothing: consider making this a helper if you have to repeat.
            }
        }
        //if we're dealing with a searchpost
        if(isset($this->passedArgs['query'])) {
                $paginator->options(array('url' => '/query:'.urlencode($this->passedArgs['query'])));
        }
    ?>
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>

    </div> <!-- end paging -->
    </center>
    </p>

    <p></p>
    <div>
    <div id="profileresults"> 
<?php
if(isset($president)) {
    $president_keyword = $president[0]['Lawmaker']['firstname'] . ' ' .$president[0]['Lawmaker']['lastname'];
    $president_congresspedia_name = ucfirst($president[0]['Lawmaker']['firstname']) . '_' .ucfirst($president[0]['Lawmaker']['lastname']);

?>

        <div class="imageblock">
        <p><strong>President</strong></p>
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$president[0]['Lawmaker']['username']); ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$president[0]['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$president[0]['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            </a>
            <strong><a  class="url" rel="me" href="<?php echo Router::url('/profiles/'.$president[0]['Lawmaker']['username']); ?>"><?php echo $president[0]['Lawmaker']['lastname']; ?></a></strong><br/>
        </div>
<?php
}
?>

<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
    $title_str = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'] .' ['.$lawmaker['Lawmaker']['party'] .'-'.$lawmaker['Lawmaker']['district'].']';
    $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
?>
        <div class="imageblock">
        <p><strong><?php
           if(isset($president)) {
            if(is_numeric($lawmaker['Lawmaker']['district'])) {
                echo 'Representative';
            }
            else {
                echo $lawmaker['Lawmaker']['district']; 
            }
           }
        ?></strong></p>
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>" title="<?php echo $title_str; ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img class="photo fn" rel="me" src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            </a>
            <strong><a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>" title="<?php echo $title_str; ?>"><?php echo $lawmaker['Lawmaker']['lastname']; ?></a></strong><br/>
        </div>


<?php endforeach; ?>
    </div> <!-- end profileresults -->
    </div>
</div>
<br/>
<div class="clear"></div>
<p></p>
<p>
<center>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</center>
</p>
<p>Powered by:<a href="http://services.sunlightlabs.com/api/" target="_new">Sunlight Labs API</a> data feed.</p>
</div>
    </div>
</div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

