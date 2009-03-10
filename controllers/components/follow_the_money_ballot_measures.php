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
class FollowTheMoneyBallotMeasureComponent extends Object
{
    protected $apikey = 'b699328758f1d96c705ea395c9ab46e5';

    public function committieesBusinesses($imsp_candidate_id, $page=null, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committieeses.industries.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }

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

        $url = 'http://api.followthemoney.org/committieeses.contributions.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }

    }

    public function committieesIndustries($imsp_candidate_id, $page=null, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committieeses.industries.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }

    public function committieesSectors($imsp_candidate_id, $page=null, $sort = array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committieeses.sectors.php?key='.$this->apikey.'&'.http_build_query($params);
        $response = file_get_contents($url);
        $results = @simplexml_load_string($response);
        if(!$results) {
            return false;
        }
        else {
            return $results;
        }
        
    }

    public function committieesTopContributors($imsp_candidate_id)
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/committieeses.industries.php?key='.$this->apikey.'&'.http_build_query($params);
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
