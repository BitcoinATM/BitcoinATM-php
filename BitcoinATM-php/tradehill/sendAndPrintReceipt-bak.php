<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/MouseCursor.css" />
	<script type="text/javascript" src="../js/debug.js"></script>
	<?php include '../ActiveX/ReceiptPrinterClass.inc';?>
	<?php include 'sendToAddress.php';?>
	<script type="text/javascript">
		window.onload = function() {
			doSend();
			RPUSetTraceLog(true);
			RPUSetCallback(initPrinter);
			RPUOpen(6, 9600);
		}

		var address = '<?php echo $_POST["address"];?>';
		var btc = <?php echo $_POST["btc"];?>;
		btc = btc.toFixed(8);
		var usd = <?php echo $_POST["usd"];?>;
		usd = usd.toFixed(2);
		var headerImage = "C:\\approot\\atm_dev\\images\\BitcoinATM_printlogo2.jpg";
		var message = '';
		var footer = "\n \n Thank you for using BitcoinATM.\n Have a nice day!";
		var d = new Date();
		var timestamp = d.toDateString() + "     " + d.toTimeString();
		var machineID = "ATM# 123";
		
		function doSend() {
			var txid = "<?php echo sendToAddress($_POST['address'], $_POST['btc']);?>";
			if (!txid.match(/Error/)) {
				message = "You have purchased BTC " + btc +
				"\n for $" + usd + ". Your bitcoins have been sent to bitcoin:" +
				address + ".\n Your bitcoin transaction id is " + txid + ".";
			}
			else {
				message = "Sorry, there was an error processing\n your transaction.\n \n Please call (949)394-5932 for assistance.";
				message += txid;
			}
			document.getElementById('screenOutput').innerHTML += message + "<br /><br /> Please wait for your receipt...";
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
			document.getElementById('screenOutput').innerHTML += "<br /><br />Please take your receipt. Thank you for using BitcoinATM. <br /><br />Have a nice day.";
			printerClose();
		}
		
		function printerClose() {
			RPUSetCallback(delayGoStartScreen);
			RPUClose();
		}
		
		var timer = null;
		
		function delayGoStartScreen() {
			timer = setTimeout("window.location.href='../';", 5000);
		}
	</script>
</head>
<body>
	<pre id="debug"></pre>
	<input type="button" onclick="printerClose();" value="Close Printer" />
	<div id="screenOutput"></div>
	<?php include '../ActiveX/ReceiptPrinterObj.inc';?>
</body>
</html>