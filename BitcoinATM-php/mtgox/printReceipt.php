<html>
<head>
	<style rel="stylesheet" type="text/css" href="../css/MouseCursor.css" />
	<script type="text/javascript" src="../js/debug.js"></script>
	<?php include '../ActiveX/ReceiptPrinterClass.inc';?>
	<?php include 'accountTodd.php' ?>
	<?php include 'exchangeQueryTools.php' ?>
	<script type="text/javascript">
		window.onload = function() {
			doWithdrawal();
			RPUSetTraceLog(true);
			RPUSetCallback(initPrinter);
			RPUOpen(6, 9600);
		}

		var headerImage = "C:\\approot\\atm_dev\\images\\BitcoinATM_printlogo2.jpg";
		var message = '';
		var footer = "\n \n Thank you for using BitcoinATM.\n Have a nice day!";
		var d = new Date();
		var timestamp = d.toDateString() + "     " + d.toTimeString();
		var machineID = "ATM# 123";
		
		function doWithdrawal() {
			var isSuccessful = <?php $tx = withdrawBTC($_POST["address"], $_POST["btc"]); echo (isset($tx['error'])) ? 0 : 1;?>;
			if (isSuccessful) {
				message = "You have purchased <?php echo number_format($_POST['btc'],8);?> BTC" +
				"\n for $<?php echo number_format($_POST['usd'],2);?>."
			}
			else {
				message = "Sorry, there was an error processing\n your transaction.\n \n Please call (949)394-5932 for assistance.";
			}
			document.getElementById('screenOutput').innerHTML += message + "\n \n Please wait for your receipt...";
		}
		
		function initPrinter() {
			RPUSetCallback(printHeader);
			RPUInitialize(false);
		}
		
		function printHeader() {
			RPUSetCallback(printBody);
			RPUPrintImage(headerImage, 0, 1);
		}
		
		function printBody() {
			RPUSetCallback(printFooter);
			RPUPrintData(message);
		}
		
		function printFooter() {
			RPUSetCallback(receiptPrinted);
			RPUPrintAndCut(footer + "\n \n " + timestamp + "\n " + machineID);
		}
		
		function receiptPrinted(){
			document.getElementById('doneDiv').innerHTML = "<p>Please take your receipt. Thank you for using BitcoinATM. <br /><br />Have a nice day.</p>";
			printerClose();
		}
		
		function printerClose() {
			RPUSetCallback(null);
			RPUClose();
		}
		
		
	</script>
</head>
<body>
	<pre id="debug"></pre>
	<input type="button" onclick="printerClose();" value="Close Printer" />
	<pre id="screenOutput"></pre>
	<div id="doneDiv"></div>
	<?php include '../ActiveX/ReceiptPrinterObj.inc';?>
</body>
</html>