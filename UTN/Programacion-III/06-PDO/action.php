<?php
require_once("Usuario.php");

if(isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['clave']) &&
    isset($_POST['mail']) &&
    isset($_POST['localidad']) ) {    
   
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $clave = $_POST['clave'];
    $localidad = $_POST['localidad'];

    $usuario = new Usuario($nombre,$mail,$clave,new DateTime("now"));
    $archivo = fopen($fileName,'a');
    fwrite($archivo,json_encode($usuario));
    if(fclose($archivo)){
        echo("<br/>Grabado con éxito! (PATH = $fileName)");
    }
    else{
        echo("<br/>No se pudo guardar el usuario (PATH = $fileName)");
    }
    //Debbugin mostrar el json
    $arrayJSON = [];    
    $archivo = fopen($fileName,'r');
    $fSize = filesize($fileName);    
    print_r(json_decode(fread($archivo,$fSize)));
    fclose($archivo);   
}
?>