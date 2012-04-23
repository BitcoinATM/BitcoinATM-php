<?php
require_once 'account1.php';
require_once 'mtgoxQueryTools.php';

echo '<p>spot price: '.getSpot().'</p>';
echo '<p>you have $'.getBalanceUSD().' and &#3647;'.getBalanceBTC().'</p>';
?>