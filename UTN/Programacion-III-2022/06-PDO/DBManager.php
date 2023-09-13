<?php
require_once 'db.php';
require_once 'DBException.php';
require_once 'Modelo/Producto.php';
    class DBManager
    {
        private static  $_conn;
        public static $_error_message;  
        
        /**
         * Realiza una query
         * Retorna un array con la data
         */
        public static function Query($sql){            
            $conn = OpenCon();
            try {
                //code...
                if ($conn->connect_errno) {
                    throw new Exception("Connect failed: %s\n". $conn->connect_error,0);
                }
                return $conn->query($sql);
            } catch (\Throwable $th) {
                throw $th;
            }
            finally{
                CloseCon($conn);
            }
        }
    }
    


?>