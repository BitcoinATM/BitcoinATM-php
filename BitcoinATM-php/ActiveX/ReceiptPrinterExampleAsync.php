<html>
<head>
	<script type="text/javascript" src="../js/debug.js"></script>
	<script type="text/javascript" src="../js/sleep.js"></script>
	<?php include 'ReceiptPrinterClass.inc';?>
	<script type="text/javascript">
		function window_load() {
			RPUSetTraceLog(true);
			RPUSetCallback(printerInit);
			RPUOpen(6, 9600);
		}
		
		function printerInit() {
			RPUSetCallback(doPrint);
			RPUInitialize(false);
		}
		
		function doPrint() {
			RPUSetCallback(printerClose);
			RPUPrintAndCut("looks like we'll have to use async");
		}
		
		function printerClose() {
			RPUSetCallback(null);
			RPUClose();
		}
	</script>
</head>
<body onload="window_load();">
	<pre id="debug"></pre>
	<input type="button" onclick="RPUClose();" value="Close Printer" />
	<?php include 'ReceiptPrinterObj.inc';?>
</body>
</html>