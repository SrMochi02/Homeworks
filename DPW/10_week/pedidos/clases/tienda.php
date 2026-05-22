<?php

class Tienda{
    //Atributes
    public $producto;

    //Methods
    public function totalizar($cantidad)
    {
        if ($this->producto == "iphone") 
        {
            return $cantidad * 900;
        } 
        else if ($this->producto == "samsung")
        {
            return $cantidad * 950;
        }
        else if ($this->producto == "redmi")
        {
            return $cantidad * 650;
        }
        else 
        {
            return 0;
        }
    }
}

?>
