        <?php if(isset($candIndustry)) { ?>
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Industries</h2></a>
            
            <table width="80%">
            <?php
              for($i=0; $i < sizeof($candIndustry->industries->industry); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candIndustry->industries->industry[$i]->attributes()->industry_name . '</td>';
                  echo '<td  style="text-align:right"> $'.number_format($candIndustry->industries->industry[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
        <?php } ?>
        </div>
        </div>
