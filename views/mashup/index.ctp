<div id="content">
    <div class="post">
            <div class="entry">

                <div id="main_search">
                <?php if($hasData == "true") { ?>
                <img src="<?php echo Router::url('/img/mashedup.jpg'); ?>" alt="Mashitup@mashupkeyword.com" />
                <p><h2>Keyword: <?php echo $keyword; ?></h2></p>
                <?php } else { ?>
                <h2><em>ok</em>! enter a word...</h2>
                <form method="post" action="<?php echo Router::url('/search'); ?>">
                    <input type="text" name="data[Search][keyword]" value="<?php echo $keyword; ?>" id="keyword" size="30" />
                <img src="<?php echo Router::url('/img/mashitup.jpg'); ?>" alt="Mashitup@mashupkeyword.com" />
                <?php } ?>
                    <div>
<p><?php
if($hasData == "true") { 
?>
                    <h2><strong><em>click on an icon to see results ...</em></strong></h2>
                    <span><a href="<?php echo Router::url('/twitter/'. @urlencode($keyword)); ?>" title="Twitter Chatter"><img src="http://twitter.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/friendfeed/'. @urlencode($keyword)); ?>" title="Friend Feed"><img src="http://www.friendfeed.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs"><img src="http://www.backtype.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter"><img src="http://www.technorati.com/favicon.ico" class="favicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/flickr/'.@urlencode($keyword)); ?>" title="Flickr Photos"><img src="http://www.flickr.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/youtube/'.@urlencode($keyword)); ?>" title="Youtube Videos"><img src="http://www.youtube.com/favicon.ico" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="Latest News"><img src="http://www.google.com/favicon.ico" class="favicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/eventful/'.@urlencode($keyword)); ?>" title="EventFul"><img src="http://www.eventful.com/favicon.ico" class="favicon" width="25" /></a> </span>

<?php
} else {
?></p>

                        <br />
                        <input type="submit" value="by clicking here...!" />
                </form>
<!--
<p>
<h2>... <strong><em>or</em></strong> get social connection(s) for a link</h2>
<form method="post" action="<?php echo Router::url('/social_graph'); ?>">
<input type="text" name="data[Search][url]" value="http://twitter.com/barackobama" size="50"/>
<input type="submit" value="View Social Graph" />
</form>
</p>
-->
<?php } ?>
                    </div>
                </div>
<!--
 <p id="firefoxPlugin"><a href="javascript:window.external.AddSearchProvider('http://mashupkeyword.com/blog/mashupkeyword-search.xml')">Install</a>
Firefox
search plugin for quick access to this site.    </p>-->
      </div><!-- end entry -->
          </div>
          </div>

