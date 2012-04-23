function LaunchQuickMark()
           {
            var oShell = new ActiveXObject("shell.application");
            var commandtoRun = new Object;
			commandtoRun = oShell.ShellExecute ("C:/Program Files/SimpleAct/QuickMark/QuickMark.exe");            
}

function CloseQuickMark() {
	var myObject;
	myObject = new ActiveXObject("Scripting.FileSystemObject");
	myObject.DeleteFile("c:\\QRLaunch\\QRLaunch.txt");
}
