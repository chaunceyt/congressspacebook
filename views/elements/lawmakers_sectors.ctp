        <?php if(isset($candSector)) { ?>
            <a><h2>The sector(s) that contributed to this member's last campaign</h2></a>
            
            <table width="100%">
            <?php
              for($i=0; $i < sizeof($candSector->sectors->sector); $i++) {     
                  echo '<tr>';
                  echo '<td><a href="'.Router::url('/industries/sector:'.urlencode(str_replace('/','*',$candSector->sectors->sector[$i]->attributes()->sector_name))).'">'.$candSector->sectors->sector[$i]->attributes()->sector_name . '</a></td>';
                  echo '<td  style="text-align:right;"> $'.number_format($candSector->sectors->sector[$i]->attributes()->total);
                  echo '</td>';
                  echo '</tr>';
               }
            ?>
            </table>
        <?php } ?>    
</div>
</div>


