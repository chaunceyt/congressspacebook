<?php
//url: http://api.followthemoney.org/method.php?key= &params
class FollowTheMoneyStateComponent extends Object
{
    protected $apikey = 'b699328758f1d96c705ea395c9ab46e5';


    public function stateOffice($state=null, $year=null, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {            
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/states.offices.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateOfficeBreakdown($state=null, $year=null, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {            
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }
        $url = 'http://api.followthemoney.org/states.offices.breakdowns.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateOfficeBusiness($state=null, $year=null, $office = null, $office_breakdown = 1, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {            
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $params['office_breakdown'] = $office_breakdown;

        $url = 'http://api.followthemoney.org/states.offices.businesses.php?key='.$this->apikey.'&'.http_build_query($params);
        echo $url;
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateOfficeDistrict($state, $year, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {            
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode($sort);
        }
        $url = 'http://api.followthemoney.org/states.offices.districts.php?key='.$this->apikey.'&'.http_build_query($params);
        echo $url;
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateOfficeIndustries($state, $year, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode($sort);
        }
        $url = 'http://api.followthemoney.org/states.offices.industries.php?key='.$this->apikey.'&'.http_build_query($params);
        echo $url;

        //$url = 'http://api.followthemoney.org/states.offices.industries.php?key='.$this->apikey;
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateOfficeSectors($state, $year, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode($sort);
        }
        $url = 'http://api.followthemoney.org/states.offices.sectors.php?key='.$this->apikey.'&'.http_build_query($params);
        echo $url;

        //$url = 'http://api.followthemoney.org/states.offices.sectors.php?key='.$this->apikey;
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }

    public function stateTopContributors($state, $year, $office = null, $page = null, $sort = array())
    {
        if($state) {
            $params['state'] = $state;
        }

        if($year) {
            $params['year'] = $year;
        }

        if($office) {
            $params['office'] = $office;
        }

        if($page) {
            $params['page'] = $page;
        }
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode($sort);
        }
        $url = 'http://api.followthemoney.org/states.offices.districts.php?key='.$this->apikey.'&'.http_build_query($params);
        echo $url;
        
        //$url = 'http://api.followthemoney.org/states.top_contributors.php?key='.$this->apikey;
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
    }


}


