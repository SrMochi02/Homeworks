<?php

require_once __DIR__ . '/../../../negocio/VendedorNegocio.php';

$vendedorNegocio = new VendedorNegocio();

$id = $_GET['id'] ?? null;

$vendedor = $vendedorNegocio->obtenerVendedorPorId($id);

if (!$vendedor) {
    header("Location: listar.php");
    exit;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datos = [
        'IdVendedor' => $_POST['IdVendedor'],
        'NombreVendedor' => $_POST['NombreVendedor'],
        'DUI' => $_POST['DUI'],
        'Telefono' => $_POST['Telefono']
    ];

    $resultado = $vendedorNegocio->actualizarVendedor($datos);

    if ($resultado['exito']) {
        header("Location: listar.php?mensaje=actualizado");
        exit;
    } else {
        $errores = $resultado['errores'];
        $vendedor = $datos;
    }
}

function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar vendedor</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Editar vendedor</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errores as $e): ?>
                            <li><?= e($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST">

                <input type="hidden" name="IdVendedor" value="<?= $vendedor['IdVendedor'] ?>">

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="NombreVendedor" class="form-control"
                           value="<?= e($vendedor['NombreVendedor']) ?>">
                </div>

                <div class="mb-3">
                    <label>DUI</label>
                    <input type="text" name="DUI" class="form-control"
                           value="<?= e($vendedor['DUI']) ?>">
                </div>

                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono" class="form-control"
                           value="<?= e($vendedor['Telefono']) ?>">
                </div>

                <button class="btn btn-success">Actualizar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>