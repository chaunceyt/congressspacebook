<div id="content">
    <div class="post">
        
        <div class="entry" style="padding-left:90px;">

<h2><?php __('Congressional Report');?></h2>
<p>
<?php
/*
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
*/
?></p>
<?php

$i = 0;
foreach ($congressionalReports as $congressionalReport):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
<?php
/*
  $file_location = '/home/govtrack/data/us/111/cr/';
  $_xmlfile = $file_location.$congressionalReport['CongressionalReport']['filename'];
  if(($xmlfile = file_get_contents($_xmlfile)) === false) {
      //return false;

   }
   $xml = simplexml_load_string($xmlfile);
*/   
   //return $response;
       echo '<p><strong>Narrative</strong></p>';
if(sizeof($xml->narrative) > 1) {
   foreach($xml->narrative as $narrative) {
       $narrative = strip_tags(str_replace('[Page: ]','',$narrative));
       echo '<p>'.nl2br($narrative) . '</p>'."\n";
   }
}
else {
   echo  strip_tags(str_replace('[Page: ]','',$xml->narrative));
}

if(isset($xml->speaking)) {
   echo '<p><strong>Speaking:</strong> '.$lawmaker[0]['Lawmaker']['title'] . ' ' . $lawmaker[0]['Lawmaker']['firstname'] . ' ' . $lawmaker[0]['Lawmaker']['middlename'] . ' ' . $lawmaker[0]['Lawmaker']['lastname'];
   echo  ' [' .$lawmaker[0]['Lawmaker']['party'] .'-'. $lawmaker[0]['Lawmaker']['state'] . '- <a href="'.Router::url('/district/'.$lawmaker[0]['Lawmaker']['state'].'/'.$lawmaker[0]['Lawmaker']['district']).'">'. $lawmaker[0]['Lawmaker']['district']. '</a>] </p>';
   echo '<br/><a href="'.Router::url('/profiles/'.$lawmaker[0]['Lawmaker']['username']).'"><img src="http://www.govtrack.us/data/photos/'.$xml->speaking->attributes()->speaker.'-100px.jpeg" border="0" /></a><br/>'."\n";

   foreach($xml->speaking->paragraph as $speaking) {
       // print_r($speaking);
       echo '<p>'.$speaking. '</p>'."\n";
   }
}
if(isset($xml->chair)) {
echo '<p><strong>Chair</strong></p>';
   foreach($xml->chair as $chair) {
       echo $chair ."\n";
       if(isset($chair->bill)) {
           echo $chair->bill ."\n";
       }
   }
}

?>

		</td>
<?php endforeach; ?>
</table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<p><span>source: <a href="http://govtrack.us/" title="Govtrack.us" target="_new">Govtrack.us</a></span></p>
</div>
</div>
</div>
