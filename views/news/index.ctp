        <div id="content">
                <div class="post">
                        <div class="entry">
            <ul>
<br clear="all"/>
<?php
foreach($GoogleSearch as $google) {
    echo '<li>';
    echo '<span class="title"><label for><a href="'.$google['link'].'" target="_new">'.$google['title'].'</a></label></span><br/>'."\n";
    echo '<span class="title_entry">'.$google['description'].'</span><br/>'."\n";
    echo '</li>';
}
?>
</ul>
<br clear="all"/>
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
</ul>
<p>Powered By: <a href="http://www.google.com/" target="_new">Google</a>  <a href="http://www.technorati.com/" target="_new">technorati</a> API(s)</p>
                        </div>
                </div>

        </div>
        <!-- end #content -->
        <div id="sidebar">
                <?php  echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>

