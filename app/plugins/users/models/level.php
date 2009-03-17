<?php
class Level extends UsersAppModel {
/**
 * Enter description here...
 *
 * @var string
 */
    var $name = 'Level';
/**
 * Enter description here...
 *
 * @var array
 */
    var $hasMany = array('Group'=>
                          array('className' => 'Users.Group'),
                         'User'=>
                          array('className' => 'Users.User'));
}
