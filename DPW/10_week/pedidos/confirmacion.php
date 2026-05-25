<?php

//incluimos el archivo de la clase 

require_once "clases/tienda.php";

//instanciamos la clase 
$obj_tienda = new Tienda();

$obj_tienda->producto = $_POST["producto"];



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/estilos.css">
    
</head>
<body>
<?php

require_once "componentes/cabecera.php";
?>
    <form action="confirmacion.php" method="post"> 
    <table width="700" class="bordes-externos">
        <tr>
            <td height="37" align="right" valign="middle"> 
                <p>Producto: </p>
            </td>
            <td valign="middle"></td>
            <td valign="middle">
            <input type="text" name="producto" readonly value="<?php echo $obj_tienda->producto; ?>">
            </td>
        </tr>
        <tr>
            <td height="37" align="right" valign="middle">
                <p>Cantidad:</p>
            </td>
            <td valign="middle"></td>
            <td valign="middle"> 
                <input type="text" name="cantidad" readonly value="<?php echo $_POST['cantidad']; ?>">
            </td>
        </tr>
        <tr height="37" align="right" valign="middle">
            <td>
                <p>Total de la compra:</p>
            </td>
            <td valign="middle"></td>
            <td valign="middle">
                <button type="button" onclick="comprar();">Realizar compra</button>
            </td>
        </tr>
        <tr>
            <td height="2" colspan="3"></td>
        </tr>
    </table>
    </form>

    <script type="text/javscript">
function comprar() {
    alert("Su compra se realizo con exito");
        }

    </script>


</body>
</html>



