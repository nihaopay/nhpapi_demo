<?php
/******
 *
 *  File:  CancelTransaction.php
 *  Description:
 Transactions can only be canceled before the daily settlement deadline - 3:00PM UTC/GMT.

 Each transaction can only be cancelled once. Transactions cannot be cancelled if a partial or full refund on the transaction has already been issued. 
 *
 ******/

require_once '../config.php';
require_once 'NihaopayApi.php';

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi->getToken();

$headers = array(
	"authorization: $accessToken",
);

$data = array(
);

$transaction_id = $_REQUEST['transaction_id'];

$expressPayURL =  API_URL . "/transactions/".$transaction_id."/cancel";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $expressPayURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if (!$response) {
	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}

if ($httpCode != 200) {
	//log error
	echo $response;
} else {
    echo $response;
}


