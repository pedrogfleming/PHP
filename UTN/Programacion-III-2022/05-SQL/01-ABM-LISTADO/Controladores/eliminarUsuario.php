<p>Volver al menu principal <a href="Vistas/menuPrincipal.php"> link</a></p>
<p>Volver al menu de Usuario <a href="Vistas/formUsuario.html"> link</a></p>
<?php
require_once ('DB/DBManager.php');
require_once("Modelo/Usuario.php");
if(isset($_POST['mail']) && isset($_POST['clave'])) {
        $mail = $_POST['mail'];
        $clave = $_POST['clave'];
        $u = new Usuario($clave,$mail);
        try {
            if(Usuario::EliminarUsuario($u)){
                echo "Usuario eliminado con exito";
            }
        } catch (\Throwable $th) {
            echo("<br>". "Error al querer eliminar un usuario: </br>" . $th . "</br>");
        }
    }      
?>