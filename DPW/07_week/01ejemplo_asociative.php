<?php
//definimos un arreglo asociativo con 5 valores
$persona = array(
	
	"nombre" => "Juan",
	"apellido" => "Pérez",
	"edad" => 30,
	"pais" => "El Salvador",
	"profesion" => "Ingeniero"

);

//accedemos a elementos del arreglo y mostramos en pantalla

echo "Nombre: ". $persona["nombre"]. "<br>";
echo "Apellido: ". $persona["apellido"]. "<br>";
echo "Edad: ". $persona["edad"]. "<br>";
echo "Pais: ". $persona["pais"]. "<br>";
echo "Profesión: ". $persona["profesion"]. "<br>";

?>
