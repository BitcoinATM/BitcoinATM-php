<?php
require_once 'bitcoinURL.php';
require_once 'jsonRPCClient.php';
require_once '../MessageLog.php';
function sendToAddress($address, $amount) {
	try {
		$amount = round($amount, 8);
		$bitcoin = new jsonRPCClient(kBitcoinURL);
		$txid = $bitcoin->sendtoaddress($address, floatval($amount));
		$log = new MessageLog('log', 255);
		$log->write("mywallet-bitcoin:$address BTC:$amount txid:$txid");
		return $txid;
	}
	catch (Exception $e) {
		return "Error: ".$e->getMessage();
	}
}
?>