function sleep(ms) {
	var request = new XMLHttpRequest();
	request.open("GET", "../php/usleep.php?us=" + ms*1000, false);
	request.send(null);
}