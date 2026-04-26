<?php

$contacto = array(
    "nombre" => "Juan Ernesto García Fernández",
    "parentesco" => "Tío",
    "telefono" => "7890-4567",
    "direccion" => "Cuscatlan, San Salvador",
    "correo" => "juanernesto78@gmail.com"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .contenedor {
            background-color: rgb(228, 228, 228);
            border-radius: 6px;
            height: auto;
            width: 500px;
            padding: 12px;
            
        }
    </style>
    <div class="contenedor">
        <p>🏷️Nombre: <?= $contacto['nombre']?></p>
        <p>👤Parentesco <?= $contacto['parentesco']?></p>
        <p>📞Telefono <?= $contacto['telefono']?></p>
        <p>🏠Dirección: <?= $contacto['direccion']?></p>
        <p>✉️Correo: <?= $contacto['correo']?></p>
    </div>

</body>
</html>