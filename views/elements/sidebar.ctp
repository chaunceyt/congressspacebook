    <ul>
            <li>
            <?php if(!isset($hasData)) { ?>
                <h2>Search Results...</h2>
            <?php } ?>    
                <ul>
                <?php 
                    if(isset($keyword) && !isset($hasData)) { ?>
                        <!--
                            <li><a href="./similar?keyword=<?php echo @urlencode($_GET['keyword']); ?>" title="Similar Artist">Similar Artists</a>  </li>
                            <li><a href="./albums?keyword=<?php echo @urlencode($_GET['keyword']); ?>" title="Albums">Top Albums</a>  </li>
                        -->    
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
                    <?php 
                    } ?>
                </ul>
                <h2>About</h2>
                <ul>
                <li><a href="<?php echo Router::url('/pages/about'); ?>">MASHUP::Keyword</a></li>
                </ul>
            </li>
        </ul>
        <div style="clear: both; height: 40px;">&nbsp;</div>

