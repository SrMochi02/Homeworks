<?php
require_once __DIR__ . '/../datos/CategoriaDatos.php';

class CategoriaNegocio
{
    private $categoriaDatos;

    public function __construct()
    {
        $this->categoriaDatos = new CategoriaDatos();
    }

    public function listarCategorias()
    {
        return $this->categoriaDatos->listarCategorias();
    }

    private function validarCategoria($datos)
    {
        $errores = [];

        if (!isset($datos['Nombre']) || empty(trim($datos['Nombre']))) {
            $errores[] = "El nombre de la categoría es obligatorio.";
        }

        if (strlen(trim($datos['Nombre'])) > 255) {
            $errores[] = "El nombre de la categoría no debe superar los 255 caracteres.";
        }

        return $errores;
    }

    public function crearCategoria($datos)
    {
        $errores = $this->validarCategoria($datos);

        if (!empty($errores)) {
            return ['exito' => false, 'errores' => $errores];
        }

        $categoria = ['Nombre' => trim($datos['Nombre'])];
        $resultado = $this->categoriaDatos->insertarCategoria($categoria);

        return [
            'exito' => $resultado,
            'mensaje' => $resultado ? 'Categoría registrada correctamente.' : 'No se pudo registrar la categoría.'
        ];
    }

    public function obtenerCategoriaPorId($idCategoria)
    {
        if (!is_numeric($idCategoria) || $idCategoria <= 0) {
            return null;
        }
        return $this->categoriaDatos->obtenerCategoriaPorId($idCategoria);
    }

    public function actualizarCategoria($datos)
    {
        $errores = $this->validarCategoria($datos);

        if (!isset($datos['IdCategoria']) || empty($datos['IdCategoria'])) {
            $errores[] = "El identificador de la categoría es obligatorio.";
        }

        if (!empty($errores)) {
            return ['exito' => false, 'errores' => $errores];
        }

        $categoria = [
            'IdCategoria' => (int)$datos['IdCategoria'],
            'Nombre' => trim($datos['Nombre'])
        ];

        $resultado = $this->categoriaDatos->actualizarCategoria($categoria);

        return [
            'exito' => $resultado,
            'mensaje' => $resultado ? 'Categoría actualizada correctamente.' : 'No se pudo actualizar la categoría.'
        ];
    }

    public function eliminarCategoria($idCategoria)
    {
        if (!is_numeric($idCategoria) || $idCategoria <= 0) {
            return false;
        }
        return $this->categoriaDatos->eliminarCategoria($idCategoria);
    }
}
?>
