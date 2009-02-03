<?php
//require APP . 'vendors' . DS .'JSON.php';
class FedspendingComponent extends Object
{
    private $apikey = '5abe0558b3e3735144dc4d2e1b6640d7';

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

    private function cache()
    {
        $cacheDir = APP . 'tmp' . DS .'zend_cache';
        $frontendOptions = array(
            'lifetime' => 7200, // cache lifetime of 2 hours
            'automatic_serialization' => true);
        $backendOptions = array(
            'cache_dir' => $cacheDir); // Directory where to put the cache files
        return Zend_Cache::factory('Core', 'File', $frontendOptions, $backendOptions);
    }
    
    private function getOutput($url)
    {
        //http://us2.php.net/manual/en/function.file-get-contents.php#85008
        //ensure we return UTF-8 encoded xml doc
        if(!isset($xml)) $xml = file_get_contents($url);
        if(function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($xml, 'UTF-8', mb_detect_encoding($xml, 'UTF-8, ISO-8859-1', true));
        }
        else {
            return $xml;
        }
    }
    
    public function getFedSpendingSummary($state, $datatype="X", $detail = '-1')
    {
        $url = 'http://www.fedspending.org/fpds/fpds.php?datype='.$datatype.'&detail='.$detail.'&state='.$state;
        
        $fedSummaryKey = md5('fedSummary_'.$state);
        
        if(!$response = $this->cache()->load($fedSummaryKey)) {
            $response = $this->getOutput($url);
            $this->cache()->save($response, $fedSummaryKey, array(), (86400*3));
        }

        //supressing this - I know it's slow but I have zero
        //control over the content being passed
        $results = @simplexml_load_string($response);
        return $results;
    }

}
