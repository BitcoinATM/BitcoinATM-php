var timeout = 60000; // in ms
var timer = null;

function startTimer(command) {
	if (timer) clearTimeout(timer);
	timer = setTimeout(command, timeout);
}