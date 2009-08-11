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
class StateGovernor extends AppModel {

    public function getGovernor($state)
    {
        $sql = "select * from state_governors where governor_state_code = '".$state."'";
        $results = $this->query($sql);
        return $results;
    }


}
