<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : StarGazer
Description: Fixed-width, two-column design suitable for small sites and blogs.
Version    : 1.0
Released   : 20071222

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo strtoupper($keyword); ?>| Browse Latest News, Videos, Pictures, Comments, Posts, Events| CongressSpacebook.com</title>
<meta name="Author" content="Chauncey Thorn (chaunceyt [at] gmail.com)">
<META NAME="Generator" CONTENT="MASHUP::Keyword (www.mashupkeyword.com)">
<meta name="KeyWords" content="beyonce,  mashup, celebs, artist, hiphop, rnb, keywords, api, search, music, zend framework, php, reggae, soul, hip-hop, photos">
<meta name="Description" content="the ">
<meta name="country" content="USA">
<meta name="copyright" content="copyright 2008 - MASHUP::Keyword">
<meta name="coverage" content="Worldwide">
<meta name="revisit_after" content="1day">
<meta name="title" content="MASHUP::Keyword videos, photos, news, battles">
<meta name="identifier" content="http://www.mashupkeyword.com/">

<meta name="language" content="English">
<meta name="googlebot" content="index">
<?php  echo $html->css('style')."\n"; ?>
<?php  echo $html->css('tooltip')."\n"; ?>
<?php echo $javascript->link('jquery-1.2.6.js', false); ?>
<?php echo $javascript->link('ui.tabs.js', false); ?>
<?php echo $javascript->link('ui.core.js', false); ?>
<script type="text/javascript" src="/js/tooltip.js"></script>
<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php"></script>
<?php 
echo $scripts_for_layout;
?>
<script type="text/javascript" src="<?php echo Router::url('/'); ?>/js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="<?php echo Router::url('/'); ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo Router::url('/'); ?>/js/ui.tabs.js"></script>
<script type="text/javascript" src="/js/tooltip.js"></script>
<link href="/css/bracket.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE]>
<style type="text/css"> 
#firefoxPlugin { display: none; }
</style>
<![endif]-->
</head>
<body>
<div id="container">
<div id="header">
<a href="<?php echo Router::url('/'); ?>" title="CongressSpacebook.com"><img src="<?php echo Router::url('/'); ?>img/congress_spacebook_header.jpg" alt="" border="0"/></a>
</div>

<div id="page">
<?php $session->flash(); ?>

<?php echo $content_for_layout; ?>
<!--
        <div id="sidebar">
                <?php // echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div> -->
<!-- end #page -->
</div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2016479-5");
pageTracker._initData();
pageTracker._trackPageview();
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2016479-7");
pageTracker._trackPageview();
} catch(err) {}</script>


<div id="footer">
        <p>(c) <?php echo date("Y"); ?> CongressSpacebook.com.</p>
        <p>Powered By MASHUP::Keyword</p>
</div>
</body>
</html>


	<?php echo $cakeDebug; ?>
