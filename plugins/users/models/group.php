<?php
class Group extends UsersAppModel {
/**
 * Enter description here...
 *
 * @var string
 */
    var $name = 'Group';
/**
 * Enter description here...
 *
 * @var unknown_type
 */
    var $validate = array('name' => VALID_NOT_EMPTY);

    var $belongsTo = array('Level' => array('className' => 'Users.Level'));

/**
 * Enter description here...
 *
 * @var array
 */
   var $hasMany = array('User'=> array('className' => 'Users.User'));
}
