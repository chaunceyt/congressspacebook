<div id="page">
        <div id="content">
                <div class="post">
                        <div class="entry">
<p><center><?echo $EventsPagination; ?></center></p>
<?php
$ii=1;
for($i=0; $i < sizeof($eventResults); $i++) {
    echo '<h2>'. $ii . ') '.$eventResults[$i]->title.'</h2>';
    echo '<table border="0" cellspacing="2" cellpadding="2">';
    echo '<tr><td>&nbsp;</td><td>Location</td><td>Time</td></tr>';
    echo '<tr><td valign="top">';
    echo '<img src="'.$eventResults[$i]->image->medium->url.'" /><br clear="all"/>';
    echo '</td><td valign="top">';
    echo $eventResults[$i]->venue_name ."<br/> ";
    echo $eventResults[$i]->city_name ." ";
    echo $eventResults[$i]->region_name .", ";
    echo $eventResults[$i]->postal_code ."<br/>";
    //echo $eventResults[$i]->region_abbr ."<br/>";
    echo $eventResults[$i]->country_abbr ."<br/>";
    echo 'Location: ' .$eventResults[$i]->latitude ." / ";
    echo $eventResults[$i]->longitude ."<br/>";
    if(!empty($eventResults[$i]->longitude) && !empty($eventResults[$i]->latitude)) {
/*
echo '
<span
   id="viewiframe'.$i.'"
   onclick="DoViewIFRAME(\'viewiframe'.$i.'\',\'hideiframe'.$i.'\',\'aniframeupstart'.$i.'\');"
   style="line-height: 16px;
      font-size: 14px;
      font-weight: bold;
      font-family: sans-serif;
      color: brown;
      background-color: gold;">
<nobr>[View MAP]</nobr>
</span>
<span
   id="hideiframe'.$i.'"
   onclick="DoHideIFRAME(\'hideiframe'.$i.'\',\'aniframeupstart'.$i.'\',\'viewiframe'.$i.'\');"
   style="display: none;
      line-height: 16px;
      font-size: 14px;
      font-weight: bold;
      font-family: sans-serif;
      background-color: brown;
      color: gold;">
<nobr>[Hide MAP]</nobr>
</span>
';
echo '
<div
   id="aniframeupstart'.$i.'"
   align="center"
   style="display: none;">
   map
<iframe
   src="http://www.mashupkeyword.com/map/index.php?lat='.$eventResults[$i]->latitude.'&lng='.$eventResults[$i]->longitude.'"
   margin="10"
   border="1"
   scrollbars="auto"
   width="450"
   height="300">
</iframe>
</div>
';
*/
    } // end if lat/lng

    echo '</td><td valign="top">';
    echo 'Start Time: ' . date('M d, Y', strtotime($eventResults[$i]->start_time)) ."<br/>";
    echo '</td></tr>';
    echo '<tr><td colspan="3">';
    echo nl2br($eventResults[$i]->description) ."<br/>";
    echo '</td></tr>';
    echo '</table>';
    echo '<br clear="all"/>';
    $ii++;
}
?>
<p><center><?echo $EventsPagination; ?></center></p>
             <a href="http://eventful.com" title="Find Local Events, Concerts, Tickets and Music at Eventful"><img src="http://api.eventful.com/i
mages/powered/icn_pb_vrt_md.gif" border="0" /></a>
                        </div>
                </div>

        </div>
        <!-- end #content -->

