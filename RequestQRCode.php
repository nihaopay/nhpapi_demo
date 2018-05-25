<?php
/*
 *File: RequestShowQRCode.php
 *Description: API demo for QR code-based payment
 *
 *
*/
require_once '../config.php'
require_once 'NihaopayApi.php'

$nihaopayApi = new NihaoPayApi (TOKEN);
$accessToken = $nihaopayApi -> getToken();

$headers = array{
  "authorization: $accessToken",
};

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

$QRCodePayURL =  API_URL . "/transactions/showqrcode";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $QRCodePayURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if (!$response) {
  //Is var_dump necessary?
	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
echo $response;
}
