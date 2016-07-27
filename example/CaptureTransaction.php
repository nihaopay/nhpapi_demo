<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>CaptureTransaction</title>
</head>
<?php
/******
 *
 *  File:  CaptureTransaction.php
 *  Description:
 *  Capture the full or partial amount on an existing and uncaptured authorization. The amount cannot be higher than the original authorized amount.
 *
 *  Authorizations not captured within 30 days are automatically released and cannot be captured. A new transaction will need to be created.
 *
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

$data = array(
        'amount'         => $_REQUEST['amount'],
        'currency'       => $_REQUEST['currency']
);


$transaction_id = trim($_REQUEST['transaction_id']);

$expressPayURL =  API_URL . "/transactions/".$transaction_id."/capture";

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
    echo $response;
}


