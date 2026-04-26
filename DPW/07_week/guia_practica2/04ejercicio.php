<style>

.confirmada{
color:green;
}

.pendiente{
color:orange;
}

.cancelada{
color:red;
}

</style>

<?php

$reservas = [

["nombre"=>"Carlos López","habitacion"=>101,"tipo"=>"Sencilla","noches"=>2,"estado"=>"Confirmada"],
["nombre"=>"Ana Pérez","habitacion"=>205,"tipo"=>"Doble","noches"=>3,"estado"=>"Pendiente"],
["nombre"=>"Luis Gómez","habitacion"=>301,"tipo"=>"Suite","noches"=>1,"estado"=>"Cancelada"],
["nombre"=>"Maria Torres","habitacion"=>102,"tipo"=>"Sencilla","noches"=>4,"estado"=>"Confirmada"],
["nombre"=>"Pedro Sánchez","habitacion"=>210,"tipo"=>"Doble","noches"=>2,"estado"=>"Pendiente"],
["nombre"=>"Laura Díaz","habitacion"=>305,"tipo"=>"Suite","noches"=>5,"estado"=>"Confirmada"]

];

?>

<h2>Registro de Reservas</h2>

<table border="1">

<tr>
<th>Huésped</th>
<th>Habitación</th>
<th>Tipo</th>
<th>Noches</th>
<th>Estado</th>
</tr>

<?php

foreach($reservas as $r){

$clase="";

if($r["estado"]=="Confirmada"){
$clase="confirmada";
}elseif($r["estado"]=="Pendiente"){
$clase="pendiente";
}else{
$clase="cancelada";
}

echo "<tr>";
echo "<td>".$r["nombre"]."</td>";
echo "<td>".$r["habitacion"]."</td>";
echo "<td>".$r["tipo"]."</td>";
echo "<td>".$r["noches"]."</td>";
echo "<td class='$clase'>".$r["estado"]."</td>";
echo "</tr>";

}

?>

</table>