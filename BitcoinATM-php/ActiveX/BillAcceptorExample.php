<html>
<head>
	<script type="text/javascript" src="../js/debug.js"></script>
	<?php include 'BillAcceptorClass.inc';?>
	<script type="text/javascript">
		var total = 0;
		
		window.onload = function() {
			BAUSetOnBillStacked(billStacked);
			BAUCreate();
		}
		
		function billStacked(bill) {
			total += bill;
			document.getElementById('total').innerHTML = "$" + total + " inserted";
		}
	</script>
</head>
<body>
	<pre id="debug"></pre>
	<div id="total">$0 inserted</div>
	<input type="button" onclick="BAUClose();" value="Close Bill Acceptor" />
	<?php include 'BillAcceptorObj.inc';?>
</body>
</html>