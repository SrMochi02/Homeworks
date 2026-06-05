<?php

require_once __DIR__ . '/../../../negocio/VendedorNegocio.php';

$vendedorNegocio = new VendedorNegocio();

$vendedores = $vendedorNegocio->listarVendedores();

$mensaje = $_GET['mensaje'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vendedores</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h4>Vendedores</h4>
            <a href="crear.php" class="btn btn-light">Nuevo</a>
        </div>

        <div class="card-body">

            <?php if ($mensaje == 'creado'): ?>
                <div class="alert alert-success">Vendedor creado</div>
            <?php endif; ?>

            <?php if ($mensaje == 'actualizado'): ?>
                <div class="alert alert-success">Vendedor actualizado</div>
            <?php endif; ?>

            <?php if ($mensaje == 'eliminado'): ?>
                <div class="alert alert-danger">Vendedor eliminado</div>
            <?php endif; ?>

            <table class="table table-bordered">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DUI</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($vendedores as $v): ?>
                    <tr>
                        <td><?= $v['IdVendedor'] ?></td>
                        <td><?= htmlspecialchars($v['NombreVendedor']) ?></td>
                        <td><?= htmlspecialchars($v['DUI']) ?></td>
                        <td><?= htmlspecialchars($v['Telefono']) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $v['IdVendedor'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $v['IdVendedor'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>