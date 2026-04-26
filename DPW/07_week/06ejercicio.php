<?php

$libro = array(

    "titulo" => "Los mejores relatos de lovecraft",
    "autor" => "H.P Lovecraft",
    "fecha" => "2023",
    "genero" => "Terror",
    "paginas" => 189
);

echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr><td>Campo</td> <td>Valor</td></tr>";
echo "<tr><td>Titulo</td><td>".$libro["titulo"]."</td></tr>";
echo "<tr><td>Autor</td><td>".$libro["autor"]."</td></tr>";
echo "<tr><td>Año de publicación</td><td>".$libro["fecha"]."</td></tr>";
echo "<tr><td>Genero</td><td>".$libro["genero"]."</td></tr>";
echo "<tr><td>Numero de paginas</td><td>".$libro["paginas"]."</td></tr>";
echo "</table>";

if($libro['genero'] == "Terror"){
    echo "<h2>¡UNO DE TUS GENEROS FAVORITOS!<h2>";
}

?>