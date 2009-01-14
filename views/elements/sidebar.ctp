    <ul>

            <li>
            <ul>
<p>
<form method="post" action="<?php echo Router::url('/lawmakers/search'); ?>">
    <input type="hidden" name="_method" value="POST" />
    <input name="data[Search][query]" type="text" value="" class="query" id="Search" />
    <input type="submit" id="searchbtn" value="Search Profiles" />
</form>
</p>
<p></p>            
            </ul>
            <?php if(isset($username)) { ?>
            <a><h2>Additional Info</h2></a>
            <ul>
            <li><a href="<?php echo Router::url('/profiles/'.$username.'/contributors'); ?>">Contributors</a> totals</li>
            <li><a href="<?php echo Router::url('/profiles/'.$username.'/industries'); ?>">Industries</a> totals</li>
            <li><a href="<?php echo Router::url('/profiles/'.$username.'/sectors'); ?>">Sectors</a> totals</li>
            <li><a href="<?php echo Router::url('/profiles/'.$username.'/fedspending'); ?>">State's FedSpending</a></li>
            </ul>
       <?php
        if(strlen($lawmaker['Lawmaker']['district']) == 1) {
            $_district = '0'.$lawmaker['Lawmaker']['district'];
        }
        else {
            $_district = $lawmaker['Lawmaker']['district'];
        }
        $widgetID = $lawmaker['Lawmaker']['state'].$_district;
        $_year_ = date("Y")-1;

            $congresspedia_name = ucfirst($lawmaker['Lawmaker']['firstname']) . '_' .ucfirst($lawmaker['Lawmaker']['lastname']);
            $this_person = $lawmaker['Lawmaker']['firstname'] . ' ' .$lawmaker['Lawmaker']['lastname'];
            $openSecretWidgitData = $lawmaker['Lawmaker']['state'].$_district;
       ?>
            <p>
            <strong>Bio Information</strong>: <a href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            <strong>Campaign Finance</strong> : <a href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>"target="_new">summary</a><br/>
            <strong>Congresspedia URL</strong>: <a href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new">about</a><br/>
            <strong>FEC Summary</strong> : <a href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
               <strong> On the issues</strong>: <a href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                <strong>On the issues</strong>: <a href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?><br/>
            <strong>Voting</strong>: <a href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            </p>
            
            <?php } ?>
                <p>
                <ul>
                    <li><a href="<?php echo Router::url('/lobbyists_filings'); ?>"><img src="<?php echo Router::url('/'); ?>img/lobbyist_at_work.jpg" alt="Their Clients" border="0"/></a></li>
                </ul>
                </p>

                Congress referenced :<br/>
                <strong><em><?php echo $keyword; ?></em></strong> -
                <?php echo number_format($wordused); ?> time(s)<br/> in 2008 <br/>
                
                <h2>About</h2>
                <ul>
                    <li><a href="<?php echo Router::url('/pages/about'); ?>">CongressSpaceBook</a></li>
                </ul>
            </li>
        </ul>
        <div style="clear: both; height: 40px;">&nbsp;</div>

