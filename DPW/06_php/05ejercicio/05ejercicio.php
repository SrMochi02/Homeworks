<?php
$multiplicando = 2;
$limite = 20;
$producto = 0;

for ($i = 1; $i <= $limite; $i++) {
	$producto = $multiplicando * $i;
	echo "{$multiplicando} x {$i} = {$producto} <br>\n";
}

?>
