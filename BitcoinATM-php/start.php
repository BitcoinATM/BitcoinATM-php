<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Page</title>
<?php include 'MouseCursor.inc';?>
<style type="text/css">
body
{
   background-color: #FFFFFF;
   color: #000000;
}
</style>	
<script type="text/javascript" src="mtgox/js/spotQuery.js"></script>
<script type="text/javascript">
	window.onload = function() {
		setSpotObject(document.getElementById('spotObj'), 10*1000); //id of span or div and refresh rate in milliseconds
		autoRefreshSpot();
	}
</script>
</head>
<body onclick="window.location.href='home.php';">
<div id="wb_Shape1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;text-align:center;z-index:1;">
<img src="images/img0001.gif" id="Shape1" alt="" title="" style="border-width:0;width:1024px;height:768px"></div>
<div id="wb_Image4" style="margin:0;padding:0;position:absolute;left:130px;top:8px;width:765px;height:759px;opacity:0.05;-moz-opacity:0.05;-khtml-opacity:0.05;filter:alpha(opacity=5);text-align:left;z-index:2;">
<img src="images/bitcoin530.png" id="Image4" alt="" border="0" style="width:765px;height:759px;"></div>
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:857px;top:722px;width:153px;height:32px;text-align:left;z-index:3;">
<img src="images/bitcoinsimple.png" id="Image1" alt="" border="0" style="width:153px;height:32px;"></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:187px;top:340px;width:650px;height:56px;text-align:center;z-index:4;">
<font style="font-size:48px" color="#FFFFFF" face="Arial"><b>Touch Anywhere To Begin</b></font></div>
<div id="Layer1" style="position:absolute;background-color:#F0F0F0;opacity:0.00;-moz-opacity:0.00;-khtml-opacity:0.00;filter:alpha(opacity=0);left:410px;top:410px;width:290px;height:40px;z-index:5" title="">
</div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:0px;top:409px;width:1020px;height:36px;text-align:center;z-index:6;">
<font style="font-size:21px" color="#FFFFFF" face="Arial"><b>Current USD Exchange Rate: </b></font><font style="font-size:29px" color="#FFFFFF" face="Arial"><b>&#3647;1 = $<span id="spotObj"></span></b></font></div>
</body>
</html>