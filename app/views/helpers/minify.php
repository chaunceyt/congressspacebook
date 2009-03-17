<?php 
/***
 * Cakephp view helper to interface with http://code.google.com/p/minify/ project.
 * Minify: Combines, minifies, and caches JavaScript and CSS files on demand to speed up page loads.
 * @author: Ketan Shah - ketan.shah@gmail.com - http://www.innovatechnologies.in
 * Requirements: An entry in core.php - "MinifyAsset" - value of which is either set 'true' or 'false'. False would be usually set during development and/or debugging. True should be set in production mode.
 */

Class MinifyHelper extends AppHelper{
        
        var $helpers = array('Javascript','Html'); //used for seamless degradation when MinifyAsset is set to false;
        
        function js($assets){
            if(Configure::read('MinifyAsset')){
               e(sprintf("<script type='text/javascript' src='%s'></script>",$this->_path($assets, 'js')));
            }
            else{
                e($this->Javascript->link($assets));
            }
        }
        
        
        function css($assets){
            if(Configure::read('MinifyAsset')){
                e(sprintf("<link type='text/css' rel='stylesheet' href='%s' />",$this->_path($assets, 'css')));
            }
            else{
                e($this->Html->css($assets));
            }
        }
        
        function _path($assets, $ext){
            $path = $this->webroot . "min/b=$ext&f=";
            foreach($assets as $asset){
                $path .= ($asset . ".$ext,");
            }
            return substr($path, 0, count($path)-2);
        }
    }

?>
