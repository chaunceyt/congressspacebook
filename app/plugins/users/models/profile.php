<?php
class Profile extends UsersAppModel {

    var $name = 'Profile';

    var $belongsTo = array('User' => array('className' => 'Users.User'));
/**
    var $validate = array(
            'user_icon' => array(
                    'rule' => array('url'),
                    'message' => 'Please provide a valid URL'
                    )
                );
*/
}
