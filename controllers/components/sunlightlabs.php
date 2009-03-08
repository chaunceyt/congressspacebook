<?php
//sunlight labs api
/*
* SunlightLabs API wrapper
*
*
*
*/
class SunlightlabsComponent extends Object
{
    private $url = 'http://services.sunlightlabs.com/api/';
    private $apikey = 'apikey=8048fc5ad9786c48965f38a7882a7de8';

    /* District Methods */
    public function getDistrictFromLatLong($latitude, $longitude, $type='json')
    {
        //add support for xml
        $method = 'districts.getDistrictFromLatLong.'.$type.'?';
        $params = $this->apikey.'&latitude='.$latitude.'&longitude='.$longitude; 
        $resource_url = $this->url.$method.$params;
        //echo $resource_url;
        $data = @file_get_contents($resource_url);
        //echo $data;
        if($data) {
            switch($type) {
                case 'json' :
                    $json = new Services_JSON();
                    $results = $json->decode($data);
                    break;
                case 'xml' :
                    $results = @simplexml_load_string($data);
                    break;
                default :
                    //throw exception - we shouldn't be here.
            }
            return $results;
        }
        else {
            return false;
        }
    }//end method

    public function getZipsFromDistrict($state, $district, $type = 'json')
    {
        $method = 'districts.getZipsFromDistrict.json?state='.$state.'&district='.$district.'&'. $this->apikey;
        $resource_url = $this->url.$method;
        $data = @file_get_contents($resource_url);
        if($data) {
            switch($type) {
                case 'json' :
                    $json = new Services_JSON();
                    $results = $json->decode($data);
                    break;
                case 'xml' :
                    $results = @simplexml_load_string($data);
                    break;
                default :
                    //throw exception
            }
            return $results;
        }
        else {
            return false;
        }
    }//end method

    public function getDistrictsFromZip($zip, $type = 'json')
    {
        $method = 'districts.getDistrictsFromZip.'.$type.'?zip='.$zipi.'&'. $this->apikey;
        $resource_url = $this->url.$method;
        $data = @file_get_contents($resource_url);
        if($data) {
            switch($type) {
                case 'json' :
                    $json = new Services_JSON();
                    $results = $json->decode($data);
                    break;
                case 'xml' :
                    $results = @simplexml_load_string($data);
                    break;
                default :
                    //throw exception
            }
            return $results;
        }
        else {
            return false;
        }

    }// end method

}
