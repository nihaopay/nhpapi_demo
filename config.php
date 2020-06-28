<?php
/**
 * Merchant config file 
 * Please read doc/README.txt first
 */
ini_set('date.timezone','UTC');

$server = $_SERVER['SERVER_NAME'];
$uri = 'http'.(isset($_SERVER['HTTPS']) ? 's' : '').'://'.$server;
//set demo php path
//You can view your bearer token in the TMS by logging in and going to Settings -> Certificate -> View API Token.
define('TOKEN', '4847fed22494dc22b1b1a478b34e374e0b429608f31adf289704b4ea093e60a8');

define("API_URL", "https://apitest.nihaopay.com/v1.2");//for test environment
//define("API_URL", "https://api.nihaopay.com/v1.1");//production environment

define("IPN_URL", "http://yourdomain.com/example/response/ipn.php");//your IPN url, Notice: IPN Url can not be localhost
define("CALLBACK_URL", "http://yourdomain.com/example/response/callback.php");//your callback url 