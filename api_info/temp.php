<?php

include 'functions/curl.php';

$test = cURL();

foreach ($test as $country) {
    echo '"'.$country['country'].'"'.',';
}
die(print_r($test));
