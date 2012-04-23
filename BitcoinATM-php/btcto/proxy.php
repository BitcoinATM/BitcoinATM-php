<?php
//Proxies a btc.to API request
$daurl = 'http://btc.to/'.$_GET['address'];
$handle = fopen($daurl, "r");
if ($handle) {
	while (!feof($handle)) {
		$buffer = fgets($handle, 4096);
		echo $buffer;
	}
	fclose($handle);
}
?>