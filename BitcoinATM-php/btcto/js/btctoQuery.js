function btctoQuery(input, output, callback) {
	var addressText = input.value;
	var url = "http://localhost:8080/btcto/proxy.php?address=" + addressText;
	var req = new XMLHttpRequest();
	req.open("GET", url);
	req.send(null);
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			output.value = req.responseText;
		}
		if (callback) callback(req.readyState, req.status);
	}
}