<?php

$curso = array(
    "nombre_curso" => "Tecnico en electricidad",
    "codigo_curso" => "TEC_ET01",
    "num_estudiantes" => 16,
    "docente_encargado" => "Jhony Flores",
    "modalidad" => "Presencial"
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
            border-radius: 10px;
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
    <div class="card">
        <h2>Curso: <?= $curso['nombre_curso'] ?></h2>
        <p><strong>Código:</strong> <?= $curso['codigo_curso'] ?></p>
        <p><strong>Docente:</strong> <?= $curso['docente_encargado'] ?></p>
        <p><strong>Modalidad:</strong> <?= $curso['modalidad'] ?></p>
        <p><strong>Estudiantes inscritos:</strong> <?= $curso['num_estudiantes'] ?></p>
        
        <?php if ($curso['num_estudiantes'] > 10): ?>
            <div class="alerta">
                ⚠️ ¡Curso con alta demanda!
            </div>
        <?php endif; ?>
</div>
</body>
</html>