<?php
class UsafedspendingHelper extends Helper {

    function usaFedSpendingByDistrict($district, $year)
    {
        //this code was taken from http://www.lukeberndt.com/spending/ Luke Berndt with minor changes
        //http://sunlightlabs.com/contests/appsforamerica2/apps/local-spending/
        $response = file_get_contents('http://www.usaspending.gov/fpds/fpds.php?datype=X&detail=-1&pop_cd='.$district.'&fiscal_year='.$year);
        $result = simplexml_load_string($response);
        if($result) {
        //print_r($result);
        //echo '</pre>';
        $search='';
        echo "<h2><strong>Federal Contract Performance:<br/><small> for Congressional District ".$district." (".$year.")</small></strong></h2>\n";
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

        foreach($districts->children() as $district) {
            foreach($district->attributes() as $name=>$attr) {
                 $res[$name]=$attr;

            }
            echo $district. '&nbsp;';
            echo "$",  number_format($res["total_obligatedAmount"]),  "\n";
        }

        $agencies = $result->data->record->top_contracting_agencies;

        echo "<h3>Top Contracting Agencies</h3>\n";

        foreach($agencies->children() as $agency) {
            foreach($agency->attributes() as $name=>$attr) {
            $res[$name]=$attr;
        }
        echo  $agency, ":&nbsp;";
        echo "$",  number_format($res["total_obligatedAmount"]),  "<br/>\n";
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


        echo '<br/>';
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
        }
    }
}
