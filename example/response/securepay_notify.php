<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>express pay</title>
</head>
<?php
require_once '../../config.php';
require_once '../../lib/log.php';
//init log
$logHandler= new CLogFileHandler("../../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
Log::INFO("begin notify");

function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}


Log::INFO(json_encode($_REQUEST));

function sign($params,$token) {
     ksort($params);
        $sign_str = "";
        foreach ($params as $key => $val) {
            if($key == 'verify_sign') {
                continue;
            }
            if($val == null && $val == '' && $val == 'null') {
                continue;
            }
            $sign_str .= sprintf("%s=%s&", $key, $val);
        }
    return md5($sign_str . strtolower(md5($token)));
}
if($_POST['verify_sign'] != sign($_POST, $payr['paykey'])) {
    exit('签名失败');
}
printf_info($_REQUEST);
