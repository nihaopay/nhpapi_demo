<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>Release Transaction</title>
</head>
<?php
/******
 *
 *  File:  ReleaseTransaction.php
 *  Description:
 ******/

require_once '../config.php';
require_once 'NihaopayApi.php';

function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi->getToken();

$headers = array(
	"authorization: $accessToken",
);


$transaction_id = trim($_REQUEST['transaction_id']);

$expressPayURL =  $nihaopayApi::API_URL . "/transactions/".$transaction_id."/release";

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
    //error
    echo $response;
} else {
    printf_info(json_decode($response, true));
}


