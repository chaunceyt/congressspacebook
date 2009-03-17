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
class Service extends AppModel {

	var $name = 'Service';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'ServiceType' => array('className' => 'ServiceType',
								'foreignKey' => 'service_type_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Account' => array('className' => 'Account',
								'foreignKey' => 'service_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

}
?>
