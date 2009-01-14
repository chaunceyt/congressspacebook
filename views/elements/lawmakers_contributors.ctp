
        <?php if(isset($candContrib)) { ?>
            <a><h2><img src="<?php echo Router::url('/img/tree_expand.gif'); ?>" alt="" />Contributors</h2></a>
            <table width="80%">
            <?php
              for($i=0; $i < sizeof($candContrib->contributors->contributor); $i++) {     
                  echo '<tr>';
                  echo  '<td>'.$candContrib->contributors->contributor[$i]->attributes()->org_name . '</td>   <td style="text-align:right"> $' . number_format($candContrib->contributors->contributor[$i]->attributes()->total) .'</td>';
                  echo '</tr>';
               }
            ?>
            </table>
        <?php } ?> 
</div>
</div>


