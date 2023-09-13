<?php
class ControladorUsuario{

    public static function CrearUsuarioArray(array $a=[]){
        if($a != null){
            $nombre = $a['nombre'];
            $apellido = $a['apellido'];
            $clave = $a['clave'];
            $mail = $a['mail'];
            return new Usuario($clave,$mail,$nombre,$apellido);  
        }
    }
    public static function InsertNuevoUsuario($u){
        // $nombre = $_POST['nombre'];
        // $apellido = $_POST['apellido'];
        // $clave = $_POST['clave'];
        // $mail = $_POST['mail'];
        // $u = new Usuario($clave,$mail,$nombre,$apellido);       
        try{
            if(Usuario::AltaUsuario($u)){
                return true;
                // echo "Usuario dado de alta con exito";
            }
            return false;
        }
        catch (\Throwable $th) {
            throw new Exception($th,0);
        }
    }
    
}



?>