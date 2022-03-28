<p>Volver al menu principal <a href="Vistas/menuPrincipal.php"> link</a></p>
<p>Volver al menu de Usuario <a href="Vistas/formUsuario.html"> link</a></p>
<?php
include_once ('DB/DBManager.php');
require_once("Modelo/Usuario.php");
if(isset($_POST['nombre']) ||
    isset($_POST['apellido']) ||
    isset($_POST['clave']) || 
    isset($_POST['mail'])) {        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $clave = $_POST['clave'];
        $mail = $_POST['mail'];
        $u = new Usuario($clave,$mail,$nombre,$apellido);       
        try{
            if(Usuario::AltaUsuario($u)){
                echo "Usuario dado de alta con exito";
            }
        }
        catch (\Throwable $th) {
            echo("<br>". "Error al querer dar de alta un usuario: </br>" . $th . "</br>");
        }
    }    
?>