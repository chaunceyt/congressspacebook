<?php
class Service extends AppModel {

	var $name = 'Service';
    var $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	/*var $belongsTo = array(
			'ServiceType' => array('className' => 'ServiceType',
								'foreignKey' => 'service_type_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);*/

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
