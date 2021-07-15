<?php
include "../dbms/dbh.inc.php";


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}


echo "<br><br><a href='../college.php'><button>Go back to main page</button></a>";
$ORDERID = $_POST['ORDERID'];
$BANKTXNID = $_POST['BANKTXNID'];
$TXNID = $_POST['TXNID'];
$PAYMENTMODE = $_POST['PAYMENTMODE'];
$BANKNAME = $_POST['BANKNAME'];
$TXNAMOUNT = $_POST['TXNAMOUNT'];
$STATUS = $_POST['STATUS'];
$TXNDATE = $_POST['TXNDATE'];

if($STATUS == 'TXN_SUCCESS')
{
	$sql = "UPDATE feepayment 
			SET BANK_TXN_ID = '$BANKTXNID',TXN_ID = '$TXNID',PAYMENTMODE = '$PAYMENTMODE',
			BANKNAME ='$BANKNAME', TXNDATE ='$TXNDATE', TXNSTATUS ='$STATUS',PAID ='DONE'
			WHERE ORDERID = '$ORDERID' ";
	$result = $conn->query($sql);
	echo "<script type='text/javascript'>console.log('DONE')</script>";
}
else
{
	$sql = "UPDATE feepayment 
	SET BANK_TXN_ID = '$BANKTXNID',TXN_ID = '$TXNID',PAYMENTMODE = '$PAYMENTMODE',
	BANKNAME ='$BANKNAME', TXNDATE ='$TXNDATE', TXNSTATUS ='$STATUS'
	WHERE ORDERID = '$ORDERID' ";
	$result = $conn->query($sql);
	echo "<script type='text/javascript'>console.log('NO')</script>";
}
?>