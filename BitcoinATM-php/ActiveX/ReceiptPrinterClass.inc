<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>
<!--

var rpuCallback = null;
var rpuStatusCallback = false;
var rpuErrorCallback = false;

function RPUSetCallback(callback) {
	rpuCallback = callback;
}

function RPUSetTraceLog(traceLog) {
	ReceiptPrinter.TraceLog = traceLog;
}

function RPUOpen(port, baud) {
	ReceiptPrinter.PortNumber = port;
	ReceiptPrinter.BaudRate = baud;
	ReceiptPrinter.Parity = 0;
	ReceiptPrinter.StopBits = 0;
	ReceiptPrinter.ByteSize = 8;

	var rval = ReceiptPrinter.OpenDevice();
	debugOut("ReceiptPrinter::OpenDevice()->" + rval);
	return rval;
}

function RPUWideOpenDevice(portFrom, portTo, baud) {
	ReceiptPrinter.BaudRate = baud;
	ReceiptPrinter.Parity = 0;
	ReceiptPrinter.StopBits = 0;
	ReceiptPrinter.ByteSize = 8;
	ReceiptPrinter.PollingInterval = 1000;

	var rval = ReceiptPrinter.WideOpenDevice(portFrom, portTo);
	debugOut("ReceiptPrinter::WideOpenDevice()->" + rval);
	return rval;
}

function RPUClose() {
	var rval = ReceiptPrinter.CloseDevice();
	debugOut("ReceiptPrinter::CloseDevice()->" + rval);
	return rval;
}


function RPUInitialize(testPrint) {
	var rval = ReceiptPrinter.InitializeDevice(testPrint);
	debugOut("ReceiptPrinter::InitializeDevice()->" + rval);
	return rval;
}

function RPUPrintData(data) {
	var rval = ReceiptPrinter.PrintData(data,  data.length);
	debugOut("ReceiptPrinter::PrintData()->" + rval);
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
	var rval = ReceiptPrinter.PrintAndCut(data,  data.length);
	debugOut("ReceiptPrinter::PrintAndCut()->" + rval);
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

function ReceiptPrinter_DeviceOpened(port) {
	debugOut("Receipt Printer Device Opened. PortNumber: " + port);
	debugOut("Receipt Printer Version : " + ReceiptPrinter.Version);
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_DeviceClosed() {
	debugOut("Receipt Printer Device Closed.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_InitializeCompleted() {
	debugOut("Receipt Printer Device Initialized.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_CutCompleted() {
	debugOut("Receipt Printer Cut Compeleted.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_PrintCompleted() {
	debugOut("Receipt Printer Print Compeleted.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_PrintImageCompleted() {
	debugOut("Receipt Printer Print Image Completed.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_Statuschanged(ChangedStatus, PrevStatus, CurrentStatus) {
	if (rpuStatusCallback) rpuStatusCallback();
}

function ReceiptPrinter_DeviceError(reason) {
	debugOut("Receipt Printer. Device Error: " + reason);
	if (rpuErrorCallback) rpuErrorCallback();
}

function ReceiptPrinter_PrintAndCutCompleted() {
	debugOut("Receipt Printer Print And Cut Completed.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_PrintImageAndCutCompleted() {
	debugOut("Receipt Printer Print Image And Cut Completed.");
	if (rpuCallback) rpuCallback();
}

function ReceiptPrinter_DownloadImageCompleted() {
	debugOut("Receipt Printer Download Image Completed.");
	if (rpuCallback) rpuCallback();
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