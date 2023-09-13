<p>Volver al menu principal <a href="Vistas/menuPrincipal.php"> link</a></p>
<p>Volver al menu de Productos <a href="Vistas/formProducto.php"> link</a></p>

<?php
require_once("Modelo/Producto.php");
require_once ('DB/DBManager.php');
if(isset($_POST['codigoBarra'])) {  
        $codBarra = $_POST['codigoBarra'];
        $p = new Producto($codBarra);            
        try {
            if(Producto::EliminarProducto($p)){
                echo "Producto eliminado con exito";
            }
        } catch (\Throwable $th) {
            echo("<br>". "Error al querer elimiando un producto: </br>" . $th . "</br>");
        }
     } 
?>