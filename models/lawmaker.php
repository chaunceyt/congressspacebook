<?php
class Lawmaker extends AppModel {

	public $name = 'Lawmaker';
    public $displayField = 'username';

    public function getProfileIdByName($profile_name)
    {
        $sql = "select id from lawmakers where username = '".$profile_name."'";
        $results = $this->query($sql);
        //since we're getting the id we must be viewing it. update views.
        $update_views_sql = "update lawmakers set views = views + 1  where id = '".$results[0]['lawmakers']['id']."'";
        $this->query($update_views_sql);
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
                
}
?>
