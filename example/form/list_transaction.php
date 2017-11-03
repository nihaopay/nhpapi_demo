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
 <link href="../../static/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 <title>List transactions</title>
</head>
<body>

<div class="container">
 <h2>List transactions</h2>
    <a href="../../index.php">Back to Home</a>
 <form action="../ListTransaction.php" class="form-horizontal" method="POST">
  <!-- Hidden testing input-->
  <h4>Merchant Settings (normally hidden)</h4>

        <div class="form-group required">
           <label for="token" class="col-sm-2 control-label">Token</label>
           <div class="col-sm-10">
            <input type="text" class="form-control" name="token" id="token" value="<?php echo TOKEN ?>">
           </div>
        </div>
  <br/>
  <h4>Customer Entered Information</h4>
     <div class="form-group">
    <label for="limit" class="col-sm-2 control-label">Limit</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" id="limit" name="limit"
      placeholder="10" value="10">
    </div>
   </div>
   
	<div class="form-group required">
			<label for="starting_after" class="col-sm-2 control-label">Start Time</label>

			<div class="col-sm-10">
				<div class='input-group date' id='starting_after'>
					<input type='text' class="form-control" id='starting_after' name="starting_after"/>
					<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
				</div>
			</div>
		</div>
		<div class="form-group required">
			<label for="ending_before" class="col-sm-2 control-label">End Time</label>

			<div class="col-sm-10">
				<div class='input-group date' id='ending_before'>
					<input type='text' class="form-control" id='ending_before' name="ending_before"/>
					<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
				</div>
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
<script type="text/javascript" src="../../static/js/moment.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$('#starting_after').datetimepicker({});
	$('#ending_before').datetimepicker({});
	$("#starting_after").on("dp.change", function (e) {
		var minDate = moment(e.date);
		var maxDate = moment(e.date).add(24, 'hours');
		$('#ending_before').data("DateTimePicker").maxDate(false);
		$('#ending_before').data("DateTimePicker").minDate(false);
		$('#ending_before').data("DateTimePicker").maxDate(maxDate);
		$('#ending_before').data("DateTimePicker").minDate(minDate);

	});
</script>
</body>
</html>