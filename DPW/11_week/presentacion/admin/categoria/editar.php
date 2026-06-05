<?php

require_once __DIR__ . '/../../../negocio/CategoriaNegocio.php';

$categoriaNegocio = new CategoriaNegocio();

$id = $_GET['id'] ?? null;

$categoria = $categoriaNegocio->obtenerCategoriaPorId($id);

if (!$categoria) {
    header("Location: listar.php");
    exit;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datos = [
        'IdCategoria' => $_POST['IdCategoria'],
        'NombreCategoria' => $_POST['NombreCategoria']
    ];

    $resultado = $categoriaNegocio->actualizarCategoria($datos);

    if ($resultado['exito']) {
        header("Location: listar.php?mensaje=actualizado");
        exit;
    } else {
        $errores = $resultado['errores'];
        $categoria = $datos;
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
    <title>Editar categoría</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Editar categoría</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST">

                <input type="hidden" name="IdCategoria" value="<?= $categoria['IdCategoria'] ?>">

                <div class="mb-3">
                    <label>Nombre de la categoría</label>
                    <input type="text"
                           name="NombreCategoria"
                           class="form-control"
                           value="<?= e($categoria['NombreCategoria']) ?>">
                </div>

                <button class="btn btn-success">Actualizar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>