<?php 
/**
 * File used as application component
 *
 * Contains methods for application 
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Component class 
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */
class ZendComponent extends Object 
{
    /**
     * Controller Startup Initialisation
     * Add APP/vendor to include path
     * 
     * @throws Exception
     */
    public function startup() {
        $include = get_include_path();
        $include.= PATH_SEPARATOR. APP . 'vendors' . DS;
        $successful = set_include_path($include);
        if (!$successful) {
            throw new Exception('ZendComponent failed to set include path.', E_ERROR);
        }
        require_once('Zend/Loader.php');
        Zend_Loader::registerAutoload();
    }

    public function cache()
    {
        $cacheDir = APP . 'tmp' . DS .'zend_cache';
        $frontendOptions = array(
            'lifetime' => 7200, // cache lifetime of 2 hours
            'automatic_serialization' => true);
        $backendOptions = array(
            'cache_dir' => $cacheDir); // Directory where to put the cache files
        return Zend_Cache::factory('Core', 'File', $frontendOptions, $backendOptions);
    }
    
}//end of class
?> 
