<?php
/**
 * File used as application model
 *
 * Contains methods for application model
 *
 * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */

/**
 * Model class 
 *
  * @author Chauncey Thorn <chaunceyt@gmail.com>
 * @version 1.0
 * @package CongressSpacebook.com
 */
class Lawmaker extends AppModel {

	public $name = 'Lawmaker';
    public $displayField = 'username';
    protected $search = null;


    //executed from Lucene component
    //lucene component callback like method - no need to execute this outside
    //component.
    public function lucene_populate($search)
    {
        $data = $this->query("SELECT * FROM lawmakers as Lawmaker");
        
        $this->search = $search; 
        $this->search->setMaxBufferedDocs(500);
        $this->search->setMergeFactor(2000);
        
        foreach($data as $row) {
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('id', $row['Lawmaker']['id']));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('username', $row['Lawmaker']['username']));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('title', $row['Lawmaker']['title']));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('firstname', $row['Lawmaker']['firstname']));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('lastname', $row['Lawmaker']['lastname']));
            $doc->addField(Zend_Search_Lucene_Field::Text('middlename', $row['Lawmaker']['middlename']));
            $doc->addField(Zend_Search_Lucene_Field::Text('name_suffix', $row['Lawmaker']['name_suffix']));
            $doc->addField(Zend_Search_Lucene_Field::Text('nickname', $row['Lawmaker']['nickname']));
            $doc->addField(Zend_Search_Lucene_Field::Text('party', $row['Lawmaker']['party']));
            $doc->addField(Zend_Search_Lucene_Field::Text('state', $row['Lawmaker']['state']));
            $doc->addField(Zend_Search_Lucene_Field::Text('district', $row['Lawmaker']['district']));
            $doc->addField(Zend_Search_Lucene_Field::Text('in_office', $row['Lawmaker']['in_office']));
            $doc->addField(Zend_Search_Lucene_Field::Text('gender', $row['Lawmaker']['gender']));
            $doc->addField(Zend_Search_Lucene_Field::Text('phone', $row['Lawmaker']['phone']));
            $doc->addField(Zend_Search_Lucene_Field::Text('fax', $row['Lawmaker']['fax']));
            $doc->addField(Zend_Search_Lucene_Field::Text('website', $row['Lawmaker']['website']));
            $doc->addField(Zend_Search_Lucene_Field::Text('webform', $row['Lawmaker']['webform']));
            $doc->addField(Zend_Search_Lucene_Field::Text('email', $row['Lawmaker']['email']));
            $doc->addField(Zend_Search_Lucene_Field::Text('congress_office', $row['Lawmaker']['congress_office']));
            $doc->addField(Zend_Search_Lucene_Field::Text('bioguide_id', $row['Lawmaker']['bioguide_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('votesmart_id', $row['Lawmaker']['votesmart_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('fec_id', $row['Lawmaker']['fec_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('govtrack_id', $row['Lawmaker']['govtrack_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('crp_id', $row['Lawmaker']['crp_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('eventful_id', $row['Lawmaker']['eventful_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('sunlight_old_id', $row['Lawmaker']['sunlight_old_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('twitter_id', $row['Lawmaker']['twitter_id']));
            $doc->addField(Zend_Search_Lucene_Field::Text('congresspedia_url', $row['Lawmaker']['congresspedia_url']));
            $doc->addField(Zend_Search_Lucene_Field::Text('youtube_url', $row['Lawmaker']['youtube_url']));
            $this->search->addDocument($doc);
        }
        return $doc;

    }

    public function getYoutubeVideos($username)
    {
        //$path = 'http://gdata.youtube.com/feeds/base/users/househub/uploads?alt=rss&amp;v=2&amp;client=ytapi-youtube-profile';
        $path = 'http://gdata.youtube.com/feeds/base/users/'.$username.'/uploads?alt=rss&amp;v=2&amp;client=ytapi-youtube-profile';
        $response = file_get_contents($path);
        $results = simplexml_load_string($response);
        return $results;
    }
    //get the xml for bill
    public function getBill($id)
    {
        list($_session, $type, $number) = explode('-', $id);
        $path = '/home/govtrack/data/us/'.$_session.'/bills/'.$type.$number.'.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response);
            return $result;
        }
        else {
            trigger_error('Could not locate bill {$id} text', E_USER_ERROR); 
        }
    }

    //get the bill full text
    public function getBillText($id)
    {
        list($_session, $type, $number) = explode('-', $id);
        $path = '/home/govtrack/data/us/bills.text/'.$_session.'/'.$type.'/'.$type.$number.'.txt';
        if(file_exists($path)) {
            $result = file_get_contents($path);
            return $result;
        }
        else {
            trigger_error('Could not locate bill {$id} text', E_USER_ERROR); 
        }
    }

    public function getProfileIdByName($profile_name)
    {
        $sql = "select id from lawmakers where username = '".$profile_name."'";
        $results = $this->query($sql);
        //commented out - prevent easy update of lawmakers
        //since we're getting the id we must be viewing it. update views.
        //$update_views_sql = "update lawmakers set views = views + 1  where id = '".$results[0]['lawmakers']['id']."'";
        //$this->query($update_views_sql);
        return $results[0]['lawmakers']['id'];
    }
    public function stateTagCloud()
    {
        $sql = 'select state, count(*) as lawmakers from lawmakers group by state';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['state']] = $res[0]['lawmakers'];
        }
        return $tags;
    }

    public function partyTagCloud()
    {
        $sql = 'select party, count(*) as lawmakers from lawmakers group by party';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['party']] = $res[0]['lawmakers'];
        }
        return $tags;
    }

    public function genderTagCloud()
    {
        $sql = 'select gender, count(*) as lawmakers from lawmakers group by gender';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['gender']] = $res[0]['lawmakers'];
        }
        return $tags;
    }

    public function getCurrentCongress($ids ="'168','391','239','101','43','76','416','157','331','283','291','392','354','332'")
    {
        $sql = "select * from lawmakers as lawmaker where id IN ({$ids}) order by firstname asc, lastname asc";
        $results = $this->query($sql);
        return $results;
    }

    public function getCongressMembersByState($state, $district=null, $limit = 19)
    {
        //removing rand() see if that prevents the broken page
        if($district) {
            $sql = "select * from lawmakers as lawmaker where state = '".$state."' and district = '".$district."' order by district limit ".$limit;
        }
        else {
            $sql = "select * from lawmakers as lawmaker where state = '".$state."' order by district limit ".$limit;
        }
        $results = $this->query($sql);
        return $results;
    }

    public function getProfileTopFriends($state, $party, $member, $limit=9) 
    {
        $sql = "select * from lawmakers as lawmaker where state = '".$state."' 
                and party = '".$party."' 
                and id != '".$member."'
                limit ".$limit;
        $results = $this->query($sql);
        return $results;
    }

    public function getProfileFriends($state, $party, $member, $limit=9) 
    {
        $sql = "select * from lawmakers as lawmaker where party = '".$party."' 
                and id != '".$member."'
                and state NOT IN ( '".$state."')
                limit ".$limit;
        $results = $this->query($sql);
        return $results;
    }
    
    public function getProfileByGovtrackId($govtrack_id) 
    {
        $sql = "select * from lawmakers as Lawmaker where govtrack_id  = '".$govtrack_id."'";
        $results = $this->query($sql);
        return $results;
    }

    public function getPresident()
    {
        $sql = "select * from lawmakers as Lawmaker where firstname = 'Barack' AND lastname = 'Obama'";
        $results = $this->query($sql);
        return $results;
    }

    public function getDistrictsByState($state)
    {
        $sql = "select state, district from lawmakers as Lawmaker where state = '".$state."' AND district NOT IN ('Senior Seat', 'Junior Seat')
            GROUP BY district";
        $results = $this->query($sql);
        return $results;
    }
                
}
?>
