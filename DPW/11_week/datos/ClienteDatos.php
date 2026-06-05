<?php

require_once __DIR__.'/Conexion.php';

class ClienteDatos
{
    public function listaClientes()
    {
        $conexion = new Conexion();

        $conexion->query= "SELECT IdCliente, NombreCliente, DUI, NIT, Telefono, Direccion FROM tbl_clientes ORDER BY IdCliente DESC";

        return $conexion->get_records();
    }

    
}


?>