    <ul>
            <li>
               <p> <script type='text/javascript' src='http://opensecrets.org/widgets/costofelection_widget.js'></script></p>
    
            <p>
                <strong><a href="<?php echo Router::url('/keyword_frequency/'.$keyword); ?>" title="Random Keyword"><em><?php echo $keyword; ?></em></a></strong> -
                  word<br/>
                used <?php echo number_format($wordused); ?> time(s)<br/>
                by congress last year<br/>
            </p>
                <h3>Congressional Mashup</h3>
                <ul>
                    <li><a href="<?php echo Router::url('/lawmakers/browse'); ?>">Browse</a></li>
                    <li><a href="<?php echo Router::url('/lawmakers'); ?>">Search</a></li>
                    <li><a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">those using twitter</a></li>
                    <li><a href="<?php echo Router::url('/nearby/lawmakers'); ?>">In your state</a></li>
                </ul>    
                <h3>Lobbyist @ Work</h3>
                <ul>
                    <li><a href="<?php echo Router::url('/lobbyists_filings'); ?>">Browse</a></li>
                </ul>
                <h3>For Fun</h3>
                <ul>
                    <li><a href="<?php echo Router::url('/mashup'); ?>">mashup</a></li>
                    <li><a href="<?php echo Router::url('/keyword_frequency/'.$keyword); ?>">word frequency</a></li>
                </ul>                
                <h2>About</h2>
                <ul>
                    <li><a href="<?php echo Router::url('/pages/about'); ?>">MASHUP::Keyword</a></li>
                </ul>
            </li>
        </ul>
        <div style="clear: both; height: 40px;">&nbsp;</div>

