<div id="content">
    <div class="post">

        <div class="entry">

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["annotatedtimeline"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', '<?php echo $keyword; ?>');
        data.addColumn('string', 'title1');
        data.addColumn('string', 'text1');
        data.addRows(97);
        
                    data.setValue(0, 0, new Date(2000, 12 , 1));
                    data.setValue(0, 1, 73);
        
                    data.setValue(1, 0, new Date(2001, 1 , 1));
                    data.setValue(1, 1, 154);
        
                    data.setValue(2, 0, new Date(2001, 2 , 1));
                    data.setValue(2, 1, 67);
        
                    data.setValue(3, 0, new Date(2001, 3 , 1));
                    data.setValue(3, 1, 145);
        
                    data.setValue(4, 0, new Date(2001, 4 , 1));
                    data.setValue(4, 1, 131);
        
                    data.setValue(5, 0, new Date(2001, 5 , 1));
                    data.setValue(5, 1, 250);
        
                    data.setValue(6, 0, new Date(2001, 6 , 1));
                    data.setValue(6, 1, 383);
        
                    data.setValue(7, 0, new Date(2001, 7 , 1));
                    data.setValue(7, 1, 385);
        
                    data.setValue(8, 0, new Date(2001, 8 , 1));
                    data.setValue(8, 1, 187);
        
                    data.setValue(9, 0, new Date(2001, 9 , 1));
                    data.setValue(9, 1, 139);
        
                    data.setValue(10, 0, new Date(2001, 10 , 1));
                    data.setValue(10, 1, 372);
        
                    data.setValue(11, 0, new Date(2001, 11 , 1));
                    data.setValue(11, 1, 223);
        
                    data.setValue(12, 0, new Date(2001, 12 , 1));
                    data.setValue(12, 1, 336);
        
                    data.setValue(13, 0, new Date(2002, 1 , 1));
                    data.setValue(13, 1, 43);
        
                    data.setValue(14, 0, new Date(2002, 2 , 1));
                    data.setValue(14, 1, 245);
        
                    data.setValue(15, 0, new Date(2002, 3 , 1));
                    data.setValue(15, 1, 179);
        
                    data.setValue(16, 0, new Date(2002, 4 , 1));
                    data.setValue(16, 1, 479);
        
                    data.setValue(17, 0, new Date(2002, 5 , 1));
                    data.setValue(17, 1, 303);
        
                    data.setValue(18, 0, new Date(2002, 6 , 1));
                    data.setValue(18, 1, 188);
        
                    data.setValue(19, 0, new Date(2002, 7 , 1));
                    data.setValue(19, 1, 328);
        
                    data.setValue(20, 0, new Date(2002, 8 , 1));
                    data.setValue(20, 1, 58);
        
                    data.setValue(21, 0, new Date(2002, 9 , 1));
                    data.setValue(21, 1, 292);
        
                    data.setValue(22, 0, new Date(2002, 10 , 1));
                    data.setValue(22, 1, 163);
        
                    data.setValue(23, 0, new Date(2002, 11 , 1));
                    data.setValue(23, 1, 138);
        
                    data.setValue(24, 0, new Date(2002, 12 , 1));
                    data.setValue(24, 1, 1);
        
                    data.setValue(25, 0, new Date(2003, 1 , 1));
                    data.setValue(25, 1, 462);
        
                    data.setValue(26, 0, new Date(2003, 2 , 1));
                    data.setValue(26, 1, 237);
        
                    data.setValue(27, 0, new Date(2003, 3 , 1));
                    data.setValue(27, 1, 388);
        
                    data.setValue(28, 0, new Date(2003, 4 , 1));
                    data.setValue(28, 1, 444);
        
                    data.setValue(29, 0, new Date(2003, 5 , 1));
                    data.setValue(29, 1, 212);
        
                    data.setValue(30, 0, new Date(2003, 6 , 1));
                    data.setValue(30, 1, 200);
        
                    data.setValue(31, 0, new Date(2003, 7 , 1));
                    data.setValue(31, 1, 352);
        
                    data.setValue(32, 0, new Date(2003, 8 , 1));
                    data.setValue(32, 1, 4);
        
                    data.setValue(33, 0, new Date(2003, 9 , 1));
                    data.setValue(33, 1, 284);
        
                    data.setValue(34, 0, new Date(2003, 10 , 1));
                    data.setValue(34, 1, 329);
        
                    data.setValue(35, 0, new Date(2003, 11 , 1));
                    data.setValue(35, 1, 454);
        
                    data.setValue(36, 0, new Date(2003, 12 , 1));
                    data.setValue(36, 1, 36);
        
                    data.setValue(37, 0, new Date(2004, 1 , 1));
                    data.setValue(37, 1, 23);
        
                    data.setValue(38, 0, new Date(2004, 2 , 1));
                    data.setValue(38, 1, 201);
        
                    data.setValue(39, 0, new Date(2004, 3 , 1));
                    data.setValue(39, 1, 154);
        
                    data.setValue(40, 0, new Date(2004, 4 , 1));
                    data.setValue(40, 1, 334);
        
                    data.setValue(41, 0, new Date(2004, 5 , 1));
                    data.setValue(41, 1, 92);
        
                    data.setValue(42, 0, new Date(2004, 6 , 1));
                    data.setValue(42, 1, 319);
        
                    data.setValue(43, 0, new Date(2004, 7 , 1));
                    data.setValue(43, 1, 148);
        
                    data.setValue(44, 0, new Date(2004, 8 , 1));
                    data.setValue(44, 1, 0);
        
                    data.setValue(45, 0, new Date(2004, 9 , 1));
                    data.setValue(45, 1, 172);
        
                    data.setValue(46, 0, new Date(2004, 10 , 1));
                    data.setValue(46, 1, 226);
        
                    data.setValue(47, 0, new Date(2004, 11 , 1));
                    data.setValue(47, 1, 201);
        
                    data.setValue(48, 0, new Date(2004, 12 , 1));
                    data.setValue(48, 1, 73);
        
                    data.setValue(49, 0, new Date(2005, 1 , 1));
                    data.setValue(49, 1, 51);
        
                    data.setValue(50, 0, new Date(2005, 2 , 1));
                    data.setValue(50, 1, 125);
        
                    data.setValue(51, 0, new Date(2005, 3 , 1));
                    data.setValue(51, 1, 283);
        
                    data.setValue(52, 0, new Date(2005, 4 , 1));
                    data.setValue(52, 1, 331);
        
                    data.setValue(53, 0, new Date(2005, 5 , 1));
                    data.setValue(53, 1, 235);
        
                    data.setValue(54, 0, new Date(2005, 6 , 1));
                    data.setValue(54, 1, 509);
        
                    data.setValue(55, 0, new Date(2005, 7 , 1));
                    data.setValue(55, 1, 338);
        
                    data.setValue(56, 0, new Date(2005, 8 , 1));
                    data.setValue(56, 1, 0);
        
                    data.setValue(57, 0, new Date(2005, 9 , 1));
                    data.setValue(57, 1, 322);
        
                    data.setValue(58, 0, new Date(2005, 10 , 1));
                    data.setValue(58, 1, 192);
        
                    data.setValue(59, 0, new Date(2005, 11 , 1));
                    data.setValue(59, 1, 323);
        
                    data.setValue(60, 0, new Date(2005, 12 , 1));
                    data.setValue(60, 1, 360);
        
                    data.setValue(61, 0, new Date(2006, 1 , 1));
                    data.setValue(61, 1, 15);
        
                    data.setValue(62, 0, new Date(2006, 2 , 1));
                    data.setValue(62, 1, 60);
        
                    data.setValue(63, 0, new Date(2006, 3 , 1));
                    data.setValue(63, 1, 153);
        
                    data.setValue(64, 0, new Date(2006, 4 , 1));
                    data.setValue(64, 1, 140);
        
                    data.setValue(65, 0, new Date(2006, 5 , 1));
                    data.setValue(65, 1, 410);
        
                    data.setValue(66, 0, new Date(2006, 6 , 1));
                    data.setValue(66, 1, 142);
        
                    data.setValue(67, 0, new Date(2006, 7 , 1));
                    data.setValue(67, 1, 462);
        
                    data.setValue(68, 0, new Date(2006, 8 , 1));
                    data.setValue(68, 1, 41);
        
                    data.setValue(69, 0, new Date(2006, 9 , 1));
                    data.setValue(69, 1, 475);
        
                    data.setValue(70, 0, new Date(2006, 10 , 1));
                    data.setValue(70, 1, 0);
        
                    data.setValue(71, 0, new Date(2006, 11 , 1));
                    data.setValue(71, 1, 57);
        
                    data.setValue(72, 0, new Date(2006, 12 , 1));
                    data.setValue(72, 1, 89);
        
                    data.setValue(73, 0, new Date(2007, 1 , 1));
                    data.setValue(73, 1, 184);
        
                    data.setValue(74, 0, new Date(2007, 2 , 1));
                    data.setValue(74, 1, 75);
        
                    data.setValue(75, 0, new Date(2007, 3 , 1));
                    data.setValue(75, 1, 157);
        
                    data.setValue(76, 0, new Date(2007, 4 , 1));
                    data.setValue(76, 1, 120);
        
                    data.setValue(77, 0, new Date(2007, 5 , 1));
                    data.setValue(77, 1, 272);
        
                    data.setValue(78, 0, new Date(2007, 6 , 1));
                    data.setValue(78, 1, 367);
        
                    data.setValue(79, 0, new Date(2007, 7 , 1));
                    data.setValue(79, 1, 229);
        
                    data.setValue(80, 0, new Date(2007, 8 , 1));
                    data.setValue(80, 1, 216);
        
                    data.setValue(81, 0, new Date(2007, 9 , 1));
                    data.setValue(81, 1, 107);
        
                    data.setValue(82, 0, new Date(2007, 10 , 1));
                    data.setValue(82, 1, 382);
        
                    data.setValue(83, 0, new Date(2007, 11 , 1));
                    data.setValue(83, 1, 223);
        
                    data.setValue(84, 0, new Date(2007, 12 , 1));
                    data.setValue(84, 1, 426);
        
                    data.setValue(85, 0, new Date(2008, 1 , 1));
                    data.setValue(85, 1, 89);
        
                    data.setValue(86, 0, new Date(2008, 2 , 1));
                    data.setValue(86, 1, 44);
        
                    data.setValue(87, 0, new Date(2008, 3 , 1));
                    data.setValue(87, 1, 80);
        
                    data.setValue(88, 0, new Date(2008, 4 , 1));
                    data.setValue(88, 1, 180);
        
                    data.setValue(89, 0, new Date(2008, 5 , 1));
                    data.setValue(89, 1, 380);
        
                    data.setValue(90, 0, new Date(2008, 6 , 1));
                    data.setValue(90, 1, 384);
        
                    data.setValue(91, 0, new Date(2008, 7 , 1));
                    data.setValue(91, 1, 531);
        
                    data.setValue(92, 0, new Date(2008, 8 , 1));
                    data.setValue(92, 1, 26);
        
                    data.setValue(93, 0, new Date(2008, 9 , 1));
                    data.setValue(93, 1, 284);
        
                    data.setValue(94, 0, new Date(2008, 10 , 1));
                    data.setValue(94, 1, 61);
        
                    data.setValue(95, 0, new Date(2008, 11 , 1));
                    data.setValue(95, 1, 36);
        
                    data.setValue(96, 0, new Date(2008, 12 , 1));
                    data.setValue(96, 1, 15);
        


        var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
        chart.draw(data, {displayAnnotations: true});
      }
    </script>

        <h2>Chatter for: <?php echo $keyword; ?></h2>

<p>
<center>
                    <span><a href="<?php echo Router::url('/twitter/'. @urlencode($keyword)); ?>" title="Twitter Chatter"><img src="http://twitter.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/friendfeed/'. @urlencode($keyword)); ?>" title="Friend Feed"><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs"><img src="http://www.backtype.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter"><img src="http://www.technorati.com/favicon.ico" class="favicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/flickr/'.@urlencode($keyword)); ?>" title="Flickr Photos"><img src="http://www.flickr.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/youtube/'.@urlencode($keyword)); ?>" title="Youtube Videos"><img src="http://www.youtube.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="Latest News"><img src="http://www.google.com/favicon.ico" class="favicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/eventful/'.@urlencode($keyword)); ?>" title="EventFul"><img src="http://www.eventful.com/favicon.ico" class="favicon" width="25" /></a> </span>
</center>

</p>
<p>
    <div id="chart_div" style="width: 500px; height: 240px;"></div>
</p>   
<p>
<center>
<form method="post" action="<?php echo Router::url('/mashup/search'); ?>">
    <input type="hidden" name="_method" value="POST" />
    <input name="data[Search][query]" type="text" value="" class="query" id="Search" />
    <input type="submit" id="searchbtn" value="Graph another word" />
</form>
</center>
</p>



        </div>
    </div>
</div>
