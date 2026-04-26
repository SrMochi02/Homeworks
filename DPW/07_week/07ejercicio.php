<?php

$bebida = array(
    "nombre" => "Monster",
    "tipo" => "Energetica",
    "precio" => 2.35,
    "disponible" => true
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
        .tabla{
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(224, 214, 198);
            text-align: center;
            width: 250px;
            height: auto;
            color: #3b3b3b;
        }
        .disponible{
            color: green;
            font-weight: bold;
        }

        .agotado {
            color: red;
            font-weight: bold;

        }

        
    </style>
    <table class='tabla' border='0' cellpadding='10' cellspacing='0'>
        <tr><td>Campo: </td><td>Valor</td></tr>
        <tr><td>Nombre: </td><td><?= $bebida['nombre']?></td></tr>
        <tr><td>Tipo: </td><td><?= $bebida['tipo']?></td></tr>
        <tr><td>Precio: </td><td><?php echo"$".$bebida['precio']?></td></tr>
        <tr><td>Disponible</td><td class="<?= $bebida['disponible'] ? 'disponible' : 'agotado'?>">
            <?= $bebida['disponible'] ? 'disponible' : 'agotado'?>
        </td>
    </tr>
    </table>
</body>
</html>