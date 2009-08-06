        <style type="text/css"> 
            v\:* { behavior:url(#default#VML); }
        </style>

     <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAASRRg767hPjhGnvMC6zjRwRScLFLlYFXh4OLAvbOH2OXRFFrDxRT9ItKuSOf9NAf7mEh15twZi1gzPA" type="text/javascript"></script>
    <!-- <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAASRRg767hPjhGnvMC6zjRwRQnVCDsJmVZ_VUOYRegIY0jUIcKeBQqdIes47LQbKWs3cVZYcrqj47WDA" type="text/javascript"></script>-->
<script src="http://www.govtrack.us/scripts/gmap-wms.js"></script>

    <div id="profileresults"> 
<?php
$i = 0;
foreach ($lawmakers as $lawmaker):
    $keyword = $lawmaker['lawmaker']['firstname'] . ' ' .$lawmaker['lawmaker']['lastname'];
    $congresspedia_name = ucfirst($lawmaker['lawmaker']['firstname']) . '_' .ucfirst($lawmaker['lawmaker']['lastname']);
?>
        <div class="imageblock">
        <?php //fixme need to check if the image file exist and use default image once it's done ?>
            <a href="<?php echo Router::url('/profiles/'.$lawmaker['lawmaker']['username']); ?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/100x125/'.$lawmaker['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0"/>
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0"/>

            <?php } ?>
            </a>
            <strong><a href="<?php echo Router::url('/profiles/'.$lawmaker['lawmaker']['username']); ?>"><?php echo $lawmaker['lawmaker']['lastname']; ?></a></s
trong><br/>
        </div>

<?php endforeach; ?>
    </div> <!-- end profileresults -->


<div id="googlemap" style="border:1px solid #979797; background-color:#e5e3df; width:550px; height:400px; margin:2em auto;">
  <div style="padding:1em; color:gray;">Loading...</div>
</div>

        <script type="text/javascript">
var map;

if (!GBrowserIsCompatible()) {
    //alert("This page uses Google Maps, which is unfortunately not supported by your browser.");
} else {
    var WMS_URL = 'http://www.govtrack.us/perl/wms-cd.cgi?';
    var G_MAP_LAYER_FILLED = createWMSTileLayer(WMS_URL, "cd-filled,district=<?php echo $state_dist; ?>", null, "image/gif", null, null, null, .25);
    var G_MAP_LAYER_OUTLINES = createWMSTileLayer(WMS_URL, "cd-outline,district=<?php echo $state_dist; ?>", null, "image/gif", null, null, null, .66, "Data from GovTrack.us");
    var G_MAP_OVERLAY = createWMSOverlayMapType([G_NORMAL_MAP.getTileLayers()[0], G_MAP_LAYER_FILLED, G_MAP_LAYER_OUTLINES], "Overlay");

    document.getElementById("googlemap").style.height = (screen.height - 485) + "px";
    map = new GMap2(document.getElementById("googlemap"));
    map.enableContinuousZoom()
    map.removeMapType(G_SATELLITE_MAP);
    map.addMapType(G_MAP_OVERLAY);
    map.addControl(new GLargeMapControl());
    //map.addControl(new GMapTypeControl());
    //map.addControl(new GOverviewMapControl());
    map.addControl(new GScaleControl());
    map.setMapType(G_MAP_OVERLAY);
    <?php 
        $overlay_js = file_get_contents('http://www.govtrack.us/data/us/gis/gmapdata/'. $state_dist.'-marker.js');
        //echo $overlay_js;
        if(overlay_js) {
        $_overlay = str_replace('doneLoading();','',$overlay_js);
        echo $_overlay;
        }
        else {
            echo 'alert("This page uses Google Maps, which is unfortunately not supported by your browser.");';
            //echo 'Error';
        }
    ?>
   // map.setCenter(new GLatLng(40.8317415, -73.3472865), 10);
   // createMarker(-73.3472865, 40.8317415, 'NY', '2');
   
}

function createMarker(x, y, s, d) {
    var marker = new GMarker(new GPoint(x, y));
    GEvent.addListener(marker, "click", function() {
        if (d == 0) d = "At Large";
        marker.openInfoWindowHtml("This is " + s + "'s district " + d + "!");
    });
    map.addOverlay(marker);
}

        </script>


