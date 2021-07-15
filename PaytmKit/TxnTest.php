<?php
	
	include "../dbms/dbh.inc.php";

	$orderid = "ORDS" . rand(10000,99999999);

	if(isset($_POST['paymentBtn']))
	{
		$fee_name = $_POST['fee_name'];
		$fee_amt = $_POST['fee_amt'];
		$custid = $_POST['custid'];
		$custname = $_POST['custname'];
		
		$sql = "UPDATE feepayment SET ORDERID = '$orderid' WHERE CUSTID = '$custid' AND FEE_NAME='$fee_name' ";
		$result = $conn->query($sql);
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Fee Payment Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>FEE NAME ::*</label></td>
					<td><input id="FEE_NAME" tabindex="1" name="FEE_NAME" value='<?php echo $fee_name ?>' readonly></td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="2" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $orderid ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="3" name="CUST_ID" value=<?php echo $custid ?> readonly></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly></td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value=<?php echo $fee_amt; ?> readonly>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>
