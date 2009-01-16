<?php
//captiolwords wrapper
//require APP . 'vendors' . DS .'JSON.php';
class CapitolwordsComponent extends Object
{

    public function dailysum($word, $year, $month=null, $day=null, $endyear=null, $endmonth=null, $endday=null)
    {
        if(($endyear || $endmonth || $endday) && (!$endyear || !$endmonth || !$endday)) {
            //trigger exception
        }
        $json = new Services_JSON();

        $params = array($word, $year, $month, $day, $endyear, $endmonth, $endday);
        $params_str = implode("/", $params);
        $url = 'http://capitolwords.org/api/word/'.$params_str.'/feed.json';
        $data = @file_get_contents($url);
        $results = $json->decode($data);
        return $results;
    }

    public function wordofday($year=null, $month=null, $day=null, $endyear=null, $endmonth=null, $endday=null, $maxrows=1)
    {
        if(($endyear || $endmonth || $endday) && (!$endyea || !$endmont || !$endday)) {
            //trigger exception
        }
        $json = new Services_JSON();

        $params = array($year, $month, $day, $endyear, $endmonth, $endday);
        $params_str = implode("/", $params);
        $url = 'http://capitolwords.org/api/wod/'.$params_str.'/top'.$maxrows.'.json';
        $data = @file_get_contents($url);
        $results = $json->decode($data);
        return $results;

    }
}
