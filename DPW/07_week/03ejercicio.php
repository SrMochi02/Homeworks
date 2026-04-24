<?php

$producto = array(

	"nombre" => "Laptop Dell",
	"marca" => "Dell",
	"precio" => 849.95,
	"stock" => 8,
	"descripcion" => "amd ryzen 7 7730u ram 16gb almacenamiento ssd
	512gb pantalla tactil fhd 15.6p w11h kb us negro"

);

echo "<style>
    /* Estilo incrustado para un div específico */
    .mi-contenedor {
      background-color: rgb(202, 202, 202);
      border: 0.5px solid #676767;
      border-radius: 3px;
      padding: 12px;
      width: auto;
      height: 450px;
      text-align: left;
    }";

echo "</style>";

echo "<div class='mi-contenedor'>";
echo "<h2> Nombre del producto:". $producto["nombre"] ."</h2><br>";
echo "<h3> Marca: ". $producto["marca"]. "</h3><br>";
echo "<p> Precio:". $producto["precio"]. "</p><br>";
echo "<p> Descripcion: ". $producto["descripcion"]. "</p><br>";
echo "</div>"
?>


