<html>
<head>
	<script type="text/javascript" src="../js/debug.js"></script>
	<script type="text/javascript" src="../js/sleep.js"></script>
	<?php include 'ReceiptPrinterSyncClass.inc';?>
	<script type="text/javascript">
		function window_load() {
			RPUSetTraceLog(true);
			RPUOpen(6, 9600);
			RPUInitialize(false);
			RPUPrintAndCut("If this works I'll be very happy!");
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