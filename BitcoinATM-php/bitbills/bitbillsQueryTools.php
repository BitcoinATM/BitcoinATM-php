<?php
require_once 'mtgoxQuery.php';

function getSpot() {
	$data = mtgox_query('0/data/ticker.php');
	return $data['ticker']['last'];
}

function getBalance() {
	$date = mtgox_query('0/getFunds.php');
	return $data;
}
?>