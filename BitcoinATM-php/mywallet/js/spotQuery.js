var spotTimer = null;
var spotDOMObject = null;
var spotTimeout = 10000;

function setSpotObject(obj, timeout) {
	spotDOMObject = obj;
	spotTimeout = timeout;
}

function spotQuery() {
	if (!spotDOMObject) return;
	var addressText = spotDOMObject.innerHTML;
	var url = "http://localhost:8080/mtgox/spotPrice.php";
	var req = new XMLHttpRequest();
	req.open("GET", url);
	req.send(null);
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			spotDOMObject.innerHTML = req.responseText;
		}
	}
}

function autoRefreshSpot() {
	spotQuery();
	spotTimer = setTimeout("autoRefreshSpot();", spotTimeout);
}