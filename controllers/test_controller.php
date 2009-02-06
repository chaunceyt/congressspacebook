<?php
ini_set("display_errors", true);
class TestController extends AppController {

    var $name = 'Test';
    var $helpers = array('Html', 'Form');
    var $components = array('Capitolwords', 'Govtrack','Lucene', 'FollowTheMoneyState');
    var $uses = array('Lawmaker', 'LawmakerStats', 'Govtrack');
    
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index');
        parent::beforeFilter();
    }    
    
    function index($clear = false)
    {
        echo '<pre>';
        $this->autoRender=false;
        $start = getMicrotime(); 
        //state: "NY" AND district: 1
        //$top_members_introduced = $this->LawmakerStats->getTopLawmakersByIntroduced();
        //$top_members_cosponsored = $this->LawmakerStats->getTopLawmakersByCoSponsored();
        //$top_members_enacted = $this->LawmakerStats->getTopLawmakersByEnacted();
        //$top_members_novote = $this->LawmakerStats->getTopLawmakersByNoVote();

        //print_r($top_members_introduced);
        //$query = 'state: "NY" AND district: 1';
$dir = "/home/govtrack/data/us/111/cr/";
$filepattern = '*';
$sorting_list = array();
$filemtimes = array();

# Get file/dir listing, else error message
if ( ( $list = glob( $dir . $filepattern ) ) !== false ) {
    $i=0;
    $list = array_reverse($list);
    foreach ( $list AS $file ) {
        if($i < 1) {
            //echo $file;
            $filemtime = filemtime( $file );
            # Build array to be sorted with filename and filemtime
            $sorting_list[] = array('filename' => $file, 'filemtime' => $filemtime);
            # This is the list of filemtimes to sort by later
            $filemtimes[] = $filemtime;
            # Sort array based on $filemtimes
            # http://php.net/array-multisort Example #3
            if (array_multisort($filemtimes, SORT_DESC, $sorting_list) ) {
                    $response = file_get_contents($file);
                    $result = simplexml_load_string($response);
                    print_r($result);

                    foreach($result as $cr) {
                        echo $cr->attributes()->speaker;
                        $j=0;
                        foreach($cr->narrative as $narrative) {
                            echo 'Narrative'."\n";
                            echo '<p>'.$narrative.'</p>';
                            $j++;
                        }
                        $j=0;
                        foreach($cr->paragraph as $paragraph) {
                            echo 'Paragraph'."\n";
                            echo '<p>'.$paragraph.'</p>';
                            $j++;
                        }
                      foreach($cr->chair as $chair) {
                            echo $chair;
                      }
                    }
            }
        }
        $i++;
    }
}
else {
    echo 'Directory listing call failed!';
}

        
        
        $this->Lucene->load('govtrack');
        $query = '2009 ';
        $params = array('type' => 'govtrack', 'query' => $query);
        $q = $this->Lucene->query($params);
        print_r($q);

        //$state_offices = $this->FollowTheMoney->stateOffice('ny');
        //$sort = array('total_dollars');
        //$state_offices = $this->FollowTheMoneyState->stateOffice('ny', 2008, null, null, $sort);
        //office required
       // $state_offices_district = $this->FollowTheMoneyState->stateOfficeDistrict('ny', 2008, null, null, $sort);
        //$state_offices_breakdown = $this->FollowTheMoneyState->stateOfficeBreakdown('ny', 2008, null, null, $sort);
        //$state_offices_business = $this->FollowTheMoneyState->stateOfficeBusiness('ny', '2008', null, '1', null, $sort);
        //$state_offices_sectors = $this->FollowTheMoneyState->stateOfficeSectors('ny', '2008', 'SENATE', null, $sort); 
        //$state_offices_industries = $this->FollowTheMoneyState->stateOfficeIndustries('ny', '2008','SENATE'); 
        //$state_offices_contributors = $this->FollowTheMoneyState->stateTopContributors('ny', '2008', 'SENATE', null, $sort); 
        //print_r($state_offices);
        //print_r($state_offices_sectors);
        //print_r($state_offices_industries);
        //print_r($state_offices_contributors);
        //print_r($state_offices_district);
        //print_r($state_offices_breakdown);
        //print_r($state_offices_business);
        
        /*
        foreach($state_offices_business as $business) { 
            print_r($business);
            $state_offices_district = $this->FollowTheMoney->stateOfficeDistrict('ny', '2008', trim($business->attributes()->office),  null, $sort);
        print_r($state_offices_district);

        }
        */

        //$w = $this->Capitolwords->dailysum('iraq','2006');
        //$ww = $this->Capitolwords->wordofday();


        //$bills = $this->Govtrack->getBills('110');
        //print_r($bills);
        
        //print_r($ww);
        //print_r($w);
        //App::import('vendor','socialnet');
        //$socialnet = new Socialnet;
       

        //$username = $this->params['username'];
       // $username = 'jeckman';
       // $url = 'http://twitter.com/'.urlencode($username);
       // $response = file_get_contents($url);
       // preg_match("/\<ul class=\"about vcard entry-author\"\>(.*?)<\/ul>/is", $response, $author_vcard);
        //preg_match_all("/\<span class=\"vcard\">(.*?)<\/span>/is", $response, $friends_vcard);
        //$this->set('FriendsVcard', $friends_vcard[1]);
        //$this->set('AuthorVcard', $author_vcard[1]);
        echo '<pre>'; 
        //        echo $author_vcard[1];
        //print_r($friends_vcard[1]);

        //$page = $this->params['page'];
        //$TwitterSearchFrom = $this->Mashup->twitterSearch($username, 'from');
        //$TwitterSearchTo = $this->Mashup->twitterSearch($username, 'to');
        //$TwitterSearchRef = $this->Mashup->twitterSearch($username, 'refto');
        //$twitter_url = 'http://twitter.com/'.$username;
        //$url = 'http://vibe.com/';
        //$google_social_map = $this->Mashup->googleSocialGraph($url);
        //print_r($google_social_map);
        //$google_social_otherme = $this->Mashup->googleSocialGraphOtherMe($google_social_map);

        //print_r($google_social_otherme);

        /*
        $this->set('google_social', $google_social_map);
        $this->set('TwitterSearchFrom', $TwitterSearchFrom);
        $this->set('TwitterSearchTo', $TwitterSearchTo);
        $this->set('TwitterSearchRef', $TwitterSearchRef);
        $this->set('username', $username);
        
        $flickr['link'] = $socialnet->getAccountUrl('1', $username);
        $flickr['feed'] = $feeds = $socialnet->getInfoFromFeed($username, '1', $flickr['link'], $max_items = 20);
        */
       // echo '<pre>'; 
        //print_r($flickr);
       
        //$twitter['link'] = $socialnet->getAccountUrl('5', $username);
        //$twitter['feed'] = $feeds = $social->getInfoFromFeed($username, '1', $twitter['link'], $max_items = 10);

        //print_r($twitter);
        $time = round(getMicrotime() - $start, 1);
        echo $time;
    }
}
