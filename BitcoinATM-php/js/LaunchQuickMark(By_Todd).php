<html>
<head>
<title>LaunchQuickMark</title>
<script type="text/JScript">
function executeCommands()
           {
            var oShell = new ActiveXObject("shell.application");
            var commandtoRun = new Object;
			commandtoRun = oShell.ShellExecute ("C:/Program Files/SimpleAct/QuickMark/QuickMark.exe");            
}

</script> 
</head>
<body>
<button onclick="executeCommands()">QR Scanner</button>
</body>
</html> 


Temp... taken from home.php

	function initPage() {
		startTimer("toStartScreen();");
		if (address) CloseQuickMark();
	}
	
	function toStartScreen() {
		//debugOut('going to start screen...');
		CloseQuickMark();	
		window.location.href = "";
	}