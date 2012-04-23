var usdBalance = 0;
var btcBalance = 0;
var timer = null;
var onBuy = null;
	
window.onload = function() {
	document.getElementById('address').innerHTML = address;
	document.getElementById('exchangeRate').innerHTML = btcPrice;
	startTimer(); 
	BAUSetOnBillStacked(billStacked);
	BAUCreate();
}

function setOnBuy(callback) {
	onBuy = callback;
}

function billStacked(bill) {
	startTimer();
	usdBalance += bill;
	doUpdate();
}

function doUpdate() {
	document.getElementById('placeOrderButton').style.display = (usdBalance > 0) ? 'block' : 'none';
	document.getElementById('backButton').style.display = (usdBalance > 0) ? 'none' : 'block';
	btcBalance = usdBalance/btcPrice;
	document.getElementById('usdBalance').innerHTML = usdBalance;
	document.getElementById('btcBalance').innerHTML = btcBalance;
}

function placeOrder() {
	if (timer) clearTimeout(timer);
	if (usdBalance == 0) return;
	BAUSetOnClosed(onBuy);
	BAUClose();
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