
<?php phpinfo()?>
<p>Volver al menu principal <a href= "Vistas/menuPrincipal.html"> link</a></p>
<p>Volver al menu de Usuario <a href="Vistas/formUsuario.html"> link</a></p>
<?php
require_once ('DB/DBManager.php');
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
        try {
            if(Usuario::ModificarUsuario($u)){
                echo "Usuario modificado con exito";
            }
        } catch (\Throwable $th) {
            echo("<br>". "Error al querer modificar un usuario: </br>" . $th . "</br>");
        }
    }      

?>