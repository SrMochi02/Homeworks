<?php

require_once __DIR__ . '/../../../negocio/CategoriaNegocio.php';

$categoriaNegocio = new CategoriaNegocio();

$errores = [];

$datos = [
    'NombreCategoria' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datos = [
        'NombreCategoria' => $_POST['NombreCategoria'] ?? ''
    ];

    $resultado = $categoriaNegocio->crearCategoria($datos);

    if ($resultado['exito']) {
        header("Location: listar.php?mensaje=creado");
        exit;
    } else {
        $errores = $resultado['errores'];
    }
}

function e($v)
{
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar categoría</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Registrar categoría</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errores as $error): ?>
                            <li><?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label>Nombre de la categoría</label>
                    <input type="text"
                           name="NombreCategoria"
                           class="form-control"
                           value="<?= e($datos['NombreCategoria']) ?>">
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>