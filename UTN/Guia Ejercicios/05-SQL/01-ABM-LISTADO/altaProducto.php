<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<?php
require_once("Producto.php");
include 'DBManager.php';
if(isset($_POST['codigoBarra']) ||
    isset($_POST['nombre']) ||
    isset($_POST['tipo']) || 
    isset($_POST['stock']) ||
    isset($_POST['precio'])) {    
        //Para guardar en el json unicamente
        // $productos = array(
        //     new Producto("545464","Jabon","Higiene",50,75.5),
        //     new Producto("424449","Alcohol","Higiene",80,120.2),
        //     new Producto("345848","Toalla","Higiene",25,440.3),
        //     new Producto("244897","Shampoo","Higiene",12,770.5),
        //     new Producto("144814","Lavandina","Higiene",33,85,7),
        //     new Producto("100854","Teclado","Informatica",2,660.5),
        //     new Producto("124484","Mousse","Informatica",7,290,2)
        // );
        // $fileName = "productos.json";
        // if($productos !== null){
        //     $archivo = fopen($fileName,'a');   
        //     $jsonString =Producto::SerializarProductos($productos);      
        //     // echo(fwrite($archivo,$jsonString));
        // }
        // fclose($archivo);  

        $codBarra = $_POST['codigoBarra'];
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $fechaCreacion = date("Y-m-d");
        $p = new Producto($codBarra,$nombre,$tipo,$stock,$precio);
        if($p != null){
            var_dump($p);
        }
        $productos = DBManager::GetAllRows("producto1");
        if($productos != null){
            if(!Producto::ExisteProducto($productos,$p)){
                try {
                    if(DBManager::AltaProducto($p)){
                        echo "Producto dado de alta con éxito";
                    }
                } catch (\Throwable $th) {
                    echo("<br>". "Error al querer dar de alta un producto: </br>" . $th . "</br>");
                }
            }
            else{
                echo("Ya existe el producto en la base de datos, no se puede dar de alta");
            }
        }
        else{
            echo("Error en los datos ingresados, por favor, vuelva a ingresar el producto");
        }
    }
?>