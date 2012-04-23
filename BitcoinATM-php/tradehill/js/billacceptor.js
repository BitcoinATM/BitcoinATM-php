var usdBalance = 0;
var btcBalance = 0;
var timer = null;
	
window.onload = function() {
	document.getElementById('address').innerHTML = address;
	document.getElementById('exchangeRate').innerHTML = btcPrice;
	startTimer(); 
	BAUSetOnBillStacked(billStacked);
	BAUCreate();
}

function billStacked(bill) {
	startTimer();
	usdBalance += bill;
	doUpdate();
}

function doUpdate() {
	document.getElementById('placeOrderButton').disabled = (usdBalance > 0) ? '' : 'disabled';
	btcBalance = usdBalance/btcPrice;
	document.getElementById('usdBalance').innerHTML = usdBalance;
	document.getElementById('btcBalance').innerHTML = btcBalance;
}

function placeOrder() {
	if (timer) clearTimeout(timer);
	if (usdBalance == 0) return;
	BAUSetOnClosed(doPost);
	BAUClose();
}

function doPost() {
	post_to_url(
		'printReceipt.php',{
			address: address,
			usd: usdBalance,
			btc: btcBalance
		},
	"POST");
}

function onTimeout() {
	if (timer) clearTimeout(timer);
	if (usdBalance > 0) 
		placeOrder();
	else {
		BAUSetOnClosed(toStartScreen);
		BAUClose();
	}
}

function startTimer() {
	if (timer) clearTimeout(timer);
	timer = setTimeout("onTimeout();", 90*1000);
}

function toStartScreen() {
	window.location.href="../";
}