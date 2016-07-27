<?php
/******
 *
 *  File:  ListTransaction.php
 *  Description: 
 *
 ******/

require_once '../config.php';
require_once 'NihaopayApi.php';

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi->getToken();

$headers = array(
	"authorization: $accessToken",
);

$limit = isset($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 10;

$start = new DateTime($_REQUEST['starting_after']);
$end = new DateTime($_REQUEST['ending_before']);
$startTime = $start->format("Y-m-d\TH:i:s\Z");
$endTime = $end->format("Y-m-d\TH:i:s\Z");

$inquiryURL = API_URL . "/transactions/?limit=".$limit;
if ($_REQUEST['starting_after']){
    $inquiryURL .= '&starting_after='.$startTime;
}
if ($_REQUEST['ending_before']){
    $inquiryURL .= '&ending_before='.$endTime;
}

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
        $response_arr = json_decode($response, true);
        //var_dump($response_arr);
        include 'response/transaction_list.php';
    }else{
        //has error
        var_dump($response);
    }
}







