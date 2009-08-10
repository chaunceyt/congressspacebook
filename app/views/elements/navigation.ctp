<style>
#nav-menu ul
{
list-style: none;
padding: 0;
margin: 0; auto;
}

#nav-menu li
{
float: left;
margin: 0 0.10em;
}

#nav-menu li a
{
background: url(background.gif) #fff bottom left repeat-x;
height: 2em;
line-height: 2em;
float: left;
width: 7em;
display: block;
border: 0.1em solid #dcdce9;
color: #0d2474;
text-decoration: none;
text-align: center;
}

/* Hide from IE5-Mac \*/
#nav-menu li a
{
float: none
}
/* End hide */

#nav-menu
{
width:90em;
margin:0px auto;
padding-left:20px;
}
</style>
<div id="nav-menu">
<ul>
<li><a href="<?php echo Router::url('/'); ?>">Home</a></li>
<li><a href="<?php echo Router::url('/lawmakers/browse/senate');?>">Senate</a></li>
<li><a href="<?php echo Router::url('/lawmakers/browse/house');?>">House</a></li>
<li><a href="<?php echo Router::url('/congress_votes');?>">Votes</a></li>
<li><a href="<?php echo Router::url('/industries');?>">Lobbyist</a></li>
<li><a href="<?php echo Router::url('/congress_parties');?>">Parties</a></li>
<li><a href="<?php echo Router::url('/pages/about');?>">About</a></li>
<li><a href="<?php echo Router::url('/pages/latest_commits');?>">Commits</a></li>
</ul>
</div>
<br/><br/>
