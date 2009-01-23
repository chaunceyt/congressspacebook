<?php
class FollowTheMoneyNameSearchComponent extends Object
{
    protected $apikey = 'b699328758f1d96c705ea395c9ab46e5';

    public function contributorsNameSearch($imsp_candidate_id,
                                            $contributor_name=null,
                                            $contributor_city=null,
                                            $contributor_zipcode=null,
                                            $imsp_sector_code=null,
                                            $imsp_industry_code=null,
                                            $election_state=null,
                                            $election_year=null,
                                            $search_type=null,
                                            $page=null,
                                            $sort= array())
    {
        if(is_array($sort) && sizeof($sort) > 0) {
            $params['sort'] = implode(',', $sort);
        }

        $url = 'http://api.followthemoney.org/contributors.name_search.php?key='.$this->apikey.'&'.http_build_query($params);
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

