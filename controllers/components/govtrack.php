<?php
//profile page data
//url: congress: http://www.govtrack.us/congress/person_api.xpd?id=300058&session=109 id + session
//url: bills http://www.govtrack.us/data/us/110/bills.index.xml 110 = session
//url: http://www.govtrack.us/perl/district-lookup.cgi?zipcode=11803 district by zipcode
//url: http://www.govtrack.us/users/events-rss2.xpd?monitors=p:300022 monitors
//http://www.govtrack.us/embed/googlemaps_example.html
class GovtrackComponent extends Object
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
    
    public function getPerson($id, $session) 
    {
        $url = 'http://www.govtrack.us/congress/person_api.xpd?id='.$id.'&session='.$session;

        $govtrack_getPersonKey = md5('govtrack_getPersonKey_'.$id.$session);

        //if(!$response = $this->cache()->load($govtrack_getPersonKey)) {
            $response = $this->getOutput($url);
          //  $this->cache()->save($response, $govtrack_getPersonKey, array(), (86400*3));
        //}

        $results = simplexml_load_string($response);
        return $results;
    }

    public function getBills($session) 
    {
        $url = 'http://www.govtrack.us/data/us/'.$session.'/bills.index.xml';

        $govtrack_getBillsKey = md5('govtrack_getBillsKey_'.$session);

        //if(!$response = $this->cache()->load($govtrack_getBillsKey)) {
            $response = $this->getOutput($url);
          //  $this->cache()->save($response, $govtrack_getBillsKey, array(), (86400*3));
        //}

        $results = simplexml_load_string($response);
        return $results;
        
    }

    public function getDistrictByZip($zipcode) 
    {
        $url = 'http://www.govtrack.us/perl/district-lookup.cgi?zipcode='.$zipcode;

        $govtrack_getDistrictByZipKey = md5('govtrack_getDistrictByZipKey_'.$session);

        //if(!$response = $this->cache()->load($govtrack_getDistrictByZipKey)) {
            $response = $this->getOutput($url);
          //  $this->cache()->save($response, $govtrack_getDistrictByZipKey, array(), (86400*3));
        //}

        $results = simplexml_load_string($response);
        return $results;
        
    }


}
