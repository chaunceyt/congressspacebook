
<div class="industries view"  style="padding-left:90px; padding-right:90px;">
<span style="margin:0 auto"><?php echo $this->element('industry_search'); ?></span>
<h1><?php  __('Industry: '. $industry['Industry']['catname']);?></h1>
<h2><?php  __('Sector: '. $industry['Industry']['sector_long']);?></h2>
<p>
<img src="http://www.opensecrets.org/lobby/IMG_client_year_comp.php?lname=<?php echo $industry['Industry']['catorder'];?>&type=n" alt="" />
<?php echo $data_rpt; ?>
<h2>Top Congressional Recipients to benefit from this lobbyist</h2><br/>
<?php echo strip_tags($summary_recips, '<table><th><tr><td>'); ?>
<h2>Top PAC Recipients to benefit from this lobbyist</h2><br/>
<?php echo strip_tags($summary_pacrecips, '<table><th><tr><td>'); ?>
<br>source: <a href="<?php echo $data_rpt_url; ?>" title="OpenSecrets.org" target="_new">Center for Responsive Politics</a><br/>
</p>
</div>
