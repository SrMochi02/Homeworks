<?php

require_once __DIR__ . '/../../../negocio/ClienteNegocio.php';

$clienteNegocio = new ClienteNegocio();

$errores = [];

$idCliente = $_GET['id'] ?? null;

if (!$idCliente) {
    header("Location: listar.php");
    exit;
}

$cliente = $clienteNegocio->obtenerClientePorId($idCliente);

if (!$cliente) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'IdCliente' => $_POST['IdCliente'] ?? '',
        'NombreCliente' => $_POST['NombreCliente'] ?? '',
        'DUI' => $_POST['DUI'] ?? '',
        'NIT' => $_POST['NIT'] ?? '',
        'Telefono' => $_POST['Telefono'] ?? '',
        'Direccion' => $_POST['Direccion'] ?? ''
    ];

    $resultado = $clienteNegocio->actualizarCliente($datos);

    if ($resultado['exito']) {
        header("Location: listar.php?mensaje=actualizado");
        exit;
    } else {
        $errores = $resultado['errores'];
        $cliente = $datos;
    }
}


function mostrarvalor($valor){
    return htmlspecialchars($valor ?? '',ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar cliente</title>
    <link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Editar cliente</h4>
            </div>

            <div class="card-body">
                <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errores as $error): ?>
                                <li><?php echo mostrarValor($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form method="POST" action="editar.php?id=<?php echo mostrarValor($cliente['IdCliente']); ?>">
                    <input type="hidden" name="IdCliente" value="<?php echo mostrarValor($cliente['IdCliente']); ?>">

                    <div class="mb-3">
                        <label class="form-label">Nombre del cliente</label>
                        <input type="text" name="NombreCliente" class="form-control" value="<?php echo mostrarValor($cliente['NombreCliente']); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">DUI</label>
                        <input type="text" name="DUI" class="form-control" value="<?php echo mostrarValor($cliente['DUI']); ?>" placeholder="12345678-9">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NIT</label>
                        <input type="text" name="NIT" class="form-control" value="<?php echo mostrarValor($cliente['NIT']); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="Telefono" class="form-control" value="<?php echo mostrarValor($cliente['Telefono']); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <textarea name="Direccion" class="form-control" rows="3"><?php echo mostrarValor($cliente['Direccion']); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar cliente</button>
                    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                </form>

            </div>
        </div>

    </div>

    <script src="../../../public/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

