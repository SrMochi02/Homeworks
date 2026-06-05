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
        return $this->clienteDatos->listarClientes();
    }


/*LIMPIAR DATOS*/
    private function limpiarDatos($datos)
    {
        return [
            'NombreCliente' => trim($datos['NombreCliente']),
            'DUI'           => isset($datos['DUI']) ? trim($datos['DUI']) : '',
            'NIT'           => isset($datos['NIT']) ? trim($datos['NIT']) : '',
            'Telefono'      => isset($datos['Telefono']) ? trim($datos['Telefono']) : '',
            'Direccion'     => isset($datos['Direccion']) ? trim($datos['Direccion']) : '',
            'Tipo'          => isset($datos['Tipo']) ? trim($datos['Tipo']) : '',
            'NRC'           => isset($datos['NRC']) ? trim($datos['NRC']) : ''
        ];
    }

/*VALIDAR CLIENTE*/
    private function validarCliente($datos)
    {
        $errores = [];

        if (!isset($datos['NombreCliente']) || empty(trim($datos['NombreCliente']))) {
            $errores[] = "El nombre del cliente es obligatorio.";
        }

        if (isset($datos['NombreCliente']) && strlen(trim($datos['NombreCliente'])) > 255) {
            $errores[] = "El nombre del cliente no debe superar los 255 caracteres.";
        }

        if (!empty($datos['DUI']) && !preg_match('/^[0-9]{8}-?[0-9]{1}$/', trim($datos['DUI']))) {
            $errores[] = "El DUI debe tener un formato válido. Ejemplo: 12345678-9.";
        }

        if (!empty($datos['NIT']) && strlen(trim($datos['NIT'])) > 20) {
            $errores[] = "El NIT no debe superar los 20 caracteres.";
        }

        if (!empty($datos['Telefono']) && !preg_match('/^[0-9]{4}-?[0-9]{4}$/', trim($datos['Telefono']))) {
            $errores[] = "El teléfono debe tener un formato válido. Ejemplo: 7777-8888.";
        }

        if (!empty($datos['Direccion']) && strlen(trim($datos['Direccion'])) > 255) {
            $errores[] = "La dirección no debe superar los 255 caracteres.";
        }

        if (!empty($datos['Tipo']) && strlen(trim($datos['Tipo'])) > 2) {
        $errores[] = "El tipo de cliente no debe superar los 2 caracteres.";
        }

        if (!empty($datos['NRC']) && strlen(trim($datos['NRC'])) > 15) {
            $errores[] = "El NRC no debe superar los 15 caracteres.";
        }


        return $errores;
    }

    /*CREAR CLIENTE*/
    public function crearCliente($datos)
    {
        $errores = $this->validarCliente($datos);

        if (!empty($errores)) {
            return [
                'exito' => false,
                'errores' => $errores
            ];
        }

        $cliente = $this->limpiarDatos($datos);

        $resultado = $this->clienteDatos->insertarCliente($cliente);

        return [
            'exito' => $resultado,
            'mensaje' => $resultado ? 'Cliente registrado correctamente.' : 'No se pudo registrar el cliente.'
        ];
    }

    /*OBTENER CLIENTE POR ID*/

    public function obtenerClientePorId($idCliente)
    {
        if (!is_numeric($idCliente) || $idCliente <= 0) {
            return null;
        }

        return $this->clienteDatos->obtenerClientePorId($idCliente);
    }

    /*ACTUALIZAR DATOS DEL CLIENTE*/

    public function actualizarCliente($datos)
    {
        $errores = $this->validarCliente($datos);

        if (!isset($datos['IdCliente']) || empty($datos['IdCliente'])) {
            $errores[] = "El identificador del cliente es obligatorio.";
        }

        if (!empty($errores)) {
            return [
                'exito' => false,
                'errores' => $errores
            ];
        }

        $cliente = $this->limpiarDatos($datos);
        $cliente['IdCliente'] = (int) $datos['IdCliente'];

        $resultado = $this->clienteDatos->actualizarCliente($cliente);

        return [
            'exito' => $resultado,
            'mensaje' => $resultado ? 'Cliente actualizado correctamente.' : 'No se pudo actualizar el cliente.'
        ];
    }

    /*ELIMINAR CLIENTE*/

    public function eliminarCliente($idCliente)
    {
        if (!is_numeric($idCliente) || $idCliente <= 0) {
            return [
                'exito' => false,
                'mensaje' => 'El identificador del cliente no es válido.'
            ];
        }

        $resultado = $this->clienteDatos->eliminarCliente($idCliente);

        return [
            'exito' => $resultado,
            'mensaje' => $resultado 
                ? 'Cliente eliminado correctamente.' 
                : 'No se pudo eliminar el cliente.'
        ];
    }




}

?>