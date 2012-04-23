<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>
<!--
///////////////
// callbacks //
///////////////
var onBillStacked = null;
var onClosed = null;

//////////////////
// BAU commands //
//////////////////
function BAUSetOnBillStacked(callback) {
	onBillStacked = callback;
}

function BAUSetOnClosed(callback) {
	onClosed = callback;
}

function BAUCreate() {
	BAUSetProperties(true, true, true, true, true, true, true, 4, false, true, 10000, 20);
	BAUOpen(1, 300, true);
}

function BAUSetProperties(
	ones, twos, fives, tens, twenties, fifties, hundreds,
	orientation, escrow, traceLog, acceptTimeout, returnTimeout
) {
	BillAcceptor.EnableOneDollar = ones;
	BillAcceptor.EnableTwoDollar = twos;
	BillAcceptor.EnableFiveDollar = fives;
	BillAcceptor.EnableTenDollar = tens;
	BillAcceptor.EnableTwentyDollar = twenties;
	BillAcceptor.EnableFiftyDollar = fifties;
	BillAcceptor.EnableHundredDollar = hundreds;
	BillAcceptor.Orientation = orientation;
	BillAcceptor.EscrowEnable = escrow;
	BillAcceptor.TraceLog = traceLog;
	BillAcceptor.AcceptTimeout = acceptTimeout;
	BillAcceptor.ReturnTimeout = returnTimeout;
	debugOut("Properties set.");
}

function BAUSetBillsAccepted(
	ones, twos, fives, tens, twenties, fifties, hundreds
) {
	BillAcceptor.EnableOneDollar = ones;
	BillAcceptor.EnableTwoDollar = twos;
	BillAcceptor.EnableFiveDollar = fives;
	BillAcceptor.EnableTenDollar = tens;
	BillAcceptor.EnableTwentyDollar = twenties;
	BillAcceptor.EnableFiftyDollar = fifties;
	BillAcceptor.EnableHundredDollar = hundreds;
}

function BAUOpen(port, pollingInterval, traceLog) {//port = 1, pollingInterval = 300	
	BillAcceptor.PollingInterval = pollingInterval;
	BillAcceptor.TraceLog = traceLog;
	
	BillAcceptor.PortNumber = port;
	var rval = BillAcceptor.OpenDevice();
	debugOut("BillAcceptor::OpenDevice()->" + rval);
	return rval;
}

// portFrom = lower bound on range of ports.
// portTo = upper bound on range of ports.
// pollingInterval (default 500)
function BAUWideOpenDevice(portFrom, portTo, pollingInterval, traceLog) {
	BillAcceptor.PollingInterval = pollingInterval;
	BillAcceptor.TraceLog = traceLog;
	var rval = BillAcceptor.WideOpenDevice(portFrom, portTo);
	debugOut("BillAcceptor::WideOpenDevice()->" + rval);
	return rval;
}

function BAUInitialize() {
	var rval = BillAcceptor.InitializeDevice();
	debugOut("BillAcceptor::InitializeDevice()->" + rval);
	return rval;
}

function BAUAcceptBill() { 
	var rval = BillAcceptor.AcceptBill();
	debugOut("BillAcceptor::AcceptBill()->" + rval);
	return rval;
}

function BAUAcceptBookmark() {
	var rval = BillAcceptor.AcceptBookmark();
	debugOut("BillAcceptor::AcceptBookmark()->" + rval);
	return rval;
}

function BAUCancelAccept() {
	var rval = BillAcceptor.CancelAccept();
	debugOut("BillAcceptor::CancelAccept()->" + rval);
	return rval;
}

function BAUStackBill() {
	var rval = BillAcceptor.StackBill();
	debugOut("BillAcceptor::StackBill()->" + rval);
	return rval;
}

function BAUReturnBill() {
	var rval = BillAcceptor.ReturnBill();
	debugOut("BillAcceptor::ReturnBill()->" + rval);
	return rval;
}

function BAUSetCalibration() {
	var rval = BillAcceptor.SetCalibration();
	debugOut("BillAcceptor::SetCalibration()->" + rval);
	return rval;
}

function BAUClose() {
	var rval = BillAcceptor.CloseDevice();
	debugOut("BillAcceptor::CloseDevice()->" + rval);
	return rval;
}

//////////////////////////////////
// Bill Acceptor event handlers //
//////////////////////////////////
function BillAcceptor_DeviceOpened(OpenedPortNumber) {
	debugOut("Bill Acceptor Opened. Port Number: " + OpenedPortNumber);
	BAUInitialize();
}

function BillAcceptor_DeviceClosed() {
	debugOut("Bill Acceptor Closed.");
	if (onClosed) onClosed();
}

function BillAcceptor_InitializeCompleted() {
	debugOut("Bill Acceptor Initialized.");
	BAUAcceptBill();
}

function BillAcceptor_AcceptCanceled() {
	debugOut("Bill Acceptor - Accept Canceled.");
}

function BillAcceptor_AcceptTimeout() {
	debugOut("Bill Acceptor - Accept Timeout.");
	BAUAcceptBill();
}

function BillAcceptor_BillAccepted(bill) {
	debugOut("Bill Acceptor - Bill Accepted. Denomination: $" + bill);
}

function BillAcceptor_BillCheated() {
	debugOut("Bill Acceptor - Bill Cheated.");
}

function BillAcceptor_BillRejected() {
	debugOut("Bill Acceptor - Bill Rejected.");
	BAUAcceptBill();
}

function BillAcceptor_BillReturned() {
	debugOut("Bill Acceptor - Bill Returned.");
}

function BillAcceptor_BillStacked(bill) {
	debugOut("Bill Acceptor - Bill Stacked." + bill);
	BAUAcceptBill();
	if (onBillStacked) onBillStacked(bill);
}

function BillAcceptor_BillReturnTimeout() {
	debugOut("Bill Acceptor - Bill Return Timeout.");
}

function BillAcceptor_CalibrationCompleted() {
	debugOut("Bill Acceptor - Calibration Completed.");
}

function BillAcceptor_DeviceError(reason) {
	debugOut("Bill Acceptor - Device Error." + reason);
}

function BillAcceptor_DevicePowerUp() {
	debugOut("Bill Acceptor - Device Power Up.");
}

function BillAcceptor_EnteringCalibration() {
	debugOut("Bill Acceptor - Entering Calibration.");
}

function BillAcceptor_StatusChanged(ChangedStatus, PrevStatus, CurrentStatus) {
	//debugOut("Bill Acceptor - Status Changed. (Changed, Prev, Current) " +
	//					"= (" + changedStatus + ", " + prevStatus + ", ".currentStatus + ")");
}
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=DeviceOpened(OpenedPortNumber)>
<!--
 BillAcceptor_DeviceOpened(OpenedPortNumber)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=DeviceClosed>
<!--
 BillAcceptor_DeviceClosed()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=InitializeCompleted>
<!--
 BillAcceptor_InitializeCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=AcceptCanceled()>
<!--
 BillAcceptor_AcceptCanceled()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=AcceptTimeout()>
<!--
 BillAcceptor_AcceptTimeout()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=BillAccepted(Bill)>
<!--
 BillAcceptor_BillAccepted(Bill)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="BillCheated()">
<!--
BillAcceptor_BillCheated()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="BillRejected()">
<!--
BillAcceptor_BillRejected()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=BillReturned()>
<!--
 BillAcceptor_BillReturned()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="BillStacked(Bill)">
<!--
BillAcceptor_BillStacked(Bill)
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=BillReturnTimeout()>
<!--
 BillAcceptor_BillReturnTimeout()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=CalibrationCompleted>
<!--
 BillAcceptor_CalibrationCompleted()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="StatusChanged(StatusType, PrevStatus, CurrentStatus)">
<!--
BillAcceptor_StatusChanged(StatusType, PrevStatus, CurrentStatus)
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="DevicePowerUp()">
<!--
BillAcceptor_DevicePowerUp()
//-->
</SCRIPT>                                           
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT="EnteringCalibration()">
<!--
BillAcceptor_EnteringCalibration()
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript FOR=BillAcceptor EVENT=DeviceError(Reason)>
<!--
 BillAcceptor_DeviceError(Reason)
//-->
</SCRIPT>