<?php
class UsersAppModel extends AppModel {

    function __construct($one = null, $two = null, $three = null) {
        //$this->useDbConfig = Configure::read('Site.database');
        parent::__construct($one, $two, $three);
    }
}
