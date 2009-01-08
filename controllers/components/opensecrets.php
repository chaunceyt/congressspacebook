<?php
//require APP . 'vendors' . DS .'JSON.php';
class OpensecretsComponent extends Object
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

    //Summary profile from a members personal financial disclosure statement.
    //http://www.opensecrets.org/api/?method=memPFDprofile&year=2007&output=xml&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      year:   (required) Get data for specified year
      output:     XML
    */
    public function memPFDprofile($cid, $year, $output="json")
    {
        $url = 'http://www.opensecrets.org/api/?method=memPFDprofile&cid='.$cid.'year='.$year.'&output='.$output.'&apikey='.$this->apikey;
        $response = $this->getOutput($url);
        //print_r($response); 
    }

    //Returns data from a member's privately funded travel.
    //http://www.opensecrets.org/api/?method=memTravelTrips&cid=N00000019&year=2006&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      year:   (required) Get data for specified year
      output:     (optional) Output format, either json, xml, or doc; default is xml
    */
    public function memTravelTrips()
    {
    }

    //Returns summary contribution information on a candidate for indicated cycle.
    //http://www.opensecrets.org/api/?method=candSummary&cid=N00000019&cycle=2006&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      cycle:  (required) Election cycle; any one of the following values [1990, 1992, 1994, 1996, 1998, 2000, 2002, 2004, 2006]
      output:     (optional) Output format, either json, xml, or doc; default is xml
    */
    public function candSummary($cid, $year, $output="json")
    {
        $url = 'http://www.opensecrets.org/api/?method=candSummary&cid='.$cid.'&year='.$year.'&output='.$output.'&apikey='.$this->apikey;
        
        $candSummaryKey = md5('candSummary_'.$cid.'_'.$year);
        
        if(!$response = $this->cache()->load($candSummaryKey)) {
            $response = $this->getOutput($url);
            $this->cache()->save($response, $candSummaryKey, array(), (86400*3));
        }

        if($output == 'xml') {
            $results = simplexml_load_string($response);
        }
        else {
            $getjson = new Services_JSON();
            $results = $getjson->decode($response);
        }
        return $results;
    }

    //Returns the top contributors to a candidate/member for indicated period.
    //http://www.opensecrets.org/api/?method=candContrib&cid=N00000019&cycle=2006&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      cycle:  (required) Can be left blank to get data for most current current cycle.
      output:     (optional) Output format, either json, xml, or doc; default is xml
    */
    public function candContrib($cid, $year, $output="json")
    {
        $url = 'http://www.opensecrets.org/api/?method=candContrib&cid='.$cid.'&year='.$year.'&output='.$output.'&apikey='.$this->apikey;

        $candContribKey = md5('candContrib_'.$cid.'_'.$year);

        if(!$response = $this->cache()->load($candContribKey)) {
            $response = $this->getOutput($url);
            $this->cache()->save($response, $candContribKey, array(), (86400*3));
        }
        
        if($output == 'xml') {
            $results = simplexml_load_string($response);
        }
        else {
            $getjson = new Services_JSON();
            $results = $getjson->decode($response);
        }
        return $results;
    }
    //Returns the top industries to a candidate/member for indicated period.
    //http://www.opensecrets.org/api/?method=candIndustry&cid=N00000019&cycle=2006&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      cycle:  (required) Election cycle; any one of the following values [1990, 1992, 1994, 1996, 1998, 2000, 2002, 2004, 2006]
      output:     (optional) Output format, either json, xml, or doc; default is xml
    */
    public function candIndustry($cid, $year, $output="json")
    {
        $url = 'http://www.opensecrets.org/api/?method=candIndustry&cid='.$cid.'&year='.$year.'&output='.$output.'&apikey='.$this->apikey;

        $candIndustryKey = md5('candIndustry_'.$cid.'_'.$year);
        if(!$response = $this->cache()->load($candIndustryKey)) {
            $response = $this->getOutput($url);
            $this->cache()->save($response, $candIndustryKey, array(), (86400*3));
        }
        if($output == 'xml') {
            $results = simplexml_load_string($response);
        }
        else {
            $getjson = new Services_JSON();
            $results = $getjson->decode($response);
        }
        return $results;
    }

    //Returns the top sectors to a candidate/member for indicated period.
    //http://www.opensecrets.org/api/?method=candSector&cid=N00000019&cycle=2006&apikey=__apikey__
    /*
      apikey:     
      cid:    (required) CRP CandidateID
      cycle:  (required) Election cycle; any one of the following values [1990, 1992, 1994, 1996, 1998, 2000, 2002, 2004, 2006]
      output:     (optional) Output format, either json, xml, or doc; default is xml
    */
    public function candSector($cid, $year, $output="json")
    {
        $url = 'http://www.opensecrets.org/api/?method=candSector&cid='.$cid.'&year='.$year.'&output='.$output.'&apikey='.$this->apikey;

        $candSectorKey = md5('candSector_'.$cid.'_'.$year);
        if(!$response = $this->cache()->load($candSectorKey)) {
            $response = $this->getOutput($url);
            $this->cache()->save($response, $candSectorKey, array(), (86400*3));
        }
        if($output == 'xml') {
            $results = simplexml_load_string($response);
        }
        else {
            $getjson = new Services_JSON();
            $results = $getjson->decode($response);
        }
        return $results;
    }
}
