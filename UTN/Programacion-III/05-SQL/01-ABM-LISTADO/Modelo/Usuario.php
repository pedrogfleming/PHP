<?php
Class Usuario{
    private string $_nombre;
    private string $_apellido;
    private string $_clave;
    private string $_mail;
    private DateTime $_fecha_Alta;

    function __construct($clave,$mail,string $nombre="",$apellido="",$fechaAlta = null){
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_clave = $clave;
        $this->_mail = $mail;
        if($fechaAlta == null)
            $this->_fecha_Alta =  date_create("now");
        else
            $this->_fecha_Alta = $fechaAlta;
    }
    public function GetNombre(){
        return $this->_nombre;
    }
    public function GetApellido(){
        return $this->_apellido;
    }
    public function GetClave(){
        return $this->_clave;
    }
    public function GetMail(){
        return $this->_mail;
    }
    public function GetFechaAlta(){
        return $this->_fecha_Alta;
    }
    public static function Equals(Usuario $u1,Usuario $u2){
        return $u1->GetMail() == $u2->GetMail();
    }
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    public function SerializarUsuario(){
        return json_encode($this);
    }
    public static function SerializarUsuarios($usuarios){
        $jsonString = "";
        foreach ($usuarios as $item) {
            $jsonString .= $item->SerializarUsuario();
        }
        return $jsonString;
    }
    public static function ExisteUsuario($usuarios,Usuario $u1){
        foreach ($usuarios as $item) {
            if(Usuario::Equals($item,$u1)){
                return true;
            }
        }
        return false;
    }
    public static function GetUsuarios(){        
        try {
                $ret = [];
                $sql = "SELECT * FROM usuarios";
                $result = DBManager::Query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $p = new Usuario($row["clave"],$row["mail"],$row["nombre"],$row["apellido"],
                            new Datetime($row["fecha_de_registro"]));
                        array_push($ret,$p);
                }
                } else {
                    return null;
                }
                return $ret;
        } catch (\Throwable $th) {
            throw new Exception($th,0);
        }
    }
    public static function AltaUsuario(Usuario $u){   
        try {
                $nombre = $u->GetNombre();
                $apellido = $u->GetApellido();
                $clave = $u->GetClave();
                $mail = $u->GetMail();
                $fechaAlta = date_format($u->GetFechaAlta(),'Y-m-d H:i:s');
                $sql = "INSERT INTO usuarios ".
                        "(nombre, apellido,clave,mail,fecha_de_registro) "."VALUES ".
                        "('$nombre','$apellido','$clave','$mail','$fechaAlta')";
                if (DBManager::Query($sql)) { 
                    return true;
                } 
                else{
                    throw new DBException("Error: " . $sql . "<br>" . mysqli_error($conn), 1);
                }
        } catch (\Throwable $th) {
            throw new Exception($th,0);
        }                
    }        
    public static function ModificarUsuario(Usuario $u){
        try {
                $nombre = $u->GetNombre();
                $apellido = $u->GetApellido();
                $clave = $u->GetClave();
                $mail = $u->GetMail();
                $sql = "UPDATE usuarios ".
                        "SET nombre = '$nombre',apellido = '$apellido',clave ='$clave'
                        WHERE mail = '$mail'";
                if (DBManager::Query($sql)) { 
                    return true;
                } 
                else{
                    throw new DBException("Error: " . $sql . "<br>" . mysqli_error($conn), 1);
                }
        } catch (\Throwable $th) {
            throw new Exception($th,0);
        }
    }
    public static function EliminarUsuario(Usuario $u){   
        try {
            $mail = $u->GetMail();
            $sql = "DELETE FROM usuarios WHERE mail = '$mail'";
            if(DBManager::Query($sql)){
                return true;
            } 
            else{                            
                throw new DBException("Error: " . $sql . "<br>" . mysqli_error($conn), 1);
            }     
        } catch (\Throwable $th) {
            throw new Exception($th,0);
        }     
    }
}


?>