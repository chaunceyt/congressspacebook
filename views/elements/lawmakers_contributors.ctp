
        <?php if(isset($candContrib)) { ?>
            <a><h2>Top Contributors and how much they gave this member and their lobbying pattern</h2></a>
            <table width="100%">
            <?php
              for($i=0; $i < sizeof($candContrib->contributors->contributor); $i++) {    
                  echo '<tr>';
                  echo  '<td><strong><a href="'.Router::url('/lobbyist/'.urlencode($candContrib->contributors->contributor[$i]->attributes()->org_name)).'">'.$candContrib->contributors->contributor[$i]->attributes()->org_name . '</strong></td>   <td style="text-align:right"> $' . number_format($candContrib->contributors->contributor[$i]->attributes()->total) .'</a></td>';
                  echo '</tr>';
                  echo '<tr><td colspan="2"><a href="http://www.opensecrets.org/lobby/clientsum.php?lname='.urlencode($candContrib->contributors->contributor[$i]->attributes()->org_name).'&year=2008" target="_new"><img src="http://www.opensecrets.org/lobby/IMG_client_year_comp.php?lname='.urlencode($candContrib->contributors->contributor[$i]->attributes()->org_name).'&type=c" alt="chart" title="source: opensecrets.org"/></a></td></tr>';
               }
            ?>
            </table>
            <p style="padding-top:15px;">These contributors fall under a particular 
            <a href="<?php echo Router::url('/profiles/'.$username.'/sectors'); ?>">sector</a> and then a particular 
            <a href="<?php echo Router::url('/profiles/'.$username.'/industries'); ?>">Industy</a> view that breakdown

        <?php } ?> 
</div>
</div>


