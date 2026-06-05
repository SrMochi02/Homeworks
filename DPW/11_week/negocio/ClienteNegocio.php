<?php

require_once __DIR__ . '/../datos/ClienteDatos.php';

class ClienteNegocio
{
    private $clienteDatos;

    public function __construct()
    {
        $this->clienteDatos = new ClienteDatos();
    }

    public function listarClientes(){
        return $this->clienteDatos->listaClientes();
    }

    
}

?>