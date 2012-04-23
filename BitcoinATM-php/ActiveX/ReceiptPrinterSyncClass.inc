<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>
<!--

var rpuOpenBlock = false;
var rpuInitBlock = false;
var rpuCloseBlock = false;
var rpuPrintDataBlock = false;
var rpuPrintAndCutBlock = false;

function RPUSetTraceLog(traceLog) {
	ReceiptPrinter.TraceLog = traceLog;
}

function RPUOpen(port, baud) {
	if (rpuOpenBlock) {
		debugOut("ReceiptPrinter OpenBlock.");
		return -3;
	}
	ReceiptPrinter.PortNumber = port;
	ReceiptPrinter.BaudRate = baud;
	ReceiptPrinter.Parity = 0;
	ReceiptPrinter.StopBits = 0;
	ReceiptPrinter.ByteSize = 8;

	rpuOpenBlock = true;
	var rval = ReceiptPrinter.OpenDevice();
	debugOut("ReceiptPrinter::OpenDevice()->" + rval);
	if (rval == 0) while (rpuOpenBlock) { sleep(10); }
	else rpuOpenBlock = false;
	return rval;
}

function RPUWideOpenDevice(portFrom, portTo, baud) {
	if (rpuOpenBlock) {
		debugOut("ReceiptPrinter OpenBlock.");
		return -3;
	}
	ReceiptPrinter.BaudRate = baud;
	ReceiptPrinter.Parity = 0;
	ReceiptPrinter.StopBits = 0;
	ReceiptPrinter.ByteSize = 8;
	ReceiptPrinter.PollingInterval = 1000;

	rpuOpenBlock = true;
	var rval = ReceiptPrinter.WideOpenDevice(portFrom, portTo);
	debugOut("ReceiptPrinter::WideOpenDevice()->" + rval);
	if (rval == 0) while (rpuOpenBlock);
	else rpuOpenBlock = false;
	return rval;
}

function RPUClose() {
	if (rpuCloseBlock) {
		debugOut("ReceiptPrinter CloseBlock.");
		return -3;
	}
	
	rpuCloseBlock = true;
	var rval = ReceiptPrinter.CloseDevice();
	debugOut("ReceiptPrinter::CloseDevice()->" + rval);
	if (rval == 0) while (rpuCloseBlock);
	else rpuCloseBlock = false;
	return rval;
}


function RPUInitialize(testPrint) {
	if (rpuInitBlock) {
		debugOut("ReceiptPrinter InitBlock.");
		return -3;
	}	
	
	rpuInitBlock = true;
	var rval = ReceiptPrinter.InitializeDevice(testPrint);
	debugOut("ReceiptPrinter::InitializeDevice()->" + rval);
	if (rval == 0) while (rpuInitBlock);
	else rpuInitBlock = false;
	return rval;
}

function RPUPrintData(data) {
	if (rpuPrintDataBlock) {
		debugOut("ReceiptPrinter PrintDataBlock.");
		return -3;
	}	

	rpuPrintDataBlock = true;
	var rval = ReceiptPrinter.PrintData(data, data.length);
	debugOut("ReceiptPrinter::PrintData()->" + rval);
	if (rval == 0) while (rpuPrintDataBlock);
	else rpuPrintDataBlock = false;
	return rval;
}

function RPUPrintFormData(maxLine, data) {
	rval = ReceiptPrinter.PrintFormData(maxLine, data);
	debugOut("ReceiptPrinter::PrintFormData()->" + rval);
	return rval;
}

function RPUPrintImage(fileName, skipColumn, alignment) {
	var rval = ReceiptPrinter.PrintImage(fileName, skipColumn, alignment);
	debugOut("ReceiptPrinter::PrintImage()->" + rval);
	return rval;
}

function RPUCut() {
	var rval = ReceiptPrinter.Cut();
	debugOut("ReceiptPrinter::Cut()->" + rval);
	return rval;
}

function RPUPrintSRAMImg(){
	var rval = ReceiptPrinter.PrintSRAMImage();
	debugOut("ReceiptPrinter::PrintSRAMImage()->" + rval);
	return rval;
}

function RPUPrintAndCut(data) {
	if (rpuPrintAndCutBlock) {
		debugOut("ReceiptPrinter PrintAndCutBlock.");
		return -3;
	}

	rpuPrintAndCutBlock = true;
	var rval = ReceiptPrinter.PrintAndCut(data,  data.length);
	debugOut("ReceiptPrinter::PrintAndCut()->" + rval);
	if (rval == 0) while (rpuPrintAndCutBlock);
	else rpuPrintAndCutBlock = false;
	return rval;
}

function RPUPrintImageAndCut(fileName, skipColumn, alignment) {
	var rval = ReceiptPrinter.PrintImageAndCut(fileName, skipColumn, alignment);
	debugOut("ReceiptPrinter::PrintImageAndCut()->" + rval);
	return rval;
}

function RPUPrintSRAMImageAndCut() {
	var rval = ReceiptPrinter.PrintSRAMImageAndCut();
	debugOut("ReceiptPrinter::PrintSRAMImageAndCut()->" + rval);
	return rval;
}

function RPUDownloadImage(fileName, index, blockSize) {
	var rval = ReceiptPrinter.DownloadImage(fileName, index, blockSize);
	debugOut("ReceiptPrinter::DownloadImage()->" + rval);
	return rval;
}

function RPUPrintFlashImage(index, skipColumn) {
	var rval = ReceiptPrinter.PrintFlashImage(index, skipColumn);
	debugOut("ReceiptPrinter::PrintFlashImage()->" + rval);
	return rval;
}

function RPUPrintFlashImageAndCut(index, skipColumn) {
	var rval = ReceiptPrinter.PrintFlashImageAndCut(index, skipColumn);
	debugOut("ReceiptPrinter::PrintFlashImageAndCut()->" + rval);
	return rval;
}

function RPUPrintFormDataAndCut(maxLine, data) {
	var rval = ReceiptPrinter.PrintFormDataAndCut(maxLine, data);
	debugOut("ReceiptPrinter::PrintFormDataAndCut()->" + rval);
	return rval;
}

////////////////////////////////////
// Receipt Printer Event Handlers //
////////////////////////////////////
function ReceiptPrinter_DeviceOpened(port) {
	debugOut("Receipt Printer Device Opened. PortNumber: " + port);
	debugOut("Receipt Printer Version : " + ReceiptPrinter.Version);
	rpuOpenBlock = false;
}

function ReceiptPrinter_DeviceClosed() {
	debugOut("Receipt Printer Device Closed.");
	rpuCloseBlock = false;
}

function ReceiptPrinter_InitializeCompleted() {
	debugOut("Receipt Printer Device Initialized.");
	rpuInitBlock = false;
}

function ReceiptPrinter_CutCompleted() {
	debugOut("Receipt Printer Cut Compeleted.");
	rpuCutBlock = false;
}

function ReceiptPrinter_PrintCompleted() {
	debugOut("Receipt Printer Print Compeleted.");
	rpuPrintDataBlock = false;
}

function ReceiptPrinter_PrintImageCompleted() {
	debugOut("Receipt Printer Print Image Completed.");
	rpuPrintImageBlock = false;
}

function ReceiptPrinter_Statuschanged(ChangedStatus, PrevStatus, CurrentStatus) {
	// Tracing code
}

function ReceiptPrinter_DeviceError(reason) {
	debugOut("Receipt Printer. Device Error: " + reason); 
}

function ReceiptPrinter_PrintAndCutCompleted() {
	debugOut("Receipt Printer Print And Cut Completed.");
	rpuPrintAndCutBlock = false;
}

function ReceiptPrinter_PrintImageAndCutCompleted() {
	debugOut("Receipt Printer Print Image And Cut Completed.");
	rpuPrintImageAndCutBlock = false;
}

function ReceiptPrinter_DownloadImageCompleted() {
	debugOut("Receipt Printer Download Image Completed.");
	rpuDownloadImageBlock = false;
}

//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=DeviceOpened(OpenedPortNumber)>
<!--
 ReceiptPrinter_DeviceOpened(OpenedPortNumber)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=DeviceClosed>
<!--
 ReceiptPrinter_DeviceClosed()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=InitializeCompleted>
<!--
 ReceiptPrinter_InitializeCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=CutCompleted>
<!--
 ReceiptPrinter_CutCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=PrintCompleted>
<!--
 ReceiptPrinter_PrintCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT=PrintImageCompleted>
<!--
 ReceiptPrinter_PrintImageCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT="Statuschanged(ChangedStatus, PrevStatus, CurrentStatus)">
<!--
 ReceiptPrinter_Statuschanged(ChangedStatus, PrevStatus, CurrentStatus)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT="DeviceError(Reason)">
<!--
ReceiptPrinter_DeviceError(Reason)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT="PrintAndCutCompleted()">
<!--
ReceiptPrinter_PrintAndCutCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT="PrintImageAndCutCompleted()">
<!--
ReceiptPrinter_PrintImageAndCutCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=ReceiptPrinter EVENT="DownloadImageCompleted()">
<!--
ReceiptPrinter_DownloadImageCompleted()
//-->
</SCRIPT>