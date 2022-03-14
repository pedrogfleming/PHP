<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<p>Volver al menu de Productos <a href="formProducto.php"> link</a></p>

<?php
require_once("Producto.php");
include 'DBManager.php';
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
        if($p != null){
            var_dump($p);
        }
        $productos = DBManager::GetAllRows("producto1");
        if($productos != null){
            if(Producto::ExisteProducto($productos,$p)){
                try {
                    if(DBManager::ModificarProducto($p)){
                        echo "Producto modificado con exito";
                    }
                } catch (\Throwable $th) {
                    echo("<br>". "Error al querer modificar un producto: </br>" . $th . "</br>");
                }
            }
            else{
                echo("No existe el producto en la base de datos, no se puede dar modificar");
            }
        }
        else{
            echo("Error en los datos ingresados, por favor, vuelva a ingresar el producto");
        }


     } 





?>