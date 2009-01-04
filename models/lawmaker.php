<?php
class Lawmaker extends AppModel {

	var $name = 'Lawmaker';

    function stateTagCloud()
    {
        $sql = 'select state, count(*) as lawmakers from lawmakers group by state';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['state']] = $res[0]['lawmakers'];
        }
        return $tags;
    }

    function partyTagCloud()
    {
        $sql = 'select party, count(*) as lawmakers from lawmakers group by party';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['party']] = $res[0]['lawmakers'];
        }
        return $tags;
    }

    function genderTagCloud()
    {
        $sql = 'select gender, count(*) as lawmakers from lawmakers group by gender';
        $results = $this->query($sql);
        foreach($results as $res) {
            $tags[$res['lawmakers']['gender']] = $res[0]['lawmakers'];
        }
        return $tags;
    }
}
?>
