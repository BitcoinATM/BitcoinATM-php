<?php
require_once 'account1.php';
require_once 'exchangeQueryTools.php';
$btcToUSD = getSpot();
$btcToBuy = number_format($_GET['deposited']/$btcToUSD,8);
?>
<html>
<head>
<meta http-equiv="refresh" content="10; url=http://placeholder/bitcoin/atm/" />
<script type="text/javascript">
	var printData = "You have purchased <?php echo $btcToBuy;?> BTC\n from Mt. Gox.\n \n Thank you for using BitcoinATM.";
</script>
<?php include '../MouseCursor.inc';?>
<?php include '../ReceiptPrinterCode.inc';?>
</head>
<body onload="window_onload();">
<div id="debug"></div>
<?php
if (!isset($_GET['address']) || !isset($_GET['deposited']))
	echo "Missing parameter.";
else {
	echo "<p>You have bought &#3647;$btcToBuy from Mt. Gox.</p>";
	echo "<p>Printing receipt...</p>";
	echo "<p>Thank you for using BitcoinATM</p>";
	/*$rval = mtgox_query('0/withdraw.php',
			array("group1" => 'BTC', "btca" => $_GET['address'], "amount" => $btcToBuy));
	echo "<p>Query complete.</p>";
	var_dump($rval);*/
}
?>
<?php include '../ReceiptPrinterObj.inc';?>
</body>
</html>