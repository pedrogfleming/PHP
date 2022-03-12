<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<?php
require_once("Producto.php");
include 'db.php';

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
        $fechaCreacion = '2022-03-12';       

        $conn = OpenCon();
        if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $conn->connect_error);
            exit();
        }
        $sql = "INSERT INTO producto1 ".
               "(nombre,tipo, stock,precio,fecha_de_creacion,fecha_de_modificacion) "."VALUES ".
               "('$nombre','$tipo','$stock','$precio','$fechaCreacion','$fechaCreacion')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            
        } 
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        CloseCon($conn);

    }
?>