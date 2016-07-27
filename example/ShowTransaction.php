<?php
/******
 *
 *  File: ShowTransaction.php
 *  Description: show one order
 *
 ******/

require_once '../config.php';
require_once 'NihaopayApi.php';

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi->getToken();

$headers = array(
	"authorization: $accessToken",
);

$transaction_id = $_REQUEST['transaction_id'];

$inquiryURL = API_URL . "/transactions/".$transaction_id;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $inquiryURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if (!$response) {
	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);

if ($httpCode != 200) {
	//error
	var_dump($response);
} else {
    if (json_decode($response, true)){
        $transaction = json_decode($response, true);
        include 'response/single_transaction.php';
    }else{
        //has error
        var_dump($response);
    }
}







