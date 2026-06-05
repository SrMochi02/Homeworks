<?php
// =========================
// NEGOCIO: Marcas
// =========================
require_once __DIR__ . '/../datos/MarcaDatos.php';

class MarcaNegocio
{
    private $marcaDatos;

    public function __construct()
    {
        $this->marcaDatos = new MarcaDatos();
    }

    public function listarMarcas()
    {
        return $this->marcaDatos->listarMarcas();
    }

    private function validarMarca($datos)
    {
        $errores = [];
        if (!isset($datos['Nombre']) || empty(trim($datos['Nombre']))) {
            $errores[] = "El nombre de la marca es obligatorio.";
        }
        if (strlen(trim($datos['Nombre'])) > 255) {
            $errores[] = "El nombre de la marca no debe superar los 255 caracteres.";
        }
        return $errores;
    }

    public function crearMarca($datos)
    {
        $errores = $this->validarMarca($datos);
        if (!empty($errores)) {
            return ['exito' => false, 'errores' => $errores];
        }
        $marca = ['Nombre' => trim($datos['Nombre'])];
        $resultado = $this->marcaDatos->insertarMarca($marca);
        return ['exito' => $resultado, 'mensaje' => $resultado ? 'Marca registrada correctamente.' : 'No se pudo registrar la marca.'];
    }

    public function obtenerMarcaPorId($idMarca)
    {
        if (!is_numeric($idMarca) || $idMarca <= 0) return null;
        return $this->marcaDatos->obtenerMarcaPorId($idMarca);
    }

    public function actualizarMarca($datos)
    {
        $errores = $this->validarMarca($datos);
        if (!isset($datos['IdMarca']) || empty($datos['IdMarca'])) {
            $errores[] = "El identificador de la marca es obligatorio.";
        }
        if (!empty($errores)) {
            return ['exito' => false, 'errores' => $errores];
        }
        $marca = ['IdMarca' => (int)$datos['IdMarca'], 'Nombre' => trim($datos['Nombre'])];
        $resultado = $this->marcaDatos->actualizarMarca($marca);
        return ['exito' => $resultado, 'mensaje' => $resultado ? 'Marca actualizada correctamente.' : 'No se pudo actualizar la marca.'];
    }

    public function eliminarMarca($idMarca)
    {
        if (!is_numeric($idMarca) || $idMarca <= 0) return false;
        return $this->marcaDatos->eliminarMarca($idMarca);
    }
}
?>
