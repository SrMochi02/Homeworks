<?php

$dias_semana = array("Lunes", "Martes", "Miercoles", "Jueves",
	"Viernes", "Sabado", "Domingo");

for($i = 0; $i <= $dias_semana[$i]; $i++){
	echo "<ul>";
	echo "<li>". $dias_semana[$i] ."</li>";
	echo "</ul>";
}

?>
