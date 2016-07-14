<?php
require_once '../../config.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../static/css/bootstrap.min.css" rel="stylesheet">
	<title>Capture a transaction</title>
</head>
<body>

<div class="container">
	<h2>Capture a transaction</h2>
    <a href="../../index.php">Back to Home</a>
	<form action="../CaptureTransaction.php" class="form-horizontal" method="POST">
		<!-- Hidden testing input-->
		<h4>Merchant Settings (normally hidden)</h4>

        <div class="form-group required">
           <label for="token" class="col-sm-2 control-label">Token</label>
           <div class="col-sm-10">
            <input type="text" class="form-control" name="token" id="token" value="<?= TOKEN ?>">
           </div>
        </div>
		<br/>
		<h4>Customer Entered Information</h4>
		<div class="form-group required">
			<label for="amount" class="col-sm-2 control-label">Order Amount</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="amount" name="amount" value="1" placeholder="Order Amount">
			</div>
		</div>
        <div class="form-group required">
           <label for="currency" class="col-sm-2 control-label">Order Currency</label>
           <div class="col-sm-10">
            <select name="currency" id="currency" class="form-control">
             <option value='CNY'>CNY</option>
             <option value='USD' selected>USD</option>
             <option value='EUR'>EUR</option>
             <option value='GBP'>GBP</option>
             <option value='CAD'>CAD</option>
             <option value='JPY'>JPY</option>
             <option value='HKD'>HKD</option>
            </select>
           </div>
        </div>
        <div class="form-group">
           <label for="reference" class="col-sm-2 control-label">transaction_id</label>
           <div class="col-sm-10">
            <input type="text" class="form-control" id="transaction_id" name="transaction_id" value='' >
           </div>
        </div>
     
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="" style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;">Submit</button>
			</div>
		</div>
	</form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../static/js/jquery-1.1.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../static/js/bootstrap.min.js"></script>
</body>
</html>