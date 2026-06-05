<?php

require_once __DIR__ . '/../../../negocio/CategoriaNegocio.php';

$categoriaNegocio = new CategoriaNegocio();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: listar.php");
    exit;
}

$categoria = $categoriaNegocio->obtenerCategoriaPorId($id);

if (!$categoria) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['IdCategoria'];

    $resultado = $categoriaNegocio->eliminarCategoria($id);

    if ($resultado) {
        header("Location: listar.php?mensaje=eliminado");
        exit;
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
    <title>Eliminar categoría</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-danger text-white">
            <h4>Eliminar categoría</h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning">
                ¿Seguro que deseas eliminar esta categoría?
            </div>

            <p><b>ID:</b> <?= e($categoria['IdCategoria']) ?></p>
            <p><b>Nombre:</b> <?= e($categoria['NombreCategoria']) ?></p>

            <form method="POST">

                <input type="hidden" name="IdCategoria" value="<?= $categoria['IdCategoria'] ?>">

                <button class="btn btn-danger">Sí, eliminar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>