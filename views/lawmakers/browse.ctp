<div id="content">
    <div class="post">
        <div class="entry">

<div class="lawmakers index">
<h2><?php __('Congressional Mashup');?></h2>
<p>
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
$i = 0;
foreach ($lawmakers as $lawmaker):
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
    $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
?>
        <div class="imageblock">
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a href="<?php echo Router::url('/lawmakers/view/'.$lawmaker['Lawmaker']['id']); ?>"><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/></a>
            <strong><a href="<?php echo Router::url('/lawmakers/view/'.$lawmaker['Lawmaker']['id']); ?>"><?php echo $lawmaker['Lawmaker']['lastname']; ?></a></strong><br/>
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
