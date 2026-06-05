<?php
// Si el archivo que pides existe (un .php o .html dentro de una tarea), lo abre normal
if (file_exists(__DIR__ . $_SERVER['REQUEST_URI']) && !is_dir(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false; 
}

// Si entras a la raíz o a una carpeta, muestra el listado de archivos
echo "<h1>Directorio de Proyectos y Tareas</h1><hr><ul style='font-family:sans-serif; font-size:18px; line-height:2;'>";
$dir = __DIR__ . $_SERVER['REQUEST_URI'];
if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $path = rtrim($_SERVER['REQUEST_URI'], '/') . '/' . $file;
            echo "<li><a href='$path'>$file</a></li>";
        }
    }
}
echo "</ul>";
