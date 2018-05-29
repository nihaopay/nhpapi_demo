<?php
/*
  File: RequestQRCode.php

  Description: returns a QRcode URL that contains information merchant asked.
  Merchant will then be able to show this URL on mobile devices or PC web browser,
  enabling users to scan and pay.

  Doc: http://docs.nihaopay.com/api/v1.2/en/#show-qrcode
*/

require_once '../config.php'
require_once 'NihaopayApi.php'

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi -> getToken();

$headers = array {
  "authorization: $accessToken",
};

$data = array {
  'amount'      => $_REQUEST['amount'], //amount as an integer of the smallest unit of the currency
  'currency'    => $_REQUEST['currency'] //currency in 3-char ISO code. USD, JPY, HKD and EUR are currently supported
  'vendor'      => $_REQUEST['vendor']  //currently, acceptable vendors are wecharpay and alipay
  'reference'   => $_REQUEST['reference'] //an alphanumeric string up to 30 char that must be unique to each transaction
  'ipn_url'     => $_REQUEST['ipn_url']  //Instant Payment Notification URL: must be accessible on the INternet
  //'callback_url => $_REQUEST['callback_url']'   not sure if needed
  'timeout'     => $_REQUEST['120']     //(optional) amount of time in minutes (1 - 1440) card holders have before payment page times out. Set to 120 by default
  'description' => $_REQUEST['description']  //(optional string)
  'note'        => $_REQUEST['note']  //(optional string) note to self regarding the transaction
}

$QRCodeURL = API_URL . "transactions/showqrcode"

$ch = curl_init();  //initialize a new cURL session
curl_setopt($ch, CURLOPT_URL, $QRCodeURL);  //provides URL to use for the request
curl_setopt($ch, CURLOPT_POST, 1);  //regular HTTP POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //return the transfer when curl_exec() is called
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //set header
curl_setopt($ch, CURLOPT_POSTFIELD, $data); //POST data

$response = curl_exec($ch);
curl_close($ch);

if (!response){
  die ('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}

if ($httpCode != 200){  //has error
  echo $response;
}else{
  if (json_decode($response, true)){
    printf_info(json_decode($response, true));
  }else{
    echo $response;
  }
}
?>
