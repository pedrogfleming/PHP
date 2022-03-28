<p>Volver al menu principal <a href="Vistas/menuPrincipal.php"> link</a></p>
<p>Volver al menu de Productos <a href="Vistas/formProducto.php"> link</a></p>

<?php
require_once("Modelo/Producto.php");
require_once ('DB/DBManager.php');
if(isset($_POST['codigoBarra']) ||
    isset($_POST['nombre']) ||
    isset($_POST['tipo']) || 
    isset($_POST['stock']) ||
    isset($_POST['precio'])) {  
        $codBarra = $_POST['codigoBarra'];
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $fechaModificacion = date("Y-m-d");
        $p = new Producto($codBarra,$nombre,$tipo,$stock,$precio);
        try {
            if(Producto::ModificarProducto($p)){
                echo "Producto modificado con exito";
            }
        } catch (\Throwable $th) {
            echo("<br>". "Error al querer modificar un producto: </br>" . $th . "</br>");
        }
    } 
?>