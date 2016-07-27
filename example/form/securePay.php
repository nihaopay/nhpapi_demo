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
	<title>Secure Payment Request Form</title>
</head>
<body>
<div class="container">
 <h3>Secure Payment Request Form</h3>
 <a href="../../index.php">Back to Home</a>
 <form action="../RequestSecurePay.php" class="form-horizontal" method="POST">
  <h4>Merchant Settings (normally hidden)</h4>
  <div class="form-group required">
   <label for="callback_url" class="col-sm-2 control-label">Return URL</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" name="callback_url" id="callback_url" value="<?php echo URI ?>/example/response/securepay_notify.php">
   </div>
  </div>
  <div class="form-group required">
   <label for="ipn_url" class="col-sm-2 control-label">Callback URL</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" name="ipn_url" id="ipn_url" value="<?php echo URI ?>/example/response/securepay_notify.php">
   </div>
  </div>
  <div class="form-group required">
   <label for="token" class="col-sm-2 control-label">Token</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" name="token" id="token" value="<?php echo TOKEN ?>">
   </div>
  </div>
  <br />
  <h4>Customer Entered Information</h4>
  <div class="form-group required">
   <label for="vendor" class="col-sm-2 control-label">Vendor</label>
   <div class="col-sm-10">
    <select name="vendor" id="vendor" class="form-control">
     <option value='unionpay' selected>unionpay</option>
     <option value='alipay'>alipay</option>
     <option value='wechatpay'>wechatpay</option>
    </select>
   </div>
  </div>
     
  <div class="form-group required">
   <label for="reference" class="col-sm-2 control-label">Reference</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="reference" name="reference" value='<?php echo date("YmdHis").rand(0, 100);?>' >
   </div>
  </div>
  <div class="form-group required">
   <label for="amount" class="col-sm-2 control-label">Order Amount</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="2">
   </div>
  </div>
  <div class="form-group required">
   <label for="currency" class="col-sm-2 control-label">Order Currency</label>
   <div class="col-sm-10">
    <select name="currency" id="currency" class="form-control">
     <option value='USD' selected>USD</option>
     <option value='JPY'>JPY</option>
     <option value='EUR'>EUR</option>
     <option value='GBP'>GBP</option>
     <option value='CAD'>CAD</option>
     <option value='HKD'>HKD</option>
    </select>
   </div>
  </div>
  <div class="form-group">
   <label for="terminal" class="col-sm-2 control-label">Terminal</label>
   <div class="col-sm-10">
    <select name="terminal" id="terminal" class="form-control">
     <option value='ONLINE' selected>PC</option>
     <option value='WAP'>WAP</option>
    </select>
   </div>
  </div>
  <div class="form-group">
   <label for="timeout" class="col-sm-2 control-label">Timeout</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" name="timeout" id="timeout" value="30">
   </div>
  </div>
  <div class="form-group">
   <label for="description" class="col-sm-2 control-label">Order Description</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" name="description" id="description" placeholder="Order Description">
   </div>
  </div>
  <div class="form-group">
   <label for="note" class="col-sm-2 control-label">Note</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="note" name="note" placeholder="Enter Note">
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