<?php
/******
 *
 *  File:          RequestSecurePay.php
 *  Description:
 *  Doc: http://docs.nihaopay.com/api/v1.1/#create-a-securepay-transaction
 ******/

require_once '../config.php';
require_once 'NihaopayApi.php';

$nihaopayApi = new NihaopayApi(TOKEN);
$accessToken = $nihaopayApi->getToken();

$headers = array(
	"authorization: $accessToken",
);

$data = array(
	'amount'        => $_REQUEST['amount'],
    'currency'      => $_REQUEST['currency'],
    'vendor'        => $_REQUEST['vendor'],
    'reference'     => $_REQUEST['reference'],
    'ipn_url'       => $_REQUEST['ipn_url'],
    'callback_url'  => $_REQUEST['callback_url'],
    'description'   => $_REQUEST['description'],
    'note'          => $_REQUEST['note'],
    'terminal'      => $_REQUEST['terminal'],
    'timeout'       => $_REQUEST['timeout']
);
$securePayURL = API_URL . "/transactions/securepay";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $securePayURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);
if (!$response) {
	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
echo $response;













