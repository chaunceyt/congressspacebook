<span style="font-size:10.5px">
<table cellpadding="2">
<tr><td colspan="2"><h2><small>House Leadership</small></h2></td></tr>
<tr><td><strong>Democrats</strong></td><td><strong>Republicans</strong></td></tr>
<tr>
<td colspan="2"><strong>SPEAKER:</strong> <a href="<?php echo Router::url('/profiles/Nancy_Pelosi'); ?>">Nancy Pelosi (CA)</a></td></tr>
<tr>
    <td><strong>MAJORITY LEADER:</strong>  <a href="<?php echo Router::url('/profiles/Steny_Hoyer'); ?>">Steny Hoyer (MD)</a></td>
    <td><strong>MINORITY LEADER:</strong> <a href="<?php echo Router::url('/profiles/John_Boehner'); ?>">John Boehner (OH)</a></td>
</tr>
<tr>
    <td><strong>MAJORITY WHIP:</strong> <a href="<?php echo Router::url('/profiles/James_Clyburn'); ?>">James E. Clyburn (SC)</a></td>
    <td><strong>MINORITY WHIP:</strong> <a href="<?php echo Router::url('/profiles/Eric_Cantor'); ?>">Eric Cantor (VA)</a></td>
</tr>
<tr>
    <td><strong>CAUCUS CHAIR:</strong> <a href="<?php echo Router::url('/profiles/John_Larson'); ?>">John B. Larson (CT)</a></td>
    <td><strong>CONFERENCE CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Mike_Pence'); ?>">Mike Pence (IN)</a></td>
</tr>
<tr>
    <td><strong>POLICY CHAIR:</strong> <a href="<?php echo Router::url('/profiles/George_Miller'); ?>">George Miller (CA)</a></td>
    <td><strong>POLICY CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Thaddeus_McCotter'); ?>">Thad McCotter (MI)</a></td>
</tr>
<tr>
    <td colspan="2"><strong>STEERING CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Rosa_DeLauro'); ?>">Rosa DeLauro (CT)</a></td>
</tr>
<tr>
    <td><strong>DCCC CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Christopher_Van_Hollen'); ?>">Chris Van Hollen (MD)</a></td>
    <td><strong>NRCC CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Peter_Sessions'); ?>">Pete Sessions (TX)</a></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><h2><small>Senate Leadership</small></h2></td></tr>

<tr>
    <td><strong>MAJORITY LEADER:</strong> <a href="<?php echo Router::url('/profiles/Harry_Reid'); ?>">Harry Reid (NV)</a></td>
    <td><strong>MINORITY LEADER:</strong> <a href="<?php echo Router::url('/profiles/Mitch_McConnell'); ?>">Mitch McConnell (KY)</a></td>
</tr>
<tr>
    <td><strong>MAJORITY WHIP:</strong> <a href="<?php echo Router::url('/profiles/Richard_Durbin'); ?>">Dick Durbin (IL)</a></td>
    <td><strong>MINORITY WHIP:</strong> <a href="<?php echo Router::url('/profiles/Jon_Kyl'); ?>">Jon Kyl (AZ)</a></td>
</tr>
<tr>
    <td><strong>CONFERENCE SECRETARY:</strong> <a href="<?php echo Router::url('/profiles/Patty_Murray'); ?>">Patty Murray (WA)</a></td>
    <td><strong>CONFERENCE CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Lamar_Alexander'); ?>">Lamar Alexander (TN.)</a></td>
</tr>
<tr>
    <td colspan="2"><strong>CONFERENCE VICE CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Charles_Schumer'); ?>">Charles Schumer (NY)</a></td>
</tr>
<tr>
    <td colspan="2"><strong>POLICY CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Byron_Dorgan'); ?>">Byron Dorgan (ND)</a></td>
</tr>
<tr>
    <td><strong>DCCC CHAIR:</strong> <a href="<?php echo Router::url('/profiles/Robert_Menendez'); ?>">Robert Menendez (NJ)</a></td>
    <td><strong>NRCC CHAIR:</strong> <a href="<?php echo Router::url('/profiles/John_Cornyn'); ?>">John Cornyn (TX)</a></td>
</tr>
</table>
</span>
<br/>
<?php
if(isset($representative)) {
echo '<h2><small>Your US Representative</small></h2>';
$i = 0;
foreach ($representative as $lawmaker):
    $keyword = $lawmaker['lawmaker']['firstname'] . ' ' .$lawmaker['lawmaker']['lastname'];
    $title_str = $lawmaker['lawmaker']['firstname'] . ' ' .$lawmaker['lawmaker']['lastname'] .' ['.$lawmaker['lawmaker']['party'] .'-'.$lawmaker['lawmaker']['district'].']';
    $congresspedia_name = ucfirst($lawmaker['lawmaker']['firstname']) . '_' .ucfirst($lawmaker['lawmaker']['lastname']);
?>
            <strong><a class="url" rel="me" href="<?php echo Router::url('/profiles/'.$lawmaker['lawmaker']['username']); ?>" title="<?php echo $title_str; ?>"><?php echo $lawmaker['lawmaker']['firstname']; ?> <?php echo $lawmaker['lawmaker']['lastname']; ?></a></strong>
            <?php
            if($lawmaker['lawmaker']['party'] == "D") {
                $party_str = 'Democrat';
            }
            echo $party_str;
            echo ' for Congressional District '. $lawmaker['lawmaker']['district'];
            if(!empty($lawmaker['lawmaker']['webform'])) {
                echo ' - <a href="'.$lawmaker['lawmaker']['webform'].'" title="Contact Me" target="_blank">Contact</a><br/>';
            }
            
           // echo '<br/>';
           // echo '<a href="'.Router::url('/profiles/'.$lawmaker['lawmaker']['username']).'">State Spending</a>';
            ?>
            <div class="clear"></div>
            <br/>
<?php endforeach;
}
?>
