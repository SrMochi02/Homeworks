<?php
$productos = [
["nombre"=>"Laptop","precio"=>850,"stock"=>5],
["nombre"=>"Mouse","precio"=>15,"stock"=>10],
["nombre"=>"Teclado","precio"=>25,"stock"=>0],
["nombre"=>"Monitor","precio"=>200,"stock"=>3]
];
?>

<h2>Lista de Productos</h2>

<table border="1">
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
</tr>

<?php
for($i=0;$i<count($productos);$i++){

echo "<tr>";
echo "<td>".$productos[$i]["nombre"]."</td>";
echo "<td>$".$productos[$i]["precio"]."</td>";

if($productos[$i]["stock"]==0){
echo "<td style='color:red;'>AGOTADO</td>";
}else{
echo "<td>".$productos[$i]["stock"]."</td>";
}

echo "</tr>";
}
?>

</table>