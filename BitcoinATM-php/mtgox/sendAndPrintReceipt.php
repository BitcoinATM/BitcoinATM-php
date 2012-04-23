<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Receipt Page</title>
	<?php include '../MouseCursor.inc';?>
	<script type="text/javascript" src="../js/nodebug.js"></script>
	<?php include '../ActiveX/ReceiptPrinterClass.inc';?>
	<?php include 'sendToAddress.php';?>
	<script type="text/javascript">
		var address = '<?php echo $_POST["address"];?>';
		var btc = <?php echo $_POST["btc"];?>;
		btc = btc.toFixed(8);
		var usd = <?php echo $_POST["usd"];?>;
		usd = usd.toFixed(2);
		var price = <?php echo $_POST["price"];?>;
		var headerImage = "C:\\approot\\atm_dev\\images\\BitcoinATM_printlogo2.jpg";
		var message = '';
		var footer = "\n \n Thank you for using BitcoinATM.\n Have a nice day!";
		var d = new Date();
		var timestamp = d.toDateString() + "     " + d.toTimeString();
		var machineID = "ATM# 123";

		window.onload = function() {
			document.getElementById('price').innerHTML = price;
			document.getElementById('btc').innerHTML = btc;
			document.getElementById('usd').innerHTML = usd;
			doSend();
			RPUSetTraceLog(true);
			RPUSetCallback(initPrinter);
			RPUOpen(6, 9600);
		}
		
		function doSend() {
			var txid = "<?php echo sendToAddress($_POST['address'], $_POST['btc']);?>";
			if (!txid.match(/Error/)) {
				message = "\n BTC bought: " + btc +
				"\n Price: $" + usd + "\n bitcoin:\n " + address + "\n txid:\n " + txid;
			}
			else {
				message = "\n Sorry, there was an error processing\n your transaction.\n \n Please call (949)394-5932 for assistance";
			}
			document.getElementById('screenOutput').innerHTML += "Printing receipt...";
		}
		
		function initPrinter() {
			RPUSetCallback(printHeader);
			RPUInitialize(false);
		}
		
		function printHeader() {
			RPUSetCallback(printBody);
			//RPUPrintImage(headerImage, 0, 1);
			RPUPrintFlashImage(0,0);
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
			document.getElementById('screenOutput').innerHTML = '';
			document.getElementById('goodbyeText').style.display = "block";
			//document.getElementById('screenOutput').innerHTML += "<br /><br />Please take your receipt. Thank you for using BitcoinATM. <br /><br />Have a nice day.";
			closePrinter();
		}
		
		function closePrinter() {
			RPUSetCallback(delayGoStartScreen);
			RPUClose();
		}
		
		var timer = null;
		
		function delayGoStartScreen() {
			timer = setTimeout("window.location.href='../';", 5000);
		}
	</script>
<style type="text/css">
body
{
   background-color: #FFFFFF;
   color: #000000;
}
</style>
</head>
<body>

<div id="wb_Shape1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;text-align:center;z-index:1;">
<img src="../images/img0052.gif" id="Shape1" alt="" title="" style="border-width:0;width:1024px;height:768px"></div>
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:857px;top:722px;width:153px;height:32px;text-align:left;z-index:2;">
<img src="../images/bitcoinsimple.png" id="Image1" alt="" border="0" style="width:153px;height:32px;"></div>
<div id="wb_Image4" style="margin:0;padding:0;position:absolute;left:130px;top:8px;width:765px;height:759px;opacity:0.05;-moz-opacity:0.05;-khtml-opacity:0.05;filter:alpha(opacity=5);text-align:left;z-index:3;">
<img src="../images/bitcoin530.png" id="Image4" alt="" border="0" style="width:765px;height:759px;"></div>
<div id="wb_Shape3" style="margin:0;padding:0;position:absolute;left:100px;top:120px;width:820px;height:510px;text-align:center;z-index:4;">
<img src="../images/img0053.gif" id="Shape3" alt="" title="" style="border-width:0;width:820px;height:510px"></div>
<div id="wb_Line1" style="margin:0;padding:0;position:absolute;left:116px;top:206px;width:779px;height:0px;text-align:left;z-index:5;">
<img src="../images/img0054.png" id="Line1" alt="" title="" style="border-width:0;width:787px;height:8px"></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:630px;top:190px;width:270px;height:16px;text-align:right;z-index:6;">
<font style="font-size:13px" color="#000000" face="Arial"><b>Current USD Exchange Rate: &#3647;1 = $<span id="price">0</span></b></font></div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:100px;top:470px;width:820px;height:51px;text-align:center;z-index:7;">
<div id="goodbyeText" style="display:none;">
	<font style="font-size:43px" color="#666666" face="Arial"><b>Thank You!</b></font></div>
	<div id="wb_Image3" style="margin:0;padding:0;position:absolute;left:120px;top:500px;width:130px;height:117px;opacity:0.25;-moz-opacity:0.25;-khtml-opacity:0.25;filter:alpha(opacity=25);text-align:left;z-index:8;">
	<img src="../images/bitcoins.jpg" id="Image3" alt="" border="0" style="width:130px;height:117px;"></div>
	<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:100px;top:540px;width:820px;height:24px;text-align:center;z-index:9;">
	<font style="font-size:21px" color="#666666" face="Arial"><b>Don't Forget To Take Your Receipt!</b></font></div>
</div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:100px;top:300px;width:820px;height:24px;text-align:center;z-index:10;">
<font style="font-size:21px" color="#666666" face="Arial"><b>You purchased &#3647;<span id="btc">0</span> for $<span id="usd">0</span>.</b></font></div>
<div id="wb_Text5" style="margin:0;padding:0;position:absolute;left:120px;top:180px;width:375px;height:24px;text-align:left;z-index:11;">
<font style="font-size:21px" color="#000000" face="Arial"><b><span id="screenOutput"></span></b></font></div>
<div id="wb_Text6" style="margin:0;padding:0;position:absolute;left:730px;top:250px;width:320px;height:24px;text-align:left;z-index:12;">
<font style="font-size:21px" color="#000000" face="Arial"><b><span id="debug"></span></b></font></div>
<!-- button to gracefully close printer for debugging
<input type="button" onclick="closePrinter();" id="closeButton" value="Close Printer" style="margin:0;padding:0;position:absolute;left:100px;top:100px;z-index:1000;"/>
-->
<?php include '../ActiveX/ReceiptPrinterObj.inc';?>
</body>
</html>