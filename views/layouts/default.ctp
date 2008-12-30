<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
<title><?php echo strtoupper($keyword); ?>| Browse Latest News, Videos, Pictures, Comments, Posts, Events| MASHUP::Keyword</title>
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
<script type="text/javascript" src="/js/tooltip.js"></script>
<link href="/css/bracket.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE]>
<style type="text/css"> 
#firefoxPlugin { display: none; }
</style>
<![endif]-->


</head>
<body>
<div id="header">
        <h1><a href="<?php echo Router::url('/'); ?>">MASHUP::KEYWORD</a></h1>
</div>
<div id="navheader">
<h3 style="padding-left:20px">want to browse the latest news headlines, comments, posts, photos, videos, and events...</h3>
        <br clear="all" />
</div>        
<div id="page">
			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

        <div id="sidebar">
                <?php echo $this->element('sidebar', array('keyword' => $keyword)); ?>
        </div>
        <div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<hr />
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2016479-5");
pageTracker._initData();
pageTracker._trackPageview();
</script>

<div id="footer">
        <p>(c) 2008 Mashupkeyword.com. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>

        <p>Powered By MASHUP::Keyword BETA</p>
</div>
</body>
</html>


	<?php echo $cakeDebug; ?>
