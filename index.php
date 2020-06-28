<?php 
require 'lib/check.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
	<title>nihaopay api list</title>
</head>
<body>
    <div class="container" align="center">
        <h1>Nihaopay API example</h1>
        <p>This example is php code for nihaopay api version v1.2, It includes the major api, please view the docs in <a target="_blank" href="http://docs.nihaopay.com/api/">http://docs.nihaopay.com/api/</a> first</p>
        <p>
    <br>
    <div class="list-group">
        <ul class="nav">
        
          <li><a class="list-group-item" href="example/form/securePay.php">SecurePay</a></li>
          <li><a class="list-group-item" href="example/form/show_transaction.php">Single Inquiry</a></li>
          <li><a class="list-group-item" href="example/form/refund.php">Refund</a></li>

          <li><a class="list-group-item" href="example/form/expressPay.php">Charge/Authorize UnionPay Credit Card</a></li>
          <li><a class="list-group-item" href="example/form/capture.php">Capture Previously Authorized</a></li>
          <li><a class="list-group-item" href="example/form/release.php">Release Previously Authorized</a></li>
          
          <li><a class="list-group-item" href="example/form/list_transaction.php">List Transaction</a></li>
         
        </ul>
        </div>
    </div>
</body>

</html>