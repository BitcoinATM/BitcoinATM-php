<?php
require_once 'accountTodd.php';
require_once 'exchangeQueryTools.php';

$rval = withdrawBTC('1CAsPmYj5LAUb28AmgDNiGHLme6tr1xn5E', .1);
echo isset($rval['error']);
?>