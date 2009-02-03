<?php
//introduced, cosponsored, enacted, novote
class LawmakerStats extends AppModel {

    var $name = 'LawmakerStats';
    var $useTable = false;

    public function getTopLawmakersByIntroduced($_session = '110')
    {
        $path = '/home/govtrack/data/us/'.$_session.'/repstats/introduced.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response); 
            return $result;
        }
        else {
            trigger_error('Could not locate repstats/introduced.xml', E_USER_ERROR);
        }
    }
    
    public function getTopLawmakersByCoSponsored($_session = '110')
    {
        $path = '/home/govtrack/data/us/'.$_session.'/repstats/cosponsor.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response); 
            return $result;
        }
        else {
            trigger_error('Could not locate repstats/cosponsored.xml', E_USER_ERROR);
        }
    }
    public function getTopLawmakersByEnacted($_session = '110')
    {
        $path = '/home/govtrack/data/us/'.$_session.'/repstats/enacted.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response); 
            return $result;
        }
        else {
            trigger_error('Could not locate repstats/enacted.xml', E_USER_ERROR);
        }
    }
    public function getTopLawmakersByNoVote($_session = '110')
    {
        $path = '/home/govtrack/data/us/'.$_session.'/repstats/novote.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response); 
            return $result;
        }
        else {
            trigger_error('Could not locate repstats/novote.xml', E_USER_ERROR);
        }
    }
    public function getTopLawmakersByVerbosity($_session = '110')
    {
        $path = '/home/govtrack/data/us/'.$_session.'/repstats/verbosity.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response); 
            return $result;
        }
        else {
            trigger_error('Could not locate repstats/verbosity.xml', E_USER_ERROR);
        }
    }
        
}

