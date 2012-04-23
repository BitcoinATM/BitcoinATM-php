<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Page</title>
<style rel="stylesheet" type="text/css" href="../css/MouseCursor.css" />
<style type="text/css">
body
{
   background-color: #FFFFFF;
   color: #000000;
}
</style>
<script type="text/javascript" src="../js/nodebug.js"></script>
<script type="text/javascript" src="../js/post_to_url.js"></script>
<?php include '../ActiveX/BillAcceptorClass.inc';?>
<?php
include 'account1.php';
include 'exchangeQueryTools.php';
?>
<script type="text/javascript">
	var btcPrice = <?php echo getSpot();?>;
	var address = "<?php echo $_GET['address'];?>";
</script>
<script type="text/javascript" src="../js/billacceptor.js"></script>
<script type="text/javascript">
	setOnBuy(doSendAndPrintReceipt);
	
	function doSendAndPrintReceipt() {
		post_to_url(
			'sendAndPrintReceipt.php',{
				address: address,
				usd: usdBalance,
				btc: btcBalance,
				price: btcPrice
			},
		"POST");
	}
	
	function tryHomeScreen() {
		if (usdBalance > 0) return;
		BAUSetOnClosed(toHomeScreen);
		BAUClose();
	}
	
	function toHomeScreen() {
		window.location.href = "../home.php";
	}
</script>
</head>
<body>
<div id="debug" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:500;height:500px;text-align:center;z-index:1;color:red;z-index:1000"></div>
<div id="address"></div>
<div id="wb_Shape1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;text-align:center;z-index:1;">
<img src="../images/img0004.gif" id="Shape1" alt="" title="" style="border-width:0;width:1024px;height:768px"></div>
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:857px;top:722px;width:153px;height:32px;text-align:left;z-index:2;">
<img src="../images/bitcoinsimple.png" id="Image1" alt="" border="0" style="width:153px;height:32px;"></div>
<div id="wb_Image4" style="margin:0;padding:0;position:absolute;left:130px;top:8px;width:765px;height:759px;opacity:0.05;-moz-opacity:0.05;-khtml-opacity:0.05;filter:alpha(opacity=5);text-align:left;z-index:3;">
<img src="../images/bitcoin530.png" id="Image4" alt="" border="0" style="width:765px;height:759px;"></div>
<div id="wb_Shape3" style="margin:0;padding:0;position:absolute;left:100px;top:120px;width:820px;height:510px;text-align:center;z-index:4;">
<img src="../images/img0005.gif" id="Shape3" alt="" title="" style="border-width:0;width:820px;height:510px"></div>
<div id="wb_Line1" style="margin:0;padding:0;position:absolute;left:116px;top:206px;width:779px;height:0px;text-align:left;z-index:5;">
<img src="../images/img0006.png" id="Line1" alt="" title="" style="border-width:0;width:787px;height:8px"></div>
<!--
<div id="wb_Image2" style="margin:0;padding:0;position:absolute;left:110px;top:120px;width:223px;height:106px;text-align:left;z-index:6;">
<img src="../images/mtgoxlogo.png" id="Image2" alt="" border="0" style="width:223px;height:106px;"></div>
-->
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:630px;top:190px;width:270px;height:16px;text-align:right;z-index:7;">
<font style="font-size:13px" color="#000000" face="Arial"><b>Current USD Exchange Rate: &#3647;1 = $</b><span id="exchangeRate"></span></font></div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:102px;top:230px;width:820px;height:51px;text-align:center;z-index:8;">
<font style="font-size:43px" color="#666666" face="Arial"><b>Insert Bills Now</b></font></div>
<div id="wb_Shape4" style="margin:0;padding:0;position:absolute;left:280px;top:300px;width:497px;height:50px;text-align:center;z-index:9;">
<img src="../images/img0007.gif" id="Shape4" alt="" title="" style="border-width:0;width:497px;height:50px"></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:350px;top:310px;width:570px;height:32px;text-align:left;z-index:10;">
<font style="font-size:27px" color="#FFFFFF" face="Arial"><b>You have inserted $<span id="usdBalance">0</span></b></font></div>
<div id="wb_Shape2" style="margin:0;padding:0;position:absolute;left:280px;top:380px;width:497px;height:50px;text-align:center;z-index:11;">
<img src="../images/img0008.gif" id="Shape2" alt="" title="" style="border-width:0;width:497px;height:50px"></div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:350px;top:390px;width:570px;height:32px;text-align:left;z-index:12;">
<font style="font-size:27px" color="#FFFFFF" face="Arial"><b>Bitcoins: &#3647;<span id="btcBalance">0</span></b></font></div>
<div id="wb_Image3" style="margin:0;padding:0;position:absolute;left:120px;top:500px;width:130px;height:117px;opacity:0.25;-moz-opacity:0.25;-khtml-opacity:0.25;filter:alpha(opacity=25);text-align:left;z-index:13;">
<img src="../images/bitcoins.jpg" id="Image3" alt="" border="0" style="width:130px;height:117px;"></div>
<!--<input type="button" onclick="tryHomeScreen();" id="backButton" value="Go Back" style="margin:0;padding:0;position:absolute;left:300px;top:700px;z-index:1000;"/>
<input type="button" onclick="placeOrder();" id="placeOrderButton" value="Place order" style="margin:0;padding:0;position:absolute;left:450px;top:500px;z-index:1000;"/>
-->
<!-- buttons -->
<input type="button" onclick="BAUClose();" id="closeButton" value="Close Bill Acceptor" style="margin:0;padding:0;position:absolute;left:600px;top:700px;z-index:1000;"/>
<input type="button" id="backButton" onclick="tryHomeScreen();" name="" value="Go Back" style="position:absolute;left:440px;top:480px;width:183px;height:47px;background-color:#68838B;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:21px;z-index:13">
<input type="button" id="placeOrderButton" onclick="placeOrder();" name="" value="Place Order" style="position:absolute;left:440px;top:480px;width:183px;height:47px;background-color:#68838B;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:21px;z-index:14;display:none;">

<!-- Top Logo -->
<div id="wb_Image2" style="margin:0;padding:0;position:absolute;left:122px;top:131px;width:306px;height:64px;text-align:left;z-index:15;">
<img src="../images/bitcoinsimple.png" id="Image2" alt="" border="0" style="width:306px;height:64px;"></div>
<?php include '../ActiveX/BillAcceptorObj.inc';?>
</body>
</html>