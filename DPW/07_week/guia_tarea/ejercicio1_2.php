<?php

$numero = $_POST["numero"];

$decimal = $numero;
$residuos = [];

$indice = 0;

while($numero > 0){

$residuo = $numero % 2;

$residuos[$indice] = $residuo;

$numero = floor($numero / 2);

$indice++;

}

krsort($residuos);

$binario = "";

foreach($residuos as $bit){
$binario .= $bit;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Resultado</title>
</head>

<body>

<h2>Resultado de la conversión</h2>

<p>Número decimal: <?php echo $decimal; ?></p>

<p>Número binario: <?php echo $binario; ?></p>

</body>
</html>