<style>

.categoria{
border:1px solid black;
padding:15px;
margin:10px;
width:300px;
}

.entradas{
background-color:#fff3cd;
}

.platos{
background-color:#d1ecf1;
}

.postres{
background-color:#f8d7da;
}

</style>

<?php

$entradas = [
["nombre"=>"Sopa de pollo","precio"=>4,"vegetariano"=>false],
["nombre"=>"Ensalada verde","precio"=>3,"vegetariano"=>true]
];

$platos = [
["nombre"=>"Pollo a la plancha","precio"=>8,"vegetariano"=>false],
["nombre"=>"Pasta vegetariana","precio"=>7,"vegetariano"=>true]
];

$postres = [
["nombre"=>"Pastel de chocolate","precio"=>4,"vegetariano"=>true],
["nombre"=>"Helado","precio"=>3,"vegetariano"=>true]
];

function mostrarMenu($titulo,$categoria,$clase){
echo "<div class='categoria $clase'>";
echo "<h3>$titulo</h3>";
echo "<ul>";

foreach($categoria as $plato){

echo "<li>".$plato["nombre"]." - $".$plato["precio"];

if($plato["vegetariano"]){
echo " 🌱 Apto para vegetarianos";
}

echo "</li>";

}

echo "</ul>";
echo "</div>";
}

?>

<h2>Menú del Restaurante</h2>

<?php
mostrarMenu("Entradas",$entradas,"entradas");
mostrarMenu("Platos Fuertes",$platos,"platos");
mostrarMenu("Postres",$postres,"postres");
?>