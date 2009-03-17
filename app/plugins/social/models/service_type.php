<?php
class ServiceType extends AppModel {

	var $name = 'ServiceType';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Service' => array('className' => 'Service',
								'foreignKey' => 'service_type_id',
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