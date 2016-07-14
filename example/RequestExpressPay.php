<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>express pay</title>
</head>
<?php
/******
 *
 *  File:          RequestExpressPay.php
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

function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#f00;'>$key</font> : $value <br/>";
    }
}

$data = array(
        'amount'         => $_REQUEST['amount'],
        'currency'       => $_REQUEST['currency'],
        'card_number'    => $_REQUEST['card_number'],
        'card_exp_month' => $_REQUEST['card_exp_month'],
        'card_exp_year'  => $_REQUEST['card_exp_year'],
        'card_cvv'       => $_REQUEST['card_cvv'],
        'capture'        => $_REQUEST['capture'],
        'description'    => $_REQUEST['description'],
        'note'           => $_REQUEST['note'],
        'reference'      => $_REQUEST['reference']
);

$expressPayURL =  $nihaopayApi::API_URL . "/transactions/expresspay";

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
	//has error
	echo $response;
} else {
    if(json_decode($response, true)){
        printf_info(json_decode($response, true));
    }else{
        echo $response;
    }
}

