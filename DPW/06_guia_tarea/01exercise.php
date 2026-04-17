<?php

$counter = 1;
const DENIED_VALUEA = 45;
const DENIED_VALUEB = 65;
const LIMIT_COUNTER = 100;

for ($counter; $counter <= LIMIT_COUNTER; $counter++) {
	if($counter >= DENIED_VALUEA && $counter <= DENIED_VALUEB) {
		continue;
	} else {
		echo "El valor del contador es : {$counter}<br>";
	}

	
}

?>
