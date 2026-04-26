<?php
// Fila 1
$estudiantes[0] = array(
    "nombre" => "Marisela Serpas",
    "carnet" => "25671",
    "carrera" => "Desarrollo de Software",
    "grupo" => "DES2-A"
);

// Fila 2
$estudiantes[1] = array(
    "nombre" => "Kevin Bermúdez",
    "carnet" => "88398",
    "carrera" => "Gastronomía",
    "grupo" => "GAS1-B"
);

// Fila 3
$estudiantes[2] = array(
    "nombre" => "Mindy Guevara",
    "carnet" => "99371",
    "carrera" => "Turismo",
    "grupo" => "TUR2-A"
);

// Recorremos el arreglo por medio de un bucle FOR
$total_filas = count($estudiantes);

for ($i = 0; $i < $total_filas; $i++) {
    echo "Estudiante: {$estudiantes[$i]["nombre"]} <br>";
    echo "Carnet: {$estudiantes[$i]["carnet"]} <br>";
    echo "Carrera: {$estudiantes[$i]["carrera"]} <br>";
    echo "Grupo: {$estudiantes[$i]["grupo"]} <br><br>";
}
?>