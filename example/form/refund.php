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
<title>Single Transaction</title>
</head>
<body>
 <div class="container">
  <h2>Single Transaction</h2>
  <a href="../../index.php">Back to Home</a>
  <form action="../RefundPayment.php" class="form-horizontal"
   method="POST">
   <!-- Input Fields -->
   <h4>Merchant Input</h4>

   <div class="form-group required">
    <label for="orderId" class="col-sm-2 control-label">Transaction ID</label>

    <div class="col-sm-10">
     <input type="text" class="form-control" name="transaction_id"
      id="transaction_id" placeholder="Transaction ID" value="">
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
    <label for="description" class="col-sm-2 control-label">Reason</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" name="reason" id="reason"
      placeholder="Reason">
    </div>
   </div>
   <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Amount</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" name="amount" id="amount"
      placeholder="amount">
    </div>
   </div>

   <div class="form-group required">
    <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class=""
      style="width: 120px; height: 50px; border-radius: 15px; background-color: #FE6714; border: 0px #FE6714 solid; cursor: pointer; color: white; font-size: 16px;">Submit</button>
    </div>
   </div>
  </form>
 </div>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="../../static/js/jquery-1.1.2.min.js"></script>
 <script type="text/javascript" src="../../static/js/moment.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="../../static/js/bootstrap.min.js"></script>
</body>
</html>