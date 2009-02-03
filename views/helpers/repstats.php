<?php
class RepstatsHelper extends Helper {

    var $helpers = array('Time');
    public function renderCoSponsored($data, $total = 100)
    {
        echo '<table>'."\n";
        echo '<tr><td>Congress Person</td><td>Number of CoSponsored</td><td>Last Time Sponsored Bill</td></tr>';
        $i=0;
        foreach($data as $rep) {
            //print_r($rep);
            if($i < $total) {
                echo '<tr><td>'.$rep->attributes()->Name .'</td><td>'.$rep->attributes()->NumCosponsor.'</td><td>'.$this->Time->niceShort($rep->attributes()->LastSponsoredDate).'</td></tr>';
            }
            $i++;
        }
        echo '</table>';
    }
    public function renderEnacted($data, $total = 100)
    {
        //print_r($data);
        echo '<table>'."\n";
        echo '<tr><td>Congress Person</td><td>Num Sponsored</td><td>Number Enacted</td><td>Last Time Sponsored Bill</td></tr>';
        $i=0;
        foreach($data as $rep) {
            //print_r($rep);
            if($i < $total) {
                echo '<tr><td>'.$rep->attributes()->Name .'</td><td>'.$rep->attributes()->NumSponsor.'</td><td>'.$rep->attributes()->SponsorEnacted.'</td><td>'.$this->Time->niceShort($rep->attributes()->LastSponsoredDate).'</td></tr>';
            }
            $i++;
        }
        echo '</table>';
    }
    public function renderNoVote($data, $total = 100)
    {
        echo '<table>'."\n";
        echo '<tr><td>Congress Name</td><td>Number of Votes</td><td>Number of No Votes</td><td>Last time Voted</td></tr>';
        $i=0;
        foreach($data as $rep) {
            //print_r($rep);
            if($i < $total) {
                echo '<tr><td>'.$rep->attributes()->Name .'</td><td>'.$rep->attributes()->NumVote.'</td><td>'.$rep->attributes()->NoVote.'</td><td>'.$this->Time->niceShort($rep->attributes()->LastVoteDate).'</td></tr>';
            }
            $i++;
        }
        echo '</table>';
    }
    public function renderIntroduced($data, $total=100)
    {
        echo '<table>'."\n";
        echo '<tr><td>Congress Person</td><td>Num Sponsored</td><td>Num Introduced</td><td>Last Time Sponsored Bill</td></tr>';
        $i=0;
        foreach($data as $rep) {
            //print_r($rep);
            if($i < $total) {
                echo '<tr><td>'.$rep->attributes()->Name .'</td><td>'.$rep->attributes()->NumSponsor.'</td><td>'.$rep->attributes()->SponsorIntroduced.'</td><td>'.$this->Time->niceShort($rep->attributes()->LastSponsoredDate).'</td></tr>';
            }
            $i++;
        }
        echo '</table>';
    }
    public function renderVerbosity($data)
    {
        echo '<table>'."\n";
        foreach($data as $rep) {
            //echo '<pre>';
            //print_r($rep);
            echo '<tr><td>'.$rep->attributes()->Name .'</td><td>'.$rep->attributes()->Speeches.'</td><td>'.$rep->attributes()->WordsPerSpeech.'</td></tr>';
        }
        echo '</table>';
    }
}

