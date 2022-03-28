<?php

//======================================================================
// Realizar un programa que guarde su nombre en $nombre y su apellido en $apellido. 
// Luego mostrar el contenido de las variables con el siguiente formato:
// Perez,Juan.                  Utilizar el operador de concatenacion
//======================================================================
    $nombre = "Thomas";
    $apellido = "Geraghty Fleming";
    $apellidoNombre = $nombre . ", " . $apellido;
    echo($apellidoNombre);
?>