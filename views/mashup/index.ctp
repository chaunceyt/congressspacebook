    <div id="content">
            <div id="viewpage">
<p>
<?php if($hasData == "true") { ?>
                    <h2><strong>Keyword Mashed Up: <?php echo $keyword; ?></strong></h2>
                    <p><em>Found Data on the following services ...</em></p>
                    <span><a href="<?php echo Router::url('/twitter/'. @urlencode($keyword)); ?>" title="Twitter Chatter"><img src="http://twitter.com/favicon.ico" clas
s="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/friendfeed/'. @urlencode($keyword)); ?>" title="Friend Feed"><img src="http://www.friendfeed.com/favicon.ico
" class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/comments/'.@urlencode($keyword)); ?>" title="Comments: Blogs"><img src="http://www.backtype.com/favicon.ico"
 class="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/technorati/'.@urlencode($keyword)); ?>" title="Blog Chatter"><img src="http://www.technorati.com/favicon.ico
" class="favicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/flickr/'.@urlencode($keyword)); ?>" title="Flickr Photos"><img src="http://www.flickr.com/favicon.ico" class
="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/youtube/'.@urlencode($keyword)); ?>" title="Youtube Videos"><img src="http://www.youtube.com/favicon.ico" cl
ass="favicon" width="25" /></a>  </span>
                    <span><a href="<?php echo Router::url('/news/'. @urlencode($keyword)); ?>" title="Latest News"><img src="http://www.google.com/favicon.ico" class="f
avicon" width="25" /></a> </span>
                    <span><a href="<?php echo Router::url('/eventful/'.@urlencode($keyword)); ?>" title="EventFul"><img src="http://www.eventful.com/favicon.ico" class=
"favicon" width="25" /></a> </span>

<?php
} 
?>
</p>
<p>
            <?php if($hasData == "true") { ?>
                <h2>enter another word...</h2>
            <?php } else { ?>
                <h2>enter a word...</h2>
            <?php } ?>
                <form method="post" action="<?php echo Router::url('/search'); ?>">
            <?php if($hasData == "true") { ?>
                    <input type="text" name="data[Search][keyword]" value="" id="keyword" size="30" />
                <h2>enter another word to be mashed up...</h2>
            <?php } else { ?>
                    <input type="text" name="data[Search][keyword]" value="<?php echo $keyword; ?>" id="keyword" size="30" />
            <?php } ?>
                        <input type="submit" value="mash it up...!" />
                </form>
</p>
<p>
<h2><strong><em>or</em></strong> enter a link...</h2>
<form method="post" action="<?php echo Router::url('/social_graph'); ?>">
<input type="text" name="data[Search][url]" value="http://twitter.com/barackobama" size="50"/>
<input type="submit" value="get social graph" />
</form>
</p>
<p><h2>see <a href="<?php echo Router::url('/people_who_have_the_most_twitter_friends'); ?>">who</a> has the most <img src="http://www.twitter.com/favicon.ico" class="favicon" width="20" />witter Connections...</h2></p>
<p><h2>check out the <a href="<?php echo Router::url('/lawmakers_with_twitter_accounts'); ?>">lawmakers</a> who have <img src="http://www.twitter.com/favicon.ico" class="favicon" width="20" />witter accounts...</h2></p>
<!--
 <p id="firefoxPlugin"><a href="javascript:window.external.AddSearchProvider('http://mashupkeyword.com/blog/mashupkeyword-search.xml')">Install</a>
Firefox
search plugin for quick access to this site.    </p>-->
      </div><!-- end entry -->
 </div>

