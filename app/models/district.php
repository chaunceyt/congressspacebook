<?php
/**
 * File used as application model
 *
 * Contains methods for application model
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Model class 
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */
class District extends AppModel {

    public function getDistictOverlay($state, $district)
    {
        $sql = "select * from districts where state = '".$state."' AND district = '".$district."'";
        $results = $this->query($sql);
        return $results;
    }


}
