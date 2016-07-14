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

printf_info($_REQUEST);
