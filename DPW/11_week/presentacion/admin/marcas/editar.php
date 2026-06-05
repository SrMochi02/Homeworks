<?php

require_once __DIR__ . '/../../../negocio/MarcaNegocio.php';

$marcaNegocio = new MarcaNegocio();

$idMarca = $_GET['id'] ?? 0;

$marca = $marcaNegocio->obtenerMarcaPorId($idMarca);

if (!$marca) {
    die("Marca no encontrada");
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datos = [
        'IdMarca' => $_POST['IdMarca'],
        'NombreMarca' => $_POST['NombreMarca']
    ];

    $resultado = $marcaNegocio->actualizarMarca($datos);

    if ($resultado['exito']) {

        header("Location: listar.php?mensaje=actualizado");
        exit;

    } else {

        $errores = $resultado['errores'];

        $marca = $datos;
    }
}

function mostrarValor($valor)
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar marca</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Editar marca</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($errores)): ?>

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        <?php foreach ($errores as $error): ?>

                            <li><?= mostrarValor($error) ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            <?php endif; ?>

            <form method="POST">

                <input
                    type="hidden"
                    name="IdMarca"
                    value="<?= $marca['IdMarca'] ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Nombre de la marca
                    </label>

                    <input
                        type="text"
                        name="NombreMarca"
                        class="form-control"
                        value="<?= mostrarValor($marca['NombreMarca']) ?>">

                </div>

                <button class="btn btn-success">
                    Actualizar
                </button>

                <a href="listar.php" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>

    </div>

</div>

<script src="../../../public/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>