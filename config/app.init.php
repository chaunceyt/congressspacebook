<?php
/**
* CongressSpaceBook core configuration
*/
 
/** Wildflower config. Access like Configure::read('Wildflower.settingName'); */
Configure::write(array('CongressSpacebook' => array(
    'cookie' => array(
        'name' => 'CongressSpacebook',
        'expire' => 2592000,
    ),
    'img100x125Directory' => APP . WEBROOT_DIR . DS . 'img/lawmakers/100x125', // @TODO rename the key
    'img40x25Directory' => APP . WEBROOT_DIR . DS . 'img/lawmakers/100x125', // @TODO rename the key
    'zendCache' => CACHE . 'zend_cache',
    'billsPath' => '/home/govtrack/data/us/bills.txt/',
)));
