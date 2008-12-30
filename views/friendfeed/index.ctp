        <div id="content">
                <div class="post">
        <center><?echo $FriendfeedPagination; ?></center>
        <div class="entry">
            <ul>
<br clear="all"/>
<?php
if(isset($FriendFeed->entries)) {
    foreach($FriendFeed->entries as $feed) {
        echo '<li>';
        echo '<span class="title"><label for><a href="'.$feed->link.'" target="_new">'.$feed->title.'</a></label></span><br/>'."\n";
        echo '</li>';
    }
}
else {
    echo 'Nothing found here';
}
?>
</ul>
<br clear="all"/>
                        </div>
                </div>
        <center><?echo $FriendfeedPagination; ?></center>
<p>Powered By: <a href="http://www.friendfeed.com/" target="_new">FriendFeed</a> API</p>

        </div>
        <!-- end #content -->

