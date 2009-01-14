<?php
        echo '<p>';
        echo '<strong>Federal Spending ' . $fedSpending->data->record->attributes()->description .': </strong><br/><br/>';
        echo 'Total Obligated Amount: $' . number_format($fedSpending->data->record->totals->total_ObligatedAmount, 2) . "<br/>";
        echo 'Rank Among states: ' . $fedSpending->data->record->totals->rank_among_states . "<br/>";
        echo 'Number of Contractors: ' . number_format($fedSpending->data->record->totals->number_of_contractors) . "<br/>";
        echo 'Number of Transactions: ' . number_format($fedSpending->data->record->totals->number_of_transactions) . "<br/>";
        echo '</p>';

        echo '<p>';
        echo '<strong>'.$fedSpending->data->record->top_known_congressional_districts->attributes()->description ."</strong><br/><br/>";
        foreach($fedSpending->data->record->top_known_congressional_districts->congressional_district as $_district) {
            echo $_district ."<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top products or services sold</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_products_or_services_sold->product_or_service_category as $_prodsrv) {
            echo  $_prodsrv . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top contracting agencies</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_contracting_agencies->agency as $_agency) {
            echo  $_agency . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Top contractor parent companies</strong>'."<br/><br/>";
        foreach($fedSpending->data->record->top_contractor_parent_companies->contractor_parent_company as $_parent_comp) {
            echo  $_parent_comp . "<br/>";
        }
        echo '</p>';

        echo '<p>';
        echo '<strong>Total obligated amount in dollars by year</strong>'."<br/><br/>";
        $i=0;
        foreach($fedSpending->data->record->fiscal_years->fiscal_year as $_total_dollars) {
            echo 'Fical Year 200'.$i .': $'. number_format($_total_dollars) ."<br/>";
            $i++;
        }
        echo '</p>';
?>

</div>
</div>

