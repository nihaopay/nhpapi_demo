<?php
/**
 * Merchant config file 
 * Please read doc/README.txt first
 */
ini_set('date.timezone','UTC');

$server = $_SERVER['SERVER_NAME'];
$uri = 'http'.(isset($_SERVER['HTTPS']) ? 's' : '').'://'.$server;
//set demo php path
define('URI', $uri.':'.$_SERVER['SERVER_PORT'].'/us-api-demo');

//define('DIR', substr(__DIR__, 0, -9));

//You can view your bearer token in the TMS by logging in and going to Settings -> Certificate -> View API Token.
define('TOKEN', '4847fed22494dc22b1b1a478b34e374e0b429608f31adf289704b4ea093e60a8');

define("API_URL", "http://localhost:8080/HazePGW/v1.1");//for test environment
//define("API_URL", "http://api.test.nihaopay.com/v1.1");
//define("API_URL", "https://api.nihaopay.com/v1.1");//production environment