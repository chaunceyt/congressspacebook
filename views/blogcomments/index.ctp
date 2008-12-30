<div id="content">
    <div class="post">
<center><?echo $CommentsPagination; ?></center>
<div class="entry">
<?php
  //      echo '<pre>';
//               print_r($blogcomments);
if(isset($blogcomments->comments->entry)) {
foreach($blogcomments->comments->entry as $_comment) {
    //print_r($_comment);
    echo '<p>';
    echo 'Comment posted on Blog: <a href="'.$_comment->blog->url.'">'.$_comment->blog->title.'</a><br/>';
    echo '<a href="'.$_comment->post->url.'">'.$_comment->post->title.'</a><br/>';
    echo 'By: '. $_comment->author->name.'<br/>';
    echo $_comment->comment->content."<br/>";
    echo 'Comment Url: <a href="'. $_comment->comment->url.'">click here</a>';
    echo '</p>';
}
}
else {
    echo 'Nothing found here';
}
?>
      </div><!-- end entry -->
<center><?echo $CommentsPagination; ?></center>
          </div>

          </div>
                  <!-- end #content -->

