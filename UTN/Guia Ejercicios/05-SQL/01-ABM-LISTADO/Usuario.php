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
}


?>