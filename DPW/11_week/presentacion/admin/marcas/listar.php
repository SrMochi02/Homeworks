<?php

require_once __DIR__ . '/../../../negocio/MarcaNegocio.php';

$marcaNegocio = new MarcaNegocio();

$marcas = $marcaNegocio->listarMarcas();

$mensaje = $_GET['mensaje'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de marcas</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h4>Listado de marcas</h4>

            <a href="crear.php" class="btn btn-light">
                Nueva marca
            </a>
        </div>

        <div class="card-body">

            <?php if ($mensaje === 'creado'): ?>
                <div class="alert alert-success">
                    Marca registrada correctamente.
                </div>
            <?php endif; ?>

            <?php if ($mensaje === 'actualizado'): ?>
                <div class="alert alert-success">
                    Marca actualizada correctamente.
                </div>
            <?php endif; ?>

            <?php if ($mensaje === 'eliminado'): ?>
                <div class="alert alert-danger">
                    Marca eliminada correctamente.
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($marcas as $marca): ?>

                    <tr>

                        <td><?= $marca['IdMarca'] ?></td>

                        <td><?= htmlspecialchars($marca['NombreMarca']) ?></td>

                        <td>

                            <a
                                href="editar.php?id=<?= $marca['IdMarca'] ?>"
                                class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <a
                                href="eliminar.php?id=<?= $marca['IdMarca'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea eliminar esta marca?')">
                                Eliminar
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="../../../public/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>