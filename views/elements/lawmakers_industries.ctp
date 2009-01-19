        <?php if(isset($candIndustry)) { ?>
            <a><h2>The industries that contributed to this member's last campaign</h2></a>
<p>
View breakdown by:
<a href="<?php echo Router::url('/profiles/'.$username.'/contributors'); ?>">Contributors</a>
Industries 
<a href="<?php echo Router::url('/profiles/'.$username.'/sectors'); ?>">Sectors</a>
</p>
            
            <table width="100%">
            <?php
              for($i=0; $i < sizeof($candIndustry->industries->industry); $i++) {     
                  echo '<tr>';
                  echo '<td><a href="'.Router::url('/industries/industry:'.urlencode(str_replace('/','*',$candIndustry->industries->industry[$i]->attributes()->industry_name))).'">'.$candIndustry->industries->industry[$i]->attributes()->industry_name . '</a></td>';
                  echo '<td  style="text-align:right"> $'.number_format($candIndustry->industries->industry[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
        <?php } ?>
        </div>
        </div>
