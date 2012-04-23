<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Page</title>
<?php include '../MouseCursor.inc';?>
<style type="text/css">
html, body
{
   height: 100%;
}
div#space
{
   width: 1px;
   height: 50%;
   margin-bottom: -442px;
   float:left
}
div#container
{
   width: 994px;
   height: 884px;
   margin: 0 auto;
   position: relative;
   clear: left;
}
</style>
<style type="text/css">
body
{
   margin: 0;
   padding: 0;
   background-color: #FFFFFF;
   color: #000000;
}
</style>
<?php include '../BillAcceptorCode.inc';?>
<script type="text/javascript">
buyPage = 'bitbills_buy.php';
allowBitbills = true;
</script>
</head>
<body onload="return window_onload();">
<div id="debug"></div>
<div id="space"><br></div>
<div id="container">
<div id="wb_Shape1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;text-align:center;z-index:0;">
<img src="../images/img0001.gif" id="Shape1" alt="" title="" style="border-width:0;width:1024px;height:768px"></div>
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:0px;top:0px;width:1024px;height:768px;opacity:0.06;-moz-opacity:0.06;-khtml-opacity:0.06;filter:alpha(opacity=6);text-align:left;z-index:1;">
<img src="../images/bitbillssplash.png" id="Image1" alt="" border="0" style="width:1024px;height:768px;"></div>
<input type="submit" id="Button1" onclick="window.location.href='bitbills_bill.php'; ;return false;" name="" value="Purchase Complete" style="position:absolute;left:350px;top:360px;width:292px;height:50px;background-color:transparent;font-family:Verdana;font-size:29px;z-index:3">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:250px;top:270px;width:200px;height:24px;text-align:right;z-index:4;">
<font style="font-size:21px" color="#000000" face="Arial"><b>USD </b>Inserted: $<span id="dollarSpan">0</span></font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:230px;top:312px;width:220px;height:24px;text-align:right;z-index:5;">
<font style="font-size:21px" color="#000000" face="Arial"><b>Bitbills </b>Purchased:<span id="bitbillsPurchased">0</span></font></div>
<div id="wb_Image3" style="margin:0;padding:0;position:absolute;left:392px;top:148px;width:210px;height:55px;text-align:left;z-index:6;">
<img src="../images/bitbills.png" id="Image3" alt="" border="0" style="width:210px;height:55px;"></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:380px;top:220px;width:210px;height:29px;text-align:center;z-index:7;">
<font style="font-size:24px" color="#000000" face="Arial"><b>1 Bitbill = <span id="bitbillPrice"></span>;</b></font></div>
</div>
<?php include '../BillAcceptorObj.inc';?>
<?php include '../CardDispenserObj.inc';?>
</body>
</html>