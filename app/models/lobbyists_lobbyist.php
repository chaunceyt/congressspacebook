<?php
class LobbyistsLobbyist extends AppModel {

	var $name = 'LobbyistsLobbyist';

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
