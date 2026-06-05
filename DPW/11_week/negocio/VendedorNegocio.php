<?php
// negocio/VendedorNegocio.php
require_once __DIR__ . '/../datos/VendedorDatos.php';

class VendedorNegocio {
    private $vendedorDatos;
    public function __construct() { $this->vendedorDatos = new VendedorDatos(); }

    public function listarVendedores() { return $this->vendedorDatos->listarVendedores(); }

    private function validarVendedor($datos) {
        $errores=[];
        if(empty(trim($datos['NombreVendedor']))) $errores[]="El nombre del vendedor es obligatorio.";
        if(!empty($datos['DUI']) && !preg_match('/^[0-9]{8}-?[0-9]{1}$/',$datos['DUI'])) $errores[]="Formato de DUI inválido.";
        if(!empty($datos['Telefono']) && !preg_match('/^[0-9]{4}-?[0-9]{4}$/',$datos['Telefono'])) $errores[]="Formato de teléfono inválido.";
        return $errores;
    }

    public function crearVendedor($datos) {
        $errores=$this->validarVendedor($datos);
        if(!empty($errores)) return ['exito'=>false,'errores'=>$errores];
        $resultado=$this->vendedorDatos->insertarVendedor($datos);
        return ['exito'=>$resultado,'mensaje'=>$resultado?'Vendedor registrado correctamente.':'No se pudo registrar el vendedor.'];
    }

    public function obtenerVendedorPorId($id) {
        if(!is_numeric($id)||$id<=0) return null;
        return $this->vendedorDatos->obtenerVendedorPorId($id);
    }

    public function actualizarVendedor($datos) {
        $errores=$this->validarVendedor($datos);
        if(empty($datos['IdVendedor'])) $errores[]="El identificador es obligatorio.";
        if(!empty($errores)) return ['exito'=>false,'errores'=>$errores];
        $resultado=$this->vendedorDatos->actualizarVendedor($datos);
        return ['exito'=>$resultado,'mensaje'=>$resultado?'Vendedor actualizado correctamente.':'No se pudo actualizar el vendedor.'];
    }

    public function eliminarVendedor($id) {
        if(!is_numeric($id)||$id<=0) return false;
        return $this->vendedorDatos->eliminarVendedor($id);
    }
}
?>
