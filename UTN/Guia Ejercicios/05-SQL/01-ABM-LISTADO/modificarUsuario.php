<p>Volver al menu principal <a href="menuPrincipal.php"> link</a></p>
<p>Volver al menu de Usuario <a href="formUsuario.html"> link</a></p>
<?php
include 'DBManager.php';
require_once("Usuario.php");
if(isset($_POST['nombre']) ||
    isset($_POST['apellido']) ||
    isset($_POST['clave']) || 
    isset($_POST['mail'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $clave = $_POST['clave'];
        $mail = $_POST['mail'];
        $u = new Usuario($clave,$mail,$nombre,$apellido);
        if($u != null){
            var_dump($u);
        }
        $usuarios = DBManager::GetUsuarios("usuario1");
        var_dump($usuarios);
        if($usuarios != null){
            try {
                if(Usuario::ExisteUsuario($usuarios,$u)){
                    if(DBManager::ModificarUsuario($u)){
                        echo "Usuario modificado con exito";
                    }
                    else{
                        echo "No se pudo modificar el usuario";
                    }
                }
                else{
                    echo "No existe usuario con ese mail";
                }
            } catch (\Throwable $th) {
                echo("<br>". "Error al querer modificar un usuario: </br>" . $th . "</br>");

            }

        }

    }      

?>