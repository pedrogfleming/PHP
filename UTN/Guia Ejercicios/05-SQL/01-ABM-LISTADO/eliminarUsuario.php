<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<p>Volver al menu de Usuario <a href="formUsuario.html"> link</a></p>
<?php
include 'DBManager.php';
require_once("Usuario.php");
if(isset($_POST['mail']) && isset($_POST['clave'])) {
        $mail = $_POST['mail'];
        $clave = $_POST['clave'];
        $u = new Usuario($clave,$mail);
        if($u != null){
            var_dump($u);
        }
        $usuarios = DBManager::GetUsuarios("usuario1");
        var_dump($usuarios);
        if($usuarios != null){
            try {
                if(Usuario::ExisteUsuario($usuarios,$u)){
                    if(DBManager::EliminarUsuario($u)){
                        echo "Usuario eliminado con exito";
                    }
                    else{
                        echo "No se pudo eliminar el usuario";
                    }
                }
                else{
                    echo "No existe usuario con ese mail";
                }
            } catch (\Throwable $th) {
                echo("<br>". "Error al querer eliminar un usuario: </br>" . $th . "</br>");

            }

        }

    }      

?>