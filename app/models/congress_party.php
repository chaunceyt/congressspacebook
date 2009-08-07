<?php
class CongressParty extends AppModel {

	var $name = 'CongressParty';

    public function getEventInvites($member)
    {
        $member_str = str_replace('_',' ',$member);
        $sql = "select count(*) as total from  congress_parties WHERE MATCH(Beneficiary, Other_Members) AGAINST ('".$member_str."')";
        $results = $this->query($sql);
        if(isset($result[0]['total'])) {
            return $results[0]['total'];
        }
        else {
            return false;
        }
    }

}
?>
