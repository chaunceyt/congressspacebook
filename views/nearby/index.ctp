<div id="content">
    <div class="post">
        <div class="entry">
<?php

foreach($data as $local) {
    echo '<img src="'.$local->icon_path.'" alt=""/> <a href="'.$local->author_url.'" target="_new">' . $local->author ."</a><br/>";
    echo $local->title ."<br/>";
    echo '<p>'. nl2br(trim($local->body)) . '  <a href="'.$local->url.'" target="_new">more</a>...</p>';
}
//echo '<pre>';
//print_r($data);
?>
        </div>
<img src="http://api.outside.in/images/powered_by_widget_logo.gif" alt="outside.in"/>
    </div>
</div>
