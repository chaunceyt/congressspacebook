<?php echo $this->element('foaf', array('lawmaker' => $lawmaker)); ?>
<script type="text/javascript">
            $(function() {
                $("#rotate > ul").tabs();
            });
</script>

<?php 
if(strlen($lawmaker['Lawmaker']['district']) == 1) {
    $_district = '0'.$lawmaker['Lawmaker']['district'];
}
else {
    $_district = $lawmaker['Lawmaker']['district'];
}
$widgetID = $lawmaker['Lawmaker']['state'].$_district;
$_year_ = date("Y")-1;
?>

    <!--<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAASRRg767hPjhGnvMC6zjRwRSw4_dCU545QaPZjzXUEikk77PCGhRY6K5QLtCcNsRoLC86QN_6vp7DDA"
          type="text/javascript"></script>-->
<div id="content">
    <div class="post">
        <div class="entry">
<div id="profile_page">

<div id="profile_left">
    <p>        <?php echo $lawmaker['Lawmaker']['title']; ?> 
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?><br/>
			<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>
    </p>        
    <p class="profile_thumb_img">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
    <img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" />
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" />

            <?php } ?>
    
    <br/>
            </p>
         <p><strong>Information</strong></p>   
            <?php
            if(isset($candSummary)) {
                    echo 'First Elected: '. $candSummary->summary->attributes()->first_elected . '<br/>';
            }
            ?>
           Office :<br/><?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>

            <?php
                $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
                $this_person = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];

                $openSecretWidgitData = $lawmaker['Lawmaker']['state'].$_district;
            ?>
            <br/>

        </p>
			Phone:<br/> <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
			Fax:<br/> <?php echo $lawmaker['Lawmaker']['fax']; ?><br/>
			Website: <br/>
            <?php 
            if(!empty($lawmaker['Lawmaker']['website'])) {
                echo '<a href="'.$lawmaker['Lawmaker']['website'].'" target="_new">'.$lawmaker['Lawmaker']['website'].'</a>'; 
            }
            else {
                echo 'not found';
            }
            ?><br/>
            <p>
            <?php
           
            ?>
            </p>

<p>
<p style="font-size:13px"><strong>Top Friends</strong></p>
<?php
$i=0;
foreach ($profile_top_friends as $current) {
    $fullname = $current['lawmaker']['firstname'].' '.$current['lawmaker']['lastname'];

?>
        <span><a class="url" rel="me co-resident colleague" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
                <img src="<?php echo Router::url('/img/lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0" />
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" width="40" height="50"/>

            <?php } ?>

        </a></span>

<?php
    }
?>
</p>
<p>
<p style="font-size:13px"><strong>Friends</strong></p>
<?php
$i=0;
foreach ($profile_friends as $current) {
    $fullname = $current['lawmaker']['firstname'].' '.$current['lawmaker']['lastname'];

?>
        <span><a class="url" rel="me colleague" href="<?php echo Router::url('/profiles/'.$current['lawmaker']['username']); ?>" title="<?php echo $fullname;?>">
            <?php
                    $path_to_image = APP .'webroot' . DS .'img' . DS . 'lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg';
                    if(file_exists($path_to_image)) {
            ?>
        <img src="<?php echo Router::url('/img/lawmakers/40x50/'.$current['lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" border="0" />
            <?php } else {  ?>
                <img src="<?php echo Router::url('/img/no_profile_img.jpg'); ?>" alt="" border="0" width="40" height="50"/>

            <?php } ?>


<?php
    }
?>
</p>


        <p></p>
       <h3> the public is saying...</h3>
               <ul>
                    <li><img src="http://twitter.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/twitter/'. @urlencode($this_person)); ?>" title="Twitter Chatter">Twitter Post</a>  </li>
                    <li><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/friendfeed/'. @urlencode($this_person)); ?>" title="Friend Feed">FriendFeed Chatter</a>  </li>
                    <li><img src="http://backtype.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/comments/'.@urlencode($this_person)); ?>" title="Comments: Blogs">User Comments</a>  </li>
                    <li><img src="http://www.technorati.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/technorati/'.@urlencode($this_person)); ?>" title="Blog Chatter">Blogs Chatter</a> </li>
                    <li><img src="http://www.google.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/news/'. @urlencode($this_person)); ?>" title="News">Google News</a> </li>
                    <!--<li> Audioscrobbler </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/similar/'.@urlencode($this_person)); ?>" title="Similar Artist">Similar Artist</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/albums/'.@urlencode($this_person)); ?>" title="Albums">Albums</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/tracks/'.@urlencode($this_person)); ?>" title="Top Tracks">Top Tracks</a> </li>-->
                    <!--<li><a href="./lyricwiki/<?php echo @urlencode($this_person); ?>" title="Lyrics">Lyrics</a> </li>-->
                </ul>
        
</div>
<div id="profile_right">
   <div id="rotate">
            <ul>
                <li><a href="#fragment-0"><span>Fundraising</span></a></li>
                <li><a href="#fragment-1"><span>Contributors</span></a></li>
                <li><a href="#fragment-2"><span>Industries</span></a></li>
                <li><a href="#fragment-3"><span>Sectors</span></a></li>
                <br/>
                <li><span style="text-aligh:left;"><a href="#fragment-4"><span>Members State's FedSpending</span></a></span></li>
            </ul>    
<div id="fragment-0">
<h2><p style="text-align:center">Members Fundraising</p></h2>

<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/scoff_img.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" alt="" border="0" /></a> </p>

<p style="text-align:center">
<img src="http://chart.apis.google.com/chart?
chs=300x100
&amp;chd=t:<?php echo trim($candSummary->summary->attributes()->total);?>,<?php echo trim($candSummary->summary->attributes()->spent);?>,<?php echo trim($candSummary->summary->attributes()->cash_on_hand);?>,<?php echo trim($candSummary->summary->attributes()->debt);?>
&amp;cht=p3
&amp;chl=Raised|Spent|Cash|Debt"
alt="Member Fundraising" /><br/>
</p>
<p style="text-aligh:center">Last updated: <?php echo $candSummary->summary->attributes()->last_updated; ?></p>
<p>
Raised: $<?php echo number_format($candSummary->summary->attributes()->total);?><br/>
Spent: $<?php echo number_format($candSummary->summary->attributes()->spent);?><br/>
Cash Available: $<?php echo number_format($candSummary->summary->attributes()->cash_on_hand);?><br/>
Debt: $<?php echo number_format($candSummary->summary->attributes()->debt);?><br/>
</p>
<h2><p style="text-align:center">avg. to other House members</p></h2>
<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/totVSavg.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>&chamber=H" alt="" border="0" /></a> </p>
<h2><p style="text-align:center">avg. to other Senate members</p></h2>
<p style="text-align:center"><a href="http://www.opensecrets.org/politicians/summary.php?cycle=<?php echo $_year_; ?>&cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" title="OpenSecrets" target="_new"><img src="http://www.opensecrets.org/politicians/totVSavg.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>&chamber=S" alt="" border="0" /></a> </p>

            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span> twitter social_stream <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php } ?><br/>
       <?php if(!isset($candContrib, $candIndustry, $candSector)) { ?>
       <a><h4>Info</h4></a>
            <div>
            <p style="padding-top:10px;">
            <strong>Bio Information</strong>: <a href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            <strong>Campaign Finance/Money</strong> : <a href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>" target="_new">summary</a><br/>
            <strong>Congresspedia URL</strong>: <a href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new">about</a><br/>
            <strong>FEC Candidate Summary</strong> : <a href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
               <strong> On the issues</strong>: <a href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                <strong>On the issues</strong>: <a href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?><br/>
            <strong>Voting</strong>: <a href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            </p>
            </div>
       <?php } ?>     
</div>

        <?php if(isset($candContrib)) { ?>
        <div id="fragment-1">
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Contributors</h2></a>
            <table width="80%">
            <?php
              for($i=0; $i < sizeof($candContrib->contributors->contributor); $i++) {     
                  echo '<tr>';
                  echo  '<td>'.$candContrib->contributors->contributor[$i]->attributes()->org_name . '</td>   <td style="text-align:right"> $' . number_format($candContrib->contributors->contributor[$i]->attributes()->total) .'</td>';
                  echo '</tr>';
               }
            ?>
            </table>
         </div>
    
        <?php } ?> 

        <?php if(isset($candIndustry)) { ?>
        <div id="fragment-2">
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Industries</h2></a>
            
            <div>
            <table width="80%">
            <?php
              for($i=0; $i < sizeof($candIndustry->industries->industry); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candIndustry->industries->industry[$i]->attributes()->industry_name . '</td>';
                  echo '<td  style="text-align:right"> $'.number_format($candIndustry->industries->industry[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
            </div>
        </div>
        <?php } ?>

        <?php if(isset($candSector)) { ?>
        <div id="fragment-3">
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Sectors</h2></a>
            <div>
            
            <table width="80%">
            <?php
              for($i=0; $i < sizeof($candSector->sectors->sector); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candSector->sectors->sector[$i]->attributes()->sector_name . '</td>';
                  echo '<td  style="text-align:right;"> $'.number_format($candSector->sectors->sector[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
            </div>
        </div>            
        <?php } ?>     
        <div id="fragment-4">
<?php

        echo '<p>';
        echo '<strong>Federal Spending ' . $fedSpending->data->record->attributes()->description .': </strong><br/><br/>';
        echo 'Total Obligated Amount: $' . number_format($fedSpending->data->record->totals->total_ObligatedAmount, 2) . "<br/>";
        echo 'Rank Among states: ' . $fedSpending->data->record->totals->rank_among_states . "<br/>";
        echo 'Number of Contractors: ' . number_format($fedSpending->data->record->totals->number_of_contractors) . "<br/>";
        echo 'Number of Transactions: ' . number_format($fedSpending->data->record->totals->number_of_transactions) . "<br/>";
        echo '</p>';

        echo '<p>';
        echo '<strong>'.$fedSpending->data->record->top_known_congressional_districts->attributes()->description ."</strong><br/><br/>";
        foreach($fedSpending->data->record->top_known_congressional_districts->congressional_district as $_district) {
            echo $_district ."<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top products or services sold</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_products_or_services_sold->product_or_service_category as $_prodsrv) {
            echo  $_prodsrv . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top contracting agencies</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_contracting_agencies->agency as $_agency) {
            echo  $_agency . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top contractor parent companies</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_contractor_parent_companies->contractor_parent_company as $_parent_comp) {
            echo  $_parent_comp . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Total obligated amount in dollars by year</strong>'."<br/><br/>";
        $i=0;
        foreach($fedSpending->data->record->fiscal_years->fiscal_year as $_total_dollars) {
            echo 'Fical Year 200'.$i .': $'. number_format($_total_dollars) ."<br/>";
            $i++;
        }
        echo '</p>';
?>

        </div>

        </div>
        
<IFRAME
    WIDTH=380
    HEIGHT=520
    SRC="http://www.followthemoney.org/services/imsp_table.phtml?l=chaunceyt&p=93a8e3fbd6ddb87c4129f8db379627ff&d=P&t=1&s=<?php echo $lawmaker['Lawmaker']['state']; ?>&y=<?php echo $_year_; ?>&"
FRAMEBORDER=0></IFRAME>


                <?php
                    if(isset($lawmaker['Lawmaker']['website'])) {
                        $site->checkForRss($lawmaker['Lawmaker']['website']);
                    }
                 ?>

</div>
</div>
</div> <!-- end profile_right -->
</div> <!-- end profile_page -->
</div>
        </div>
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
    </div>
</div>

