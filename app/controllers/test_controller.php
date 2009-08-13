<?php
ini_set("display_errors", true);
//Configure::write('debug', 1);
class TestController extends AppController {

    var $name = 'Test';
    var $helpers = array('Html', 'Form', 'Usafedspending');
    var $components = array('Capitolwords', 'Govtrack','Lucene', 'FollowTheMoneyState', 'Sunlightlabs');
    var $uses = array('Lawmaker', 'LawmakerStats', 'Govtrack');
    var $cookie_expires = null;
    
    function beforeFilter()
    {
        $this->Auth->allowedActions = array('index','zipcode', 'shell');
        parent::beforeFilter();
    }    

    function zipcode()
    {
        //$this->autoRender=false;
        /*
        if(isset($this->params['zipcode'])) {
            $zipcode = $this->params['zipcode'];
        }
        else {
            $zipcode = $this->params['form']['zipcode'];
        }
        */
        /*
        $zipcode = '10009';
        $districts = $this->Sunlightlabs->getDistrictsFromZip($zipcode);
        print_r($districts); 
        if(sizeof($districts->response->districts) > 1) {
            $total_dist = sizeof($districts->response->districts);
            for($i=0; $i < $total_dist; $i++) {
                $dist = $districts->response->districts[$i]->district->state.'-'.$districts->response->districts[$i]->district->number;
                $zip4dists[$dist][] = $this->Sunlightlabs->getZipsFromDistrict($districts->response->districts[$i]->district->state, $districts->response->districts[$i]->district->number);                
            }
            echo '<pre>';
            print_r($zip4dists);
            echo '</pre>';
            foreach($zip4dists as $state_dist => $data) {
                if(in_array($zipcode, $data[0]->response->zips)) {
                    $mydistrict =  $state_dist;
                }
            }
        }
        else {
            $mydistrict = $dist = $districts->response->districts[0]->district->state.'-'.$districts->response->districts[0]->district->number;
        }//end if


        if(isset($this->params['form']['myzip'])) {
                $this->Cookie->write('district', $mydistrict, $this->cookie_encrypted, $this->cookie_expires);
                $this->Cookie->write('zipcode', $zipcode, $this->cookie_encrypted, $this->cookie_expires);
                $this->Session->write('district', null);
                $this->Session->write('zipcode', null);
        }
        else {
            $this->Session->write('district', $mydistrict);
            $this->Session->write('zipcode', $zipcode);
        }
        $this->redirect('/mydistrict/');
        */
        $this->CongressBiography =& ClassRegistry::init('CongressBiography');
        $biography = $this->CongressBiography->findById('F000444');
        //print_r($biography);
        $this->set('biography',$biography);
        
    }


    function index($clear = false)
    {
        //echo '<pre>';
        //$this->autoRender=false;
        $start = getMicrotime(); 
        $nextsession = $this->Govtrack->getNextSession();

        echo 'Senate: ' . date('m-d-Y', (int) $nextsession['senate'][0]);
        echo 'House: ' . date('m-d-Y', (int) $nextsession['house'][0]);
        
        //state: "NY" AND district: 1
        //$top_members_introduced = $this->LawmakerStats->getTopLawmakersByIntroduced();
        //$top_members_cosponsored = $this->LawmakerStats->getTopLawmakersByCoSponsored();
        //$top_members_enacted = $this->LawmakerStats->getTopLawmakersByEnacted();
        //$top_members_novote = $this->LawmakerStats->getTopLawmakersByNoVote();

        //print_r($top_members_introduced);
        //$query = 'state: "NY" AND district: 1';
/*        
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
*/  
        //echo '<pre>';    
        //$response = file_get_contents('http://www.usaspending.gov/fpds/fpds.php?datype=X&detail=-1&&stateCode=NY&fiscal_year=2009');
        //$response = file_get_contents('http://www.usaspending.gov/fpds/fpds.php?datype=X&detail=-1&placeOfPerformanceZIPCode=10009&fiscal_year=all');
        $response = file_get_contents('http://www.usaspending.gov/fpds/fpds.php?datype=X&detail=-1&pop_cd=NY12&fiscal_year=2009');
        $result = simplexml_load_string($response);
        print_r($result);
        //echo '</pre>'; 
        /*
$search='';
echo "<p><strong>Contracts with place of performance in ", $search," </strong><p>\n";
$totals = $result->data->record->totals;
$total_amt = $totals->total_ObligatedAmount;

echo '<p>Total Obligated: $', number_format($total_amt) ,"<br>\n";
echo 'Number of Contractors: ', $totals->number_of_contractors,"<br>\n";
echo 'Number of Contracts: ', $totals->number_of_transactions,"<br></p>\n";

$districts = $result->data->record->top_known_congressional_districts;
foreach($districts->attributes() as $name=>$attr) {
    $res[$name]=$attr;

}
echo "<h3>Districts where work is performed </h3>\n";

foreach($districts->children() as $district)
{
    foreach($district->attributes() as $name=>$attr)
    {
        $res[$name]=$attr;

    }
    echo $district. '&nbsp;';
    echo "$",  number_format($res["total_obligatedAmount"]),  "\n";
}

$agencies = $result->data->record->top_contracting_agencies;

echo "<h3>Top Contracting Agencies</h3>\n";

foreach($agencies->children() as $agency)
{
    foreach($agency->attributes() as $name=>$attr)
    {
        $res[$name]=$attr;

    }
    echo  $agency, ":&nbsp;";
    echo "$",  number_format($res["total_obligatedAmount"]),  "\n";


}

        
$level_of_competition = $result->data->record->extent_of_competition;
$full_and_open = $level_of_competition->full_and_open_competition;
settype($full_and_open, "float");
$percent = $full_and_open / $total_amt * 100;
$comp_chart_percent = array(number_format($percent, 0));

$one_bid = $level_of_competition->full_and_open_competition_but_only_one_bid;
settype($one_bid, "float");
$percent = $one_bid / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);

$level_of_competition_after_exclusion = $level_of_competition->competition_after_exclusion_of_sources;
settype($level_of_competition_after_exclusion, "float");
$percent = $level_of_competition_after_exclusion / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);

$not_available_for_comp = $level_of_competition->not_available_for_competition;
settype($not_available_for_comp, "float");
$percent = $not_available_for_comp / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
        
$not_competed = $level_of_competition->not_competed;
settype($not_competed, "float");
$percent = $not_competed / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);

$competition_unknown = $level_of_competition->unknown;
settype($competition_unknown, "float");
$percent = $level_of_competition->unknown / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);



echo "<p>\n";
echo '<img src="http://chart.apis.google.com/chart?cht=p&chdl=';
echo 'Open+to+everyone+-+$'.number_format($level_of_competition->full_and_open_competition).'|';
echo 'Open+to+everyone,+but+only+one+offer+was+received+-+$'.number_format($level_of_competition->full_and_open_competition_but_only_one_bid).'|';
echo 'Competition+within+a+limited+pool+-+$'.number_format($level_of_competition_after_exclusion).'|';
echo 'Available+only+for+groups+such+as+disabled+persons+-+$'.number_format($not_available_for_comp).'|';
echo 'Not+competed+for+an+allowable+reason+-+$'.number_format($not_competed).'|';
echo 'Not+identified+-+$'.number_format($competition_unknown);
//echo '&chco=17D813,27A53B,91D849,D0D833,E2651D,AF3228,31030C,000000';
echo '&chco=073540,d2e5e8,ea7100';
echo '&chl=';
echo $comp_chart_percent[0],'%|';
echo $comp_chart_percent[1],'%|';
echo $comp_chart_percent[2],'%|';
echo $comp_chart_percent[3],'%|';
echo $comp_chart_percent[4],'%|';
echo $comp_chart_percent[5],'%';
echo '&chd=t:';
echo $comp_chart_percent[0],',';
echo $comp_chart_percent[1],',';
echo $comp_chart_percent[2],',';
echo $comp_chart_percent[3],',';
echo $comp_chart_percent[4],',';
echo $comp_chart_percent[5],'&chs=400x355&chdlp=bv&chtt=Level+of+Competition+for+Federal+Contracts">';
echo "</p>\n";

$types_of_contracts = $result->data->record->type_of_contract_used;

//print_r($types_of_contracts);

$contract_chart_percent = array();
$fixed_contract = $types_of_contracts->fixed_price;
settype($fixed_contract, "float");
$percent = $fixed_contract / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$cost_type = $types_of_contracts->cost_type;
settype($cost_type, "float");
$percent = $cost_type / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$time_and_material = $types_of_contracts->time_and_material;
settype($time_and_material, "float");
$percent = $time_and_material / $total_amt * 100;
$contract_chart_percent[] = number_format($percent,0);

$labor_hours = $types_of_contracts->labor_hours;
settype($labor_hours, "float");
$percent = $labor_hours / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$contracts_that_allow_the_orders_to_be_priced_differently_than_the_basic_contract = $types_of_contracts->contracts_that_allow_the_orders_to_be_priced_differently_than_the_basic_contract;
$percent = $contracts_that_allow_the_orders_to_be_priced_differently_than_the_basic_contract / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$contracts_that_used_a_combination_of_the_above_pricing_arrangements = $types_of_contracts->contracts_that_used_a_combination_of_the_above_pricing_arrangements;
$percent = $contracts_that_used_a_combination_of_the_above_pricing_arrangements / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$awards_only_where_none_of_the_above_pricing_arrangements_apply = $types_of_contracts->awards_only_where_none_of_the_above_pricing_arrangements_apply;
$percent = $awards_only_where_none_of_the_above_pricing_arrangements_apply / $total_amt * 100;
$contract_chart_percent[] = number_format($percent, 0);

$unknown = $types_of_contracts->unknown;
$percent = $unknown / $total_amt * 100;
$contract_chart_percent[] = number_format($percent,0);

//print_r($contract_chart_percent);

echo "<p>\n";
echo '<img src="http://chart.apis.google.com/chart?cht=p&chdl=';
echo 'Fixed+Contract+-+$'.number_format($fixed_contract).'|';
echo 'Cost Type+-+$'.number_format($cost_type).'|';
echo 'Time+and+Material+-+$'.number_format($time_and_material).'|';
echo 'Labor+Hours+-+$'.number_format($labor_hours).'|';
echo 'Contracts+priced+differently+than+the+basic+-+$'.number_format($contracts_that_allow_the_orders_to_be_priced_differently_than_the_basic_contract).'|';
echo 'Contracts+that+use+a+combination+of+above+pricing+-+$'.number_format($contracts_that_used_a_combination_of_the_above_pricing_arrangements).'|';
echo 'Awards+without+above+pricing+arrangements+-+$'.number_format($awards_only_where_none_of_the_above_pricing_arrangements_apply).'|';
echo 'Not+identified+-+$'.number_format($unknown);
//echo '&chco=17D813,27A53B,91D849,D0D833,E2651D,AF3228,31030C,000000';
echo '&chco=073540,d2e5e8,ea7100';
echo '&chl=';
echo $contract_chart_percent[0],'%|';
echo $contract_chart_percent[1],'%|';
echo $contract_chart_percent[2],'%|';
echo $contract_chart_percent[3],'%|';
echo $contract_chart_percent[4],'%|';
echo $contract_chart_percent[5],'%';
echo '&chd=t:';
echo $contract_chart_percent[0],',';
echo $contract_chart_percent[1],',';
echo $contract_chart_percent[2],',';
echo $contract_chart_percent[3],',';
echo $contract_chart_percent[4],',';
echo $contract_chart_percent[5],'&chs=400x355&chdlp=bv&chtt=Types of Contract used in Contracts">';
echo "</p>\n";


$services = $result->data->record->top_products_or_services_sold;
*/
        //$state_offices = $this->FollowTheMoney->stateOffice('ny');
        //$sort = array('total_dollars');
        //$state_offices = $this->FollowTheMoneyState->stateOffice('ny', 2008, null, null, $sort);
        //office required
       
        //$district_key = 'state_offices_district-ny-2008';

        //$state_offices_district = $this->FollowTheMoneyState->stateOfficeDistrict('ny', 2008, null, null, $sort);
        //$state_offices_breakdown = $this->FollowTheMoneyState->stateOfficeBreakdown('ny', 2008, null, null, $sort);
        //$state_offices_business = $this->FollowTheMoneyState->stateOfficeBusiness('ny', '2008', null, '1', null, $sort);
        //$state_offices_sectors = $this->FollowTheMoneyState->stateOfficeSectors('ny', '2008', 'SENATE', null, $sort); 
        //$state_offices_industries = $this->FollowTheMoneyState->stateOfficeIndustries('ny', '2008','SENATE'); 
        //$state_offices_contributors = $this->FollowTheMoneyState->stateTopContributors('ny', '2008', 'SENATE', null, $sort); 
       
        //echo $this->renderStateOffices($state_offices);

        /*
        print_r($state_offices);
        print_r($state_offices_sectors);
        print_r($state_offices_industries);
        print_r($state_offices_district);
        */
        //print_r($state_offices_breakdown);
        //print_r($state_offices_business);
        //print_r($state_offices_contributors);
        //echo $this->renderStateOfficesBusiness($state_offices_business);
        /* 
        foreach($state_offices_business as $business) { 
        //    print_r($business);
            $state_offices_district[trim($business->attributes()->office)][]= $this->FollowTheMoneyState->stateOfficeDistrict('ny', '2008', trim($business->attributes()->office),  null, $sort);

        }
        print_r($state_offices_district);
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
        //echo '<pre>'; 
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
        //echo $time;
    }
        function renderStateOffices($arr)
        {
            $total_stateoffices = sizeof($arr);
        
            echo '<table class="datadisplay"><tr><thead><th>State</th><th>Year</th><th>Office</th><th>Recipients</th>
            <th>Contribution</th><th>Total Dollars</th></tr>';
            for($i=0; $i < $total_stateoffices; $i++) {
            echo '<tr>';
            echo '<td>';
            echo $arr->state_office[$i]->attributes()->state_name;
            echo '</td><td>';
            echo $arr->state_office[$i]->attributes()->year;
            echo '</td><td>';
            echo $arr->state_office[$i]->attributes()->office;
            echo '</td><td align="right">';
            echo $arr->state_office[$i]->attributes()->total_recipients;
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_office[$i]->attributes()->total_contribution_records);
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_office[$i]->attributes()->total_dollars, 2);
            echo '</td><td>';
            echo '</tr>';
            }
            echo '</table>';
        }
        function renderStateOfficesBusiness($arr)
        {
            $total_stateoffices = sizeof($arr);
        
            echo '<table class="datadisplay"><tr><thead><th>State</th><th>Year</th><th>Business</th>
            <th>Contribution</th><th>Total Dollars</th></tr>';
            for($i=0; $i < $total_stateoffices; $i++) {
            echo '<tr>';
            echo '<td>';
            echo $arr->state_offices_business[$i]->attributes()->state_name;
            echo '</td><td>';
            echo $arr->state_offices_business[$i]->attributes()->year;
            echo '</td><td>';
            echo $arr->state_offices_business[$i]->attributes()->business_name;
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_offices_business[$i]->attributes()->total_contribution_records);
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_offices_business[$i]->attributes()->total_dollars, 2);
            echo '</td><td>';
            echo '</tr>';
            }
            echo '</table>';
        }
        function renderStateOfficesBreakdowns($arr, $method = 'state_office')
        {
            $total_stateoffices = sizeof($arr);
        
            echo '<table class="datadisplay"><tr><thead><th>State</th><th>Year</th><th>Office</th><th>Recipients</th>
            <th>Contribution</th><th>Total Dollars</th></tr>';
            for($i=0; $i < $total_stateoffices; $i++) {
            echo '<tr>';
            echo '<td>';
            echo $arr->state_office[$i]->attributes()->state_code;
            echo '</td><td>';
            echo $arr->state_office[$i]->attributes()->year;
            echo '</td><td>';
            echo $arr->state_office[$i]->attributes()->office;
            echo '</td><td align="right">';
            echo $arr->state_office[$i]->attributes()->total_recipients;
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_office[$i]->attributes()->total_contribution_records);
            echo '</td><td class="number" align="right">';
            echo number_format($arr->state_office[$i]->attributes()->total_dollars, 2);
            echo '</td><td>';
            echo '</tr>';
            }
            echo '</table>';
        }

    function shell($str=null)
    {
        echo 'Hello Chauncey' . $str;
    }

}
