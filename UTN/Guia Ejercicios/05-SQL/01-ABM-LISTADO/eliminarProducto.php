<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<p>Volver al menu de Productos <a href="formProducto.php"> link</a></p>

<?php
require_once("Producto.php");
include 'DBManager.php';
if(isset($_POST['codigoBarra'])) {  
        $codBarra = $_POST['codigoBarra'];
        $p = new Producto($codBarra);

        $productos = DBManager::GetAllRows("producto1");
        if($productos != null){
            if(Producto::ExisteProducto($productos,$p)){
                try {
                    if(DBManager::EliminarProducto($p)){
                        echo "Producto eliminado con exito";
                    }
                } catch (\Throwable $th) {
                    echo("<br>". "Error al querer elimiando un producto: </br>" . $th . "</br>");
                }
            }
            else{
                echo("No existe el producto en la base de datos, no se puede eliminar");
            }
        }
        else{
            echo("Error en los datos ingresados, por favor, vuelva a ingresar el producto");
        }


     } 





?>