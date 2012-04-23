<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Home Page</title>
<?php include 'MouseCursor.inc';?>
<style type="text/css">
<body>
{
   background-color: #FFFFFF;
   color: #000000;
}
</style>
<script type="text/javascript" src="js/nodebug.js"></script>
<script type="text/javascript" src="btcto/js/btctoQuery.js"></script>
<script type="text/javascript" src="js/timeout.js"></script>
<script type="text/javascript" src="js/QuickMark.js"></script>
<script type="text/javascript">
	var address = "<?php echo (isset($_GET['address'])) ? $_GET['address'] : '';?>";
	// value="<?php echo (isset($_GET['address'])) ? $_GET['address'] : '';?>"
	
	var addressIsValid = false;
	
	//window.onload = function () {startTimer("toStartScreen();");}
	//function initPage() {startTimer("toStartScreen();");if (address) CloseQuickMark();}
	
	//function toStartScreen() {debugOut('going to start screen...');CloseQuickMark(); window.location.href = "";}

	function doBtctoQuery() {
		textEdit = document.getElementById('address');
		if (textEdit.value.length == 34) return;
		btctoQuery(textEdit, textEdit, queryDone);
	}
	
	function queryDone(state, status) {
		validate();
	}
	
	function isValid(_address) {
		addressIsValid = (_address.length == 34);
		if (addressIsValid) {
			//debugOut("readonly set");
			document.getElementById('address').setAttribute('readonly', 'readonly');
		}
		return addressIsValid;
	}
	
	function validate() {
		address = document.getElementById('address').value;
		var visibility = isValid(address) ? "hidden" : "visible";
		document.getElementById('mtgoxOverlay').style.visibility=visibility;
		document.getElementById('tradehillOverlay').style.visibility=visibility;
		document.getElementById('myWalletOverlay').style.visibility=visibility;	
	}
	
	function addressKeyDown() {
		//address = document.getElementById('address').value;
		//debugOut('onkeydown - ' + address);
	}
	
	function addressBlur() {
		//address = document.getElementById('address').value;
		//debugOut('onblur - ' + address);
		// workaround to get the keyboard to hide.
		window.scrollTo(0,1);
		window.scrollTo(0,0);
	}
		
	function addressKeyUp() {
		//address = document.getElementById('address').value;
		//debugOut('onkeyup - ' + address);
		validate();
	}
	
	
	function addressChange() {
		//address = document.getElementById('address').value;
		//debugOut('onchange - ' + address);
		validate();
	}
	
	function clearAddress() {
		document.getElementById('address').value = "";
		validate();
		document.getElementById('address').removeAttribute('readonly');
		//debugOut('readonly reset');
	}

	function goMtGox() {
		//debugOut('goMtGox()');
		address = document.getElementById('address').value;
		if (isValid(address)) {
			window.location.href = "mtgox/mtgox.php?address=" + document.getElementById('address').value;
		}
	}
	
	function goMyWallet() {
		debugOut('goMyWallet()');
		address = document.getElementById('address').value;
		if (isValid(address)) {
			window.location.href = "mywallet/mywallet.php?address=" + document.getElementById('address').value;
		}
	}
</script>


</head>
<body onclick="initPage();" style="overflow:hidden;">
<div id="debug" style="color:red;margin:0;padding:0;position:absolute;left:0px;top:0px;width:300px;height:500px;text-align:center;z-index:1000;"></div>
<div id="wb_Shape1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;text-align:center;z-index:1;">
<img src="images/img0002.gif" id="Shape1" alt="" title="" style="border-width:0;width:1024px;height:768px"></div>
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:857px;top:722px;width:153px;height:32px;text-align:left;z-index:2;">
<img src="images/bitcoinsimple.png" id="Image1" alt="" border="0" style="width:153px;height:32px;"></div>
<div id="wb_Image4" style="margin:0;padding:0;position:absolute;left:131px;top:8px;width:765px;height:759px;opacity:0.05;-moz-opacity:0.05;-khtml-opacity:0.05;filter:alpha(opacity=5);text-align:left;z-index:3;">
<img src="images/bitcoin530.png" id="Image4" alt="" border="0" style="width:765px;height:759px;"></div>
<div id="wb_Shape3" style="margin:0;padding:0;position:absolute;left:100px;top:60px;width:820px;height:170px;text-align:center;z-index:4;">
<img src="images/img0003.gif" id="Shape3" alt="" title="" style="border-width:0;width:820px;height:170px"></div>

<!-- ADDRESS TEXTBOX -->
<input type="text" id="address" onkeydown="addressKeyDown();" onkeyup="addressKeyUp();" onchange="addressChange();" onblur="addressBlur();"
	style="position:absolute;left:160px;top:170px;width:571px;height:34px;border:1px #C0C0C0 solid;font-family:Arial;font-size:27px;z-index:5"
	name="address" value="" maxlength="34" />

<!-- CLEAR BUTTON-->
<input type="button" id="clearButton" onclick="clearAddress();" name="" value="clear" style="position:absolute;left:760px;top:110px;width:100px;height:40px;font-family:Arial;font-size:24px;z-index:6">

<!-- BTC.TO BUTTON-->
<input type="button" id="btctoButton" onclick="doBtctoQuery();" name="" value="go" style="position:absolute;left:760px;top:170px;width:100px;height:40px;font-family:Arial;font-size:24px;z-index:6">

<div id="wb_Image2" style="margin:0;padding:0;position:absolute;left:380px;top:70px;width:254px;height:89px;text-align:left;z-index:7;">
<img src="images/btcto.png" id="Image2" alt="" border="0" style="width:254px;height:89px;"></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:100px;top:30px;width:810px;height:19px;text-align:center;z-index:8;">
<font style="font-size:16px" color="#FFFFFF" face="Arial"><b>Before continuing, please enter your receiving address using one of these simple methods</b></font></div>
<div id="wb_Image3" style="margin:0;padding:0;position:absolute;left:130px;top:27px;width:22px;height:22px;text-align:left;z-index:9;">
<img src="images/information.png" id="Image3" alt="" border="0" style="width:22px;height:22px;"></div>
<div id="wb_Shape2" style="margin:0;padding:0;position:absolute;left:100px;top:250px;width:820px;height:170px;text-align:center;z-index:10;">
<img src="images/img0012.gif" id="Shape2" alt="" title="" style="border-width:0;width:820px;height:170px"></div>
<div id="wb_Image5" style="margin:0;padding:0;position:absolute;left:460px;top:280px;width:100px;height:100px;text-align:left;z-index:11;">
<img src="images/qrlogo.jpg" id="qrcode" onclick="LaunchQuickMark();" alt="" border="0" style="width:100px;height:100px;"></div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:100px;top:390px;width:820px;height:19px;text-align:center;z-index:12;">
<font style="font-size:16px" color="#5BB4FF" face="Arial"><b>Use our QR code reader application</b></font></div>
<!--MyWallet-->
<div id="wb_Shape5" style="margin:0;padding:0;position:absolute;left:690px;top:460px;width:230px;height:110px;text-align:center;z-index:13;">
<img src="images/img0013.gif" id="mywalletButton" onclick="goMyWallet();" alt="" title="" style="border-width:0;width:230px;height:110px"></div>
<img src="images/img0051.png" id="MergedObject1" onclick="goMyWallet();" alt="" title="" style="position:absolute;left:690px;top:480px;width:230px;height:69px;border-width:0;z-index:25">

<div id="wb_Shape4" style="margin:0;padding:0;position:absolute;left:100px;top:460px;width:230px;height:110px;text-align:center;z-index:14;">
<img src="images/img0014.gif" id="Shape4" alt="" title="" style="border-width:0;width:230px;height:110px"></div>
<div id="wb_Shape6" style="margin:0;padding:0;position:absolute;left:390px;top:460px;width:240px;height:110px;text-align:center;z-index:15;">
<img src="images/img0015.gif" id="Shape6" alt="" title="" style="border-width:0;width:240px;height:110px"></div>
<!-- Mt Gox -->
<div id="wb_Image6" style="margin:0;padding:0;position:absolute;left:110px;top:460px;width:223px;height:106px;text-align:left;z-index:16;">
<img src="images/mtgoxlogo.png" id="mtgox" onclick="goMtGox();" alt="Mt. Gox" border="0" style="width:223px;height:106px;"></div>

<!-- Tradehill -->
<div id="wb_Image7" style="margin:0;padding:0;position:absolute;left:400px;top:470px;width:219px;height:80px;text-align:left;z-index:17;">
<img src="images/TradeHill.jpg" onclick="goMyWallet();" id="Image7" alt="" border="0" style="width:219px;height:80px;"></div>
<div id="wb_Image8" style="margin:0;padding:0;position:absolute;left:750px;top:480px;width:104px;height:69px;opacity:0.55;-moz-opacity:0.55;-khtml-opacity:0.55;filter:alpha(opacity=55);text-align:left;z-index:18;">
<img src="images/bitcoinclient.png" id="mywallet" onclick="goMyWallet();" alt="" border="0" style="width:104px;height:69px;"></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:690px;top:494px;width:230px;height:42px;text-align:center;z-index:19;">
<font style="font-size:37px" color="#FFFFFF" face="Arial">my wallet</font></div>
<div id="wb_Shape7" style="margin:0;padding:0;position:absolute;left:390px;top:610px;width:240px;height:110px;text-align:center;z-index:20;">
<img src="images/img0016.gif" id="Shape7" alt="" title="" style="border-width:0;width:240px;height:110px"></div>
<div id="wb_Image9" style="margin:0;padding:0;position:absolute;left:420px;top:640px;width:187px;height:50px;text-align:left;z-index:21;">
<img src="images/bitbills.png" id="Image9" alt="" border="0" style="width:187px;height:50px;"></div>
<div id="mtgoxOverlay" style="margin:0;padding:0;position:absolute;left:100px;top:460px;width:230px;height:110px;opacity:0.70;-moz-opacity:0.70;-khtml-opacity:0.70;filter:alpha(opacity=70);text-align:center;z-index:22;">
<img src="images/img0017.gif" id="Shape8" alt="" title="" style="border-width:0;width:230px;height:110px"></div>
<div id="tradehillOverlay" style="margin:0;padding:0;position:absolute;left:390px;top:460px;width:240px;height:110px;opacity:0.70;-moz-opacity:0.70;-khtml-opacity:0.70;filter:alpha(opacity=70);text-align:center;z-index:23;">
<img src="images/img0018.gif" id="Shape9" alt="" title="" style="border-width:0;width:240px;height:110px"></div>
<div id="myWalletOverlay" style="margin:0;padding:0;position:absolute;left:690px;top:460px;width:230px;height:110px;opacity:0.70;-moz-opacity:0.70;-khtml-opacity:0.70;filter:alpha(opacity=70);text-align:center;z-index:24;">
<img src="images/img0023.gif" id="Shape10" alt="" title="" style="border-width:0;width:230px;height:110px"></div>
</body>
</html>