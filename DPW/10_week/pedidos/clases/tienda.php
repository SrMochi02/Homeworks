<?php

class Tienda{
    //Atributes
    public $producto;
    public $cargador;
    public $descuento;
    //Methods
    public function totalizar($cantidad)
    {
        if ($this->producto == "iphone") 
        {
            
            $subtotal_cel = $cantidad * 900;
        } 
        else if ($this->producto == "samsung")
        {
            $subtotal_cel = $cantidad * 950;
        }
        else if ($this->producto == "redmi")
        {
            $subtotal_cel = $cantidad * 650;
        }
        /*agregamos los 4 productos nuevos para obtener sus precios por cantidad*/
        else if ($this->producto == "iphone_17") {
            $subtotal_cel =  $cantidad * 999;
        }
        else if ($this->producto == "iphone_air") {
            $subtotal_cel = $cantidad * 1050;
        }
        else if ($this->producto == "honor") {
            $subtotal_cel = $cantidad * 1550;
        }
        else if ($this->producto == "motorola") {
            $subtotal_cel = $cantidad * 500;
        }
        else 
        {
            return 0;
        }

        if ($this->cargador == "normal") {
            $precio_cargador = 15;
        }
        if ($this->cargador == "rapido"){
            $precio_cargador = 20;
        }

        $total_cargadores = $cantidad * $precio_cargador;

        $subtotal = $subtotal_cel + $total_cargadores;


        if($this->descuento == true) {
            $subtotal = $subtotal - ($subtotal  * 0.10);
        }

        return $subtotal;
        
    }
}

?>
