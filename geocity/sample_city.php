#!/usr/bin/php -q
<?php

// This code demonstrates how to lookup the country, region, city,
// postal code, latitude, and longitude by IP Address.
// It is designed to work with GeoIP/GeoLite City

// Note that you must download the New Format of GeoIP City (GEO-133).
// The old format (GEO-132) will not work.

include("geoipcity.inc");
include("geoipregionvars.php");

// uncomment for Shared Memory support
// geoip_load_shared_mem("/usr/local/share/GeoIP/GeoIPCity.dat");
// $gi = geoip_open("/usr/local/share/GeoIP/GeoIPCity.dat",GEOIP_SHARED_MEMORY);

$gi = geoip_open("./GeoLiteCity.dat",GEOIP_MEMORY_CACHE);
// $gi = geoip_open("/usr/local/share/GeoIP/GeoIPCity.dat",GEOIP_STANDARD);

$record = geoip_record_by_addr($gi,"67.88.57.133");
print $record->city . "\n";
$_postal_code =  $record->postal_code . "\n";

$user_agent = 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)';
$url = 'http://weather.yahooapis.com/forecastrss?p='.$_postal_code.'&u=f';
echo $url ."\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PORT, 80);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

$xml = curl_exec($ch);
$response = simplexml_load_string($xml);
print_r($response);
print $response->channel->title ."\n";


print $record->country_code . " " . $record->country_code3 . " " . $record->country_name . "\n";
print $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";
print $record->latitude . "\n";
print $record->longitude . "\n";
print $record->dma_code . "\n";
print $record->postal_code . "\n";
print $record->area_code . "\n";

geoip_close($gi);

?>
