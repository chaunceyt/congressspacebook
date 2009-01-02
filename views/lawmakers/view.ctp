<div id="content">
    <div class="post">
        <div class="entry">

<div class="lawmakers view">
<h2><?php  __('US '.$lawmaker['Lawmaker']['title']);?></h2>
<table>
<tr>
<td>
 <span><img src="<?php echo Router::url('/img/lawmakers/100x125/'.$lawmaker['Lawmaker']['bioguide_id'].'.jpg'); ?>" alt="" /></span>
</td>
<td valign="top">
            <?php echo $lawmaker['Lawmaker']['title']; ?>
			<?php echo $lawmaker['Lawmaker']['firstname']; ?>
			<?php echo $lawmaker['Lawmaker']['middlename']; ?>
			<?php echo $lawmaker['Lawmaker']['lastname']; ?>
			[<?php echo $lawmaker['Lawmaker']['party']; ?>-<?php echo $lawmaker['Lawmaker']['state']; ?>-<?php echo $lawmaker['Lawmaker']['district']; ?>]
            <br/>
			Phone: <?php echo $lawmaker['Lawmaker']['phone']; ?><br/>
			Fax: <?php echo $lawmaker['Lawmaker']['fax']; ?><br/>
			Website: <?php echo $lawmaker['Lawmaker']['website']; ?><br/>
			Office: <?php echo $lawmaker['Lawmaker']['congress_office']; ?><br/>
</td>
</tr>
</table>
</div>
        </div>
    </div>
</div>
