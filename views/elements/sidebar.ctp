    <ul>
            <li>
    
            <p>
                <strong><a href="<?php echo Router::url('/keyword_frequency/'.$keyword); ?>" title="Random Keyword"><em><?php echo $keyword; ?></em></a></strong> -
                  word<br/>
                used <?php echo number_format($wordused); ?> time(s)<br/>
                by congress last year<br/>
            </p>
            <h3>MASHUP</h3>
                <ul>
                    <li><img src="http://twitter.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/twitter/'. @urlencode($keyword)); ?>" title="Twitter Chatter">Twitter Post</a>  </li>
                    <li><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/friendfeed/'. @urlencode($keyword)); ?>" title="Friend Feed">FriendFeed Chatter</a>  </li>
                    <li><img src="http://backtype.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs">User Comments</a>  </li>
                    <li><img src="http://www.technorati.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter">Blogs Chatter</a> </li>
                    <li><img src="http://www.flickr.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/flickr/'.@urlencode($keyword)); ?>" title="Images">Flickr Images</a>  </li>
                    <li><img src="http://youtube.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/youtube/'.@urlencode($keyword)); ?>" title="Videos">Youtube Videos</a>  </li>
                    <li><img src="http://www.google.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="News">Google News</a> </li>
                    <li><img src="http://www.eventful.com/favicon.ico" class="favicon" width="12" /> <a href="<?php echo Router::url('/eventful/'.@urlencode($keyword)); ?>" title="Event">EventFul</a> </li>
                    <!--<li> Audioscrobbler </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/similar/'.@urlencode($keyword)); ?>" title="Similar Artist">Similar Artist</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/albums/'.@urlencode($keyword)); ?>" title="Albums">Albums</a> </li>-->
                    <!--<li><a href="<?php echo Router::url('/audioscrobbler/tracks/'.@urlencode($keyword)); ?>" title="Top Tracks">Top Tracks</a> </li>-->
                    <!--<li><a href="./lyricwiki/<?php echo @urlencode($keyword); ?>" title="Lyrics">Lyrics</a> </li>-->
                </ul>
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

