<?php
include 'db.php';
require_once 'DBException.php';
require_once 'Producto.php';
    class DBManager
    {
        public static  $conn;
        /**
         * Get all rows in a SQL Table 
         * @param $tableName its the name of the table where you have the data to read
         * return null if couldn't get any row
         * return an array of objects of all the table´s rows
         */
        public static function GetAllRows($tableName){
            $ret = [];
            $conn = OpenCon();
            if ($conn->connect_errno) {
                printf("Connect failed: %s\n", $conn->connect_error);
                exit();
            }
            $sql = "SELECT * FROM $tableName";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    // echo "id: " . $row["id"]. " - nombre: " . $row["nombre"]. "tipo: " . $row["tipo"].
                    //     "stock: " . $row["stock"]. "precio: " . $row["precio"]. 
                    //     "fecha de creacion: "  . $row["fecha_de_creacion"].
                    //     "fecha_de_modificaion: " . $row["fecha_de_modificacion"].
                    //     "codigo de barra: " . $row["cod_barra"].   
                    //     "<br>";
                    $p = new Producto(intval($row["cod_barra"]),$row["nombre"],$row["tipo"],
                        (int)$row["stock"],(float)$row["precio"],
                        new DateTime($row["fecha_de_creacion"]),new DateTime($row["fecha_de_modificacion"]));
                        array_push($ret,$p);
            }
            } else {
                return null;
            }
            return $ret;
            CloseCon($conn);
        }
        public static function AltaProducto(Producto $p){
            try {
                    $conn = OpenCon();
                    if ($conn->connect_errno) {
                        printf("Connect failed: %s\n", $conn->connect_error);
                        exit();
                    }
                    $codBarra = $p->GetCodBarra();
                    $nombre = $p->GetNombre();
                    $tipo = $p->GetTipo();
                    $stock = $p->GetStock();
                    $precio = $p->GetPrecio();
                    $fechaCreacion = date_format($p->GetFechaCreacion(),'Y-m-d H:i:s');
                    $fechaModificacion = date_format($p->GetFechaModificion(),'Y-m-d H:i:s');

                    $sql = "INSERT INTO producto1 ".
                            "(nombre,tipo, stock,precio,fecha_de_creacion,fecha_de_modificacion,cod_barra) "."VALUES ".
                            "('$nombre','$tipo','$stock','$precio','$fechaCreacion','$fechaModificacion','$codBarra')";
                    if (mysqli_query($conn, $sql)) { 
                        return true;
                    } 
                else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    throw new DBException("Error: " . $sql . "<br>" . mysqli_error($conn), 1);
                }            
                
            } catch (\Throwable $th) {
                throw new Exception($th,0);
            }
            finally{
                CloseCon($conn);
            }
            return false;
        }
    }
    


?>