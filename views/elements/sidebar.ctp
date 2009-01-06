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
                <h3>Lobbyist @ Work</h3>
                <ul>
                    <li><a href="<?php echo Router::url('/lobbyists_filings'); ?>">Their Clients</a></li>
                </ul>

                we made reference to:<br/>
                <strong><em><?php echo $keyword; ?></em></strong> -
                <?php echo number_format($wordused); ?> time(s)<br/> in 2008 <br/>
                
                <h2>About</h2>
                <ul>
                    <li><a href="<?php echo Router::url('/pages/about'); ?>">CongressSpaceBook</a></li>
                </ul>
            </li>
        </ul>
        <div style="clear: both; height: 40px;">&nbsp;</div>

