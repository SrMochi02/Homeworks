<?php

require_once __DIR__ . '/../../../negocio/CategoriaNegocio.php';

$categoriaNegocio = new CategoriaNegocio();

$categorias = $categoriaNegocio->listarCategorias();

$mensaje = $_GET['mensaje'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h4>Categorías</h4>
            <a href="crear.php" class="btn btn-light">Nueva</a>
        </div>

        <div class="card-body">

            <?php if ($mensaje === 'creado'): ?>
                <div class="alert alert-success">Categoría creada</div>
            <?php endif; ?>

            <?php if ($mensaje === 'actualizado'): ?>
                <div class="alert alert-success">Categoría actualizada</div>
            <?php endif; ?>

            <?php if ($mensaje === 'eliminado'): ?>
                <div class="alert alert-danger">Categoría eliminada</div>
            <?php endif; ?>

            <table class="table table-bordered">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($categorias as $c): ?>
                    <tr>
                        <td><?= $c['IdCategoria'] ?></td>
                        <td><?= htmlspecialchars($c['NombreCategoria']) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $c['IdCategoria'] ?>"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <a href="eliminar.php?id=<?= $c['IdCategoria'] ?>"
                               class="btn btn-danger btn-sm">
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

</body>
</html>