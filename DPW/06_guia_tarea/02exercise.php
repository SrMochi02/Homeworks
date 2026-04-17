<?php
$counter = 0;
const LIMIT_COUNTER = 200;
const DENIED_VALUE1 = 50;
const DENIED_VALUE2 = 125;

while($counter < LIMIT_COUNTER) {

	$counter++;

	if($counter >= DENIED_VALUE1 && $counter <= DENIED_VALUE2) {
		continue;
	}
	else {
		echo "El valor del contador es: {$counter}<br>";
	}
}

?>
