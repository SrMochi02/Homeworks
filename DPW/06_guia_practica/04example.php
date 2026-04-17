<?php

echo "<h2>Resultados con IF</h2><hr>";

$count = 2;
$zero_value = 0;
$one_value = 1;
$two_value = 2;

if ($count == $zero_value) {
	echo "El contador es igual a {$zero_value}<br>";
} 
elseif ($count == $one_value) {
	echo "El contador es igual a {$one_value}<br>";
}
elseif ($count == $two_value) {
	echo "El contador es igual a {$two_value}<br>";
}
else {
	echo "El valor del contador {$count} tiene un valor diferente de: {$zero_value}, {$one_value} y {$two_value}";
}

echo "<h2>Resultados con SWITCH</h2><hr>";

switch ($count) {

case 0: 
	echo "EL contador es igual a {$zero_value}";
	break;

case 1:
	echo "El contador es igual a {$one_value}";
	break;
	
case 2:
	echo "El contador es igual a {$two_value}";
	break;

default:
	echo "El contador {$i} tiene un valor diferente de {$zero_value}, {$one_value} y {$two_value}";

}



?>
