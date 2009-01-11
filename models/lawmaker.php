<?php
class Lawmaker extends AppModel {

	public $name = 'Lawmaker';

    public function getProfileIdByName($profile_name)
    {
        $url = 'http://www.sourcewatch.org/index.php?title='.$profile_name;
        $sql = "select id from lawmakers where congresspedia_url = '".$url."'";
        $results = $this->query($sql);
        return $results['lawmakers']['id'];
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
        $sql = "select * from lawmakers as lawmaker where id IN ({$ids})";
        $results = $this->query($sql);
        return $results;
    }

    public function getCongressMembersByState($state, $limit = 14)
    {
        $sql = "select * from lawmakers as lawmaker where state = '".$state."' order by rand() limit ".$limit;
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
