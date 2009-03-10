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
class Govtrack extends AppModel 
{

    var $name = 'Govtrack';
    var $useTable = false;

    private $govtrack_path = '/home/govtrack/data/us/';

    public function lucene_populate($search)
    {
        $path = '/home/govtrack/data/us/111/bills.index.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $data = simplexml_load_string($response);
        }
        else {
            trigger_error('Could not locate votes.all.index.xml', E_USER_ERROR);
        }


        $this->search = $search;
        $this->search->setMaxBufferedDocs(500);
        $this->search->setMergeFactor(2000);
        foreach($data as $row) {
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Text('type', $row->attributes()->type));
            $doc->addField(Zend_Search_Lucene_Field::Text('number', $row->attributes()->number));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('title', $row->attributes()->title));
            $doc->addField(Zend_Search_Lucene_Field::Text('status', $row->attributes()->status));
            $this->search->addDocument($doc);
        }
       return $doc; 
    }

    public function getCommittiees()
    {
    }

    public function getCommittieeSchedule($session = 111)
    {
        $path = $this->govtrack_path.$session.'/committieeschedule.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response);
            return $result;
        }
        else {
            trigger_error('Could not locate committieeschedule.xml', E_USER_ERROR);
        }
    }

    public function getNextSession($session = 111)
    {
        $senate = file($this->govtrack_path.$session.'/congress.nextsession.senate');
        $house = file($this->govtrack_path.$session.'/congress.nextsession.house');
        $nextsession = array('senate'=> $senate, 'house'=> $house);
        return $nextsession;
    }

    public function getBillIndex($session = 111)
    {
        $path = $this->govtrack_path.$session.'/bill.index.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response);
            return $result;
        }
        else {
            trigger_error('Could not locate bill.index.xml', E_USER_ERROR);
        }
        
    }

    public function getVotes($session = 111)
    {
        $path = $this->govtrack_path.$session.'/votes.all.index.xml';
        if(file_exists($path)) {
            $response = file_get_contents($path);
            $result = simplexml_load_string($response);
            return $result;
        }
        else {
            trigger_error('Could not locate votes.all.index.xml', E_USER_ERROR);
        }

    }

}

