<?php
if(isset($_POST['nombre'])){

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $nota = $_POST['nota'];

    $total_estudiantes = count($nombre);
    $sum_notas = 0;
    $promedio = 0;


    echo "<h1>Resultados de estudiantes con nota mayor a 6</h1>";

    

    for($i = 0; $i < $total_estudiantes; $i++){
        if(empty($nombre[$i]) || empty($edad[$i]) || empty($nota[$i])){
            die("Faltan datos para el estudiante" . ($i + 1) . ". Por favor, complete todos los campos. ");
            }
            
        if($nota[$i] < 0 || $nota[$i] > 10 || !is_numeric($nota[$i])){
            die("La nota del estudiante" . ($i + 1) . " es inválida. Por favor, ingrese una nota entre 0 y 10.");
            }
            
        if($edad[$i] < 18 || !is_numeric($edad[$i])){
            die("La edad del estudiante" . ($i + 1) . " es inválida. Por favor, ingrese una edad válida.");
            }

            $sum_notas += $nota[$i];

            if($nota[$i] >= 6){
            echo "<p>Nombre: " . $nombre[$i] . "</p>";
            echo "<p>Edad: " . $edad[$i] . "</p>";
            echo "<p>Nota: " . $nota[$i] . "</p>";
            echo "<hr>";
            }
        
        }

    $promedio = $sum_notas / $total_estudiantes;
    echo "<h2>Promedio de notas: " . $promedio . "</h2>";


} 
else {
    echo "No se han recibido datos del formulario.";
    die();
}

?>

<input type="button" name="btnRegresar" class="btnGreen" value="Regresar"
 				onclick="javascript:window.location.replace('index.html');">
