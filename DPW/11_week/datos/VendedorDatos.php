<?php
require_once __DIR__.'/Conexion.php';

class VendedorDatos {
    public function listarVendedores() {
        $conexion = new Conexion();
        $conexion->query = "SELECT IdVendedor, NombreVendedor, DUI, NIT, Telefono FROM tbl_vendedores ORDER BY IdVendedor DESC";
        return $conexion->get_records();
    }

    public function insertarVendedor($vendedor) {
        $conexion = new Conexion();
        $conexion->query = "INSERT INTO tbl_vendedores(NombreVendedor, DUI, NIT, Telefono)
                            VALUES (:nombre, :dui, :nit, :telefono)";
        return $conexion->execute_query([
            ':nombre'=>$vendedor['NombreVendedor'],
            ':dui'=>$vendedor['DUI'],
            ':nit'=>$vendedor['NIT'],
            ':telefono'=>$vendedor['Telefono']
        ]);
    }

    public function actualizarVendedor($vendedor) {
        $conexion = new Conexion();
        $conexion->query = "UPDATE tbl_vendedores SET NombreVendedor=:nombre, DUI=:dui, NIT=:nit, Telefono=:telefono WHERE IdVendedor=:id";
        return $conexion->execute_query([
            ':nombre'=>$vendedor['NombreVendedor'],
            ':dui'=>$vendedor['DUI'],
            ':nit'=>$vendedor['NIT'],
            ':telefono'=>$vendedor['Telefono'],
            ':id'=>$vendedor['IdVendedor']
        ]);
    }

    public function obtenerVendedorPorId($id) {
        $conexion = new Conexion();
        $conexion->query = "SELECT IdVendedor, NombreVendedor, DUI, NIT, Telefono FROM tbl_vendedores WHERE IdVendedor=:id";
        return $conexion->get_record([ ':id'=>$id ]);
    }

    public function eliminarVendedor($id) {
        $conexion = new Conexion();
        $conexion->query = "DELETE FROM tbl_vendedores WHERE IdVendedor=:id";
        return $conexion->execute_query([ ':id'=>$id ]);
    }
}
?>
