<div id="content">
    <div class="post">
                    <div class="entry">
<center>
<?php 
if(isset($TwitterSearch->results)) {
    echo $TwitterPagination; 
}
?>
</center>
<?php
//echo '<pre>';
//print_r($TwitterSearch);
if(isset($TwitterSearch->results)) {
        foreach($TwitterSearch->results as $res) {
            //print_r($res);
            echo '
                <img src="'.$res['link']['image']->attributes()->href.'" alt="'.$res['author']['name'][0].' Avatar" />
                <a href="'.$res['author']['uri'][0].'">'.$res['author']['name'][0].'</a>
                <div class="what">'.$res['title'][0].'</div>
                <div class="l"><span class="date">
                <a href="'.$res['link']['status']->attributes()->href.'" title="View original post">Original Post</a> | 
                <a href="'.Router::url('/social_stream/user/'.str_replace('http://twitter.com/','',$res['author']['uri'][0])).'">social stream</a>
                </span></div>
                <br/>
            ';
        }
}
else {
    echo 'Nothing found here';
}
?>
      </div><!-- end entry -->
          </div>

<center>
<?php 
if(isset($TwitterSearch->results)) {
    echo $TwitterPagination; 
}
?>
</center>
          </div>
                  <!-- end #content -->

