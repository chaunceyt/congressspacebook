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
class LobbyistsFiling extends AppModel {

	var $name = 'LobbyistsFiling';
	var $primaryKey = 'filing_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	/*var $belongsTo = array(
			'Filing' => array('className' => 'Filing',
								'foreignKey' => 'filing_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);*/

}
?>
