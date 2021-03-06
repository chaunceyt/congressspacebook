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
//url: http://api.followthemoney.org/method.php?key= &params
//FIXME: complete methods - 03122009 
class FollowTheMoneyPartyPacsComponent extends Object
{
    protected $apikey = 'b699328758f1d96c705ea395c9ab46e5';

    /**
     * committeesBusinesses 
     * 
     * @param mixed $imsp_candidate_id 
     * @param mixed $page 
     * @param array $sort 
     * @access public
     * @return void
     */
    public function committeesBusinesses($imsp_candidate_id, $page, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.contributions.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }

    /**
     * committeesIndustries 
     * 
     * @param mixed $imsp_candidate_id 
     * @param mixed $page 
     * @param array $sort 
     * @access public
     * @return void
     */
    public function committeesIndustries($imsp_candidate_id, $page=null, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.industries.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }
    
    /**
     *  
     */
    public function committeesList($state=null, 
                                    $year=null, 
                                    $office=null, 
                                    $district=null, 
                                    $party=null, 
                                    $candidate_status=null,
                                    $candidate_name=null,
                                    $page=null, 
                                    $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.list.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }

    /**
     * committeesSectors 
     * 
     * @param mixed $imsp_candidate_id 
     * @param mixed $page 
     * @param array $sort 
     * @access public
     * @return void
     */
    public function committeesSectors($imsp_candidate_id, $page, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.sectors.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }
    
    //this is really ugly...
    /**
     * committeesTopContributors 
     * 
     * @param mixed $imsp_candidate_id 
     * @param mixed $msp_industry_code 
     * @access public
     * @return void
     */
    public function committeesTopContributors($imsp_candidate_id, $msp_industry_code)
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.top_contributors.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }
    
    //this is really ugly...
    public function committeesContributions($imsp_candidate_id, 
                                            $imsp_sector_code=null, 
                                            $imsp_industry_code=null, 
                                            $contributor_name=null,
                                            $contributor_city=null,
                                            $contributor_zipcode=null,
                                            $contribution_date_range=null,
                                            $contribution_amount_range=null,
                                            $page=null,
                                            $sort= array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committees.contributions.php?key='.$this->apikey.'&'.http_build_query($params);
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
