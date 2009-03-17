<div id="page">
        <div id="content">
                <div class="post">
                        <div class="entry"  style="padding-left:90px;">
            <p></p>
            <ul>
<?php
foreach($TechnoratiSearch as $technorati) {
    //echo $technorati['description'];
    echo '<li>';
    echo '<span class="title"><label for><a href="'.$technorati['link'].'" target="_new">'.$technorati['title'].'</a></label></span><br/>';
    echo '<span class="title_entry">'.$technorati['description'].'</span><br/>'."\n";
    echo '</li>';
}
?>

<p>Powered By: <a href="http://www.technorati.com/" target="_new">technorati</a> API(s)</p>
                        </div>
                </div>

        </div>
        <!-- end #content -->

