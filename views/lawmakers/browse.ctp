    <div id="singleContent">
        <div id="archiveEntries">
            <div class="archivePost">
<h2 class="archiveTitles"><a href=""></a> &raquo;
<?php __('Browse Member Profiles');?></h2>
<div class="clear margintop"></div>

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
<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
    $keyword = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
    $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
?>
        <div class="imageblock">
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            </a>
            <strong><a href="<?php echo Router::url('/profiles/'.$lawmaker['Lawmaker']['username']); ?>"><?php echo $lawmaker['Lawmaker']['lastname']; ?></a></strong><br/>
        </div>

<?php endforeach; ?>
</div>
                        <div class="clear"></div>
<br/>
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
<div class="clear"></div>
                        <div class="clear"></div>
            <div class="navigation">
                <div class="previous"></div>
                <div class="next"></div>
                <div class="clear"></div>
            </div>

                    </div>

        <div id="singlePostSidebarLeft">
            
                                            
                        <div class="widget">
                <h3 class="widgetTitleSbLeft">Federal Spending</h3>
                <ul>
                Data here
                </ul>

            </div>

                                    
            <div class="widget">
                <h3 class="widgetTitleSbLeft">Industries </h3>
                <div id="tagcloud">
                tagcloud
                </div>  
            </div>
            
            <div class="widget">
                <h3 class="widgetTitleSbLeft">Sectors </h3>
                <ul>

                Data here
                </ul>
            </div>
                    </div>

        <div class="clear"></div>
    </div>
    
    
    <div id="singlePostSidebarRight">
                                    <h3 class="photoGallery">111th Congress</h3>

        <ul id="singpPhotoGalleryList">
                <?php // echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </ul>
                
        <div id="innerSidebarRight">
                    
        </div>
    </div>

