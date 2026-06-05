<?php

require_once __DIR__.'/Conexion.php';

class ClienteDatos
{
    public function listarClientes()
    {
        $conexion = new Conexion();

        $conexion->query = "SELECT IdCliente, Nombre, DUI, NIT, Telefono,
                            Direccion, Tipo, NRC, Eliminado
                            FROM tbl_clientes
                            WHERE Eliminado = 'N'
                            ORDER BY IdCliente DESC";

        return $conexion->get_records();
    }


    private function valorNulo($valor)
    {
        return trim($valor) === '' ? null : trim($valor);
    }

    public function insertarCliente($cliente)
    {
        $conexion = new Conexion();

        $conexion->query = "INSERT INTO tbl_clientes (Nombre, DUI, NIT, Telefono,
        Direccion, Tipo, NRC, Eliminado)
        VALUES (:nombre, :dui, :nit, :telefono, :direccion, :tipo,
        :nrc, 'N')";

        return $conexion->execute_query([
            ':nombre'   => $cliente['Nombre'],
            ':dui'      => $this->valorNulo($cliente['DUI']),
            ':nit'      => $this->valorNulo($cliente['NIT']),
            ':telefono' => $this->valorNulo($cliente['Telefono']),
            ':direccion'=> $this->valorNulo($cliente['Direccion']),
            ':tipo'     => $this->valorNulo($cliente['Tipo']),
            ':nrc'      => $this->valorNulo($cliente['NRC'])
        ]);
    }


    public function actualizarCliente($cliente)
    {
        $conexion = new Conexion();

        $conexion->query = "UPDATE tbl_clientes 
                            SET Nombre = :nombre, 
                                DUI = :dui,
                                NIT = :nit, 
                                Telefono = :telefono, 
                                Direccion = :direccion,
                                Tipo = :tipo, 
                                NRC = :nrc
                            WHERE IdCliente = :idCliente";

        return $conexion->execute_query([
            ':nombre'    => $cliente['Nombre'],
            ':dui'       => $this->valorNulo($cliente['DUI']),
            ':nit'       => $this->valorNulo($cliente['NIT']),
            ':telefono'  => $this->valorNulo($cliente['Telefono']),
            ':direccion' => $this->valorNulo($cliente['Direccion']),
            ':tipo'      => $this->valorNulo($cliente['Tipo']),
            ':nrc'       => $this->valorNulo($cliente['NRC']),
            ':idCliente' => $cliente['IdCliente']
        ]);
    }


    public function obtenerClientePorId($idCliente)
    {
        $conexion = new Conexion();

        $conexion->query = "SELECT IdCliente, Nombre, DUI, NIT, Telefono, Direccion,
                            Tipo, NRC, Eliminado
                            FROM tbl_clientes
                            WHERE IdCliente = :idCliente
                            AND Eliminado = 'N'";

        return $conexion->get_record([
            ':idCliente' => $idCliente
        ]);
    }


    public function eliminarCliente($idCliente)
    {
        $conexion = new Conexion();

        $conexion->query = "UPDATE tbl_clientes
                            SET Eliminado = 'S'
                            WHERE IdCliente = :idCliente";

        return $conexion->execute_query([
            ':idCliente' => $idCliente
        ]);
    }



}



?>