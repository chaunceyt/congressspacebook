        <?php if(isset($candSector)) { ?>
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Sectors</h2></a>
            
            <table width="100%">
            <?php
              for($i=0; $i < sizeof($candSector->sectors->sector); $i++) {     
                  echo '<tr>';
                  echo '<td>'.$candSector->sectors->sector[$i]->attributes()->sector_name . '</td>';
                  echo '<td  style="text-align:right;"> $'.number_format($candSector->sectors->sector[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
        <?php } ?>    
</div>
</div>


