<?php


class Country
{
    public $country;

    public function __construct()
    {
        $this->country = $this->getCountry($this->getVisIpAddr());
    }

    private function getVisIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function getCountry($ip)
    {
        // Use JSON encoded string and converts
        // it into a PHP variable
        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip));

       return $ipdat->geoplugin_countryName;
//        echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
//        echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
//        echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
//        echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
//        echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
//        echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
//        echo 'Timezone: ' . $ipdat->geoplugin_timezone;
    }

}