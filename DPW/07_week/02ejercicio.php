<?php

$alumnos_clase = array(

	"Juan",
	"Antonio",
	"Alexander",
	"Osvaldo",
	"Henry",
	"Miguel",
	"Cristian",
	"David",
	"Jonathan",
	"Carlos"
);

echo "<table border='1' cellspacing='0' cellpading='0'>";

foreach($alumnos_clase as $i) {

	echo "<tr>";
	echo "<td>". $i. "</td>";
	echo "</tr>";
}

echo "</table>"

?>
