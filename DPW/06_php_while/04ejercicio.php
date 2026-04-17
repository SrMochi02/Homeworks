<?php

$i = 1;

while ($i <= 10) {

	if ($i == 4 || $i == 6) {
		$i++;
		continue;
	} else {
		echo "E valor de i es: {$i}<br>\n";
	}

	$i++;
}

?>
