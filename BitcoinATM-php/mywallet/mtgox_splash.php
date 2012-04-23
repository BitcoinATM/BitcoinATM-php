<?php
if (isset($_POST['address'])) {
	require_once '../bitcoinURL.php';
	require_once '../jsonRPCClient.php';
	$bitcoin = new jsonRPCClient(kBitcoinURL);
	$data = $bitcoin->validateaddress($_POST['address']);
	$isValid = $data['isvalid'];
	if ($isValid) header("Location: /bitcoin/atm/mtgox/mtgox_bill.php?address=".$_POST['address']);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Page</title>
<?php include ("../MouseCursor.inc");?>
<style type="text/css">
html, body
{
   height: 100%;
}
div#space
{
   width: 1px;
   height: 50%;
   margin-bottom: -402px;
   float:left
}
div#container
{
   width: 994px;
   height: 805px;
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
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:430px;top:100px;width:119px;height:119px;text-align:left;z-index:1;">
<img src="../images/bitcoin530.png" id="Image1" alt="" border="0" style="width:119px;height:119px;"></div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<?php
	if (isset($_POST['address']) && !$isValid)
		echo '<p style="color: #f00;">Please enter a valid bitcoin address</p>';
?>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:390px;top:240px;width:210px;height:22px;text-align:left;z-index:2;">
<font style="font-size:19px" color="#000000" face="Arial"><b>Please Enter Address</b></font></div>
<input type="text" id="address" name="address" style="position:absolute;left:390px;top:270px;width:198px;height:24px;border:1px #C0C0C0 dotted;font-family:Arial;font-size:19px;z-index:3" name="Editbox1" value="">
<input type="submit" id="submitButton" name="" value="Submit" style="position:absolute;left:600px;top:270px;width:96px;height:25px;font-family:Arial;font-size:19px;z-index:4">
</form>
</div>
</body>
</html>