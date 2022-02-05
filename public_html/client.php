<?php

$url = 'http://localhost/ApiPhpVendas2/public_html/api';

$class = '/vendedor';

$param = '';

$response = file_get_contents($url.$class.$param);

//echo $response;

$response = json_decode($response, 1);

echo '<pre>';
var_dump($response);
echo '<pre>';
