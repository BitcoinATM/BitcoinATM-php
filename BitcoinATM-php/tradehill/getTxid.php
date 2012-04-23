<?php
$status = 'Funds are on their way (bitcoin transaction: f1227dae-eeae-4735-b1b9-e89b66aa9482) [reference] => 84c47d47-bc40-4392-895c-46a80a19a810';
$pattern = '/bitcoin transaction\:.*\)/';
preg_match($pattern, $status, $rval);
$txid = substr($rval[0], -37, 36);
print_r($txid);
?>