<?php

$estudiante = array(

    "nombre" => "Raul Isaias",
    "apellidos" => "Hernandez Lopez",
    "edad" => 19,
    "estatura" => 168,
    "direccion" => "San Miguel 6ta calle ote Casa #5 col.15 de septiembre",
    "codigo" => "047925",
    "institucion" => "ITCA"
 

);

echo "Nombres: ". $estudiante["nombre"]. "<br>";
echo "apellidos: ". $estudiante["apellidos"]. "<br>";
echo "Edad: ". $estudiante["edad"]. "<br>";
echo "Estatura: ". $estudiante["estatura"], "cm<br>";
echo "Direccion: ". $estudiante["direccion"]. "<br>";
echo "Codigo estudiante: ". $estudiante["codigo"];
echo "Institucion: ". $estudiante["institucion"]

?>