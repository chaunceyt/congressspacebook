    <ul>

            <li>
            <ul>
<p>
<form method="post" action="<?php echo Router::url('/lawmakers/search'); ?>">
    <input type="hidden" name="_method" value="POST" />
    <input name="data[Search][query]" type="text" value="" class="query" id="Search" /><br/>
    <input type="submit" id="searchbtn" value="Search Profiles" />
</form>
</p>
<p></p>            
            </ul>
            <?php if(isset($username)) { ?>
            <p>
            <a><h2>Related Info</h2></a>
            <?php if(!empty($lawmaker['Lawmaker']['twitter_id'])) { ?>
            <span> twitter social_stream <a href="<?php echo Router::url('/social_stream/user/'.@urlencode($lawmaker['Lawmaker']['twitter_id'])); ?>" title="twitter account">twitter_stream</a>  </span>
            <?php } ?><br/>
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
            <strong>Bio</strong>: <a class"url" rel="me" href="http://bioguide.congress.gov/scripts/biodisplay.pl?index=<?php echo $lawmaker['Lawmaker']['bioguide_id']; ?>" target="_new">about</a><br/>
            <strong>Campaign Finance</strong> : <a  class"url" rel="me" href="http://www.opensecrets.org/politicians/summary.php?cid=<?php echo $lawmaker['Lawmaker']['crp_id']; ?>"target="_new">summary</a><br/>
            <strong>Congresspedia URL</strong>: <a  class"url" rel="me" href="http://www.sourcewatch.org/index.php?title=<?php echo $congresspedia_name; ?>" target="_new">about</a><br/>
            <strong>FEC Summary</strong> : <a  class"url" rel="me" href="http://query.nictusa.com/cgi-bin/cancomsrs/?_08+<?php echo $lawmaker['Lawmaker']['fec_id']; ?>" target="_new">reports</a><br/>
            <?php if(preg_match('/House/',$lawmaker['Lawmaker']['congress_office'])) { ?>
               <strong> On the issues</strong>: <a  class"url" rel="me" href="http://senate.ontheissues.org/House/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php }  else  {?>
                <strong>On the issues</strong>: <a  class"url" rel="me" href="http://senate.ontheissues.org/Senate/<?php echo $congresspedia_name; ?>.htm" target="_new">history</a>
            <?php } ?><br/>
            <strong>Voting</strong>: <a  class"url" rel="me" href="http://votesmart.org/voting_category.php?can_id=<?php echo $lawmaker['Lawmaker']['votesmart_id']; ?>" target="_new">record</a><br/>
            <strong>State's</strong>: <a  class"url" rel="me" href="<?php echo Router::url('/profiles/'.$username.'/fedspending'); ?>">Federal Spending</a></li>
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

