<?php

require_once __DIR__.'/Conexion.php';

class ClienteDatos
{
    public function listarClientes()
    {
        $conexion = new Conexion();

        $conexion->query= "SELECT IdCliente, NombreCliente, DUI, NIT, Telefono, Direccion FROM tbl_clientes ORDER BY IdCliente DESC";

        return $conexion->get_records();
    }

    private function valorNulo($valor)
    {
        return trim($valor) === '' ? null : trim($valor);
    }

    public function insertarCliente($cliente)
    {
        $conexion = new Conexion();

        $conexion->query = "INSERT INTO tbl_clientes(NombreCliente, DUI, NIT, Telefono, Direccion)
            VALUES (:nombre, :dui, :nit, :telefono, :direccion)";

        return $conexion->execute_query([
            ':nombre'   => $cliente['NombreCliente'],
            ':dui'      => $this->valorNulo($cliente['DUI']),
            ':nit'      => $this->valorNulo($cliente['NIT']),
            ':telefono' => $this->valorNulo($cliente['Telefono']),
            ':direccion'=> $this->valorNulo($cliente['Direccion'])
        ]);
    }


}



?>