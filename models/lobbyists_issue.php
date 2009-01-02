<?php
class LobbyistsIssue extends AppModel {

	var $name = 'LobbyistsIssue';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'LobbyistsFiling' => array('className' => 'LobbyistsFiling',
								'foreignKey' => 'filing_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>
