<?php

require_once __DIR__ . '/../../../negocio/VendedorNegocio.php';

$vendedorNegocio = new VendedorNegocio();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: listar.php");
    exit;
}

$vendedor = $vendedorNegocio->obtenerVendedorPorId($id);

if (!$vendedor) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['IdVendedor'];

    $resultado = $vendedorNegocio->eliminarVendedor($id);

    if ($resultado) {
        header("Location: listar.php?mensaje=eliminado");
        exit;
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
    <title>Eliminar vendedor</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-danger text-white">
            <h4>Eliminar vendedor</h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning">
                ¿Seguro que deseas eliminar este vendedor?
            </div>

            <p><b>Nombre:</b> <?= e($vendedor['NombreVendedor']) ?></p>
            <p><b>DUI:</b> <?= e($vendedor['DUI']) ?></p>
            <p><b>Teléfono:</b> <?= e($vendedor['Telefono']) ?></p>

            <form method="POST">

                <input type="hidden" name="IdVendedor" value="<?= $vendedor['IdVendedor'] ?>">

                <button class="btn btn-danger">Sí, eliminar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>