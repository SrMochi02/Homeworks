<?php
$libros = [
    ["titulo"=>"Cien años de soledad","autor"=>"Gabriel García Márquez","anio"=>1967,"genero"=>"Realismo mágico"],
    ["titulo"=>"1984","autor"=>"George Orwell","anio"=>1949,"genero"=>"Distopía"],
    ["titulo"=>"Don Quijote de la Mancha","autor"=>"Miguel de Cervantes","anio"=>1605,"genero"=>"Novela"]
];
?>

<h2>Catálogo de Libros</h2>

<table border="1">
<tr>
<th>Título</th>
<th>Autor</th>
<th>Año</th>
<th>Género</th>
</tr>

<?php
foreach($libros as $libro){
echo "<tr>";
echo "<td>".$libro["titulo"]."</td>";
echo "<td>".$libro["autor"]."</td>";
echo "<td>".$libro["anio"]."</td>";
echo "<td>".$libro["genero"]."</td>";
echo "</tr>";
}
?>

</table>