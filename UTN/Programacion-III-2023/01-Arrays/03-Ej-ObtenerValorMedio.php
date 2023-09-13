<?php
echo "Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero a, b y c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: a
= 6; b = 9; c = 8; => se muestra 8.
Ejemplo 2: a = 5; b = 1; c = 5; => se muestra un mensaje “No hay valor del medio” <br />";

// $numbers[0] = 6; $numbers[1]= 9; $numbers[2]= 8;
$numbers[0] = 5; $numbers[1]= 1; $numbers[2]= 5;
$mValue = "No hay valor del medio";
if ($numbers[0] > $numbers[1] && $numbers[0] < $numbers[2]) {
    $mValue = "La variable del medio es " .$numbers[0];
}
elseif ($numbers[1] > $numbers[0] && $numbers[1]< $numbers[2]) {
    $mValue = "La variable del medio es " .$numbers[1];
}
elseif ($numbers[2] > $numbers[0] && $numbers[2]< $numbers[1]) {
    $mValue = "La variable del medio es " .$numbers[2];
}
echo $mValue;
?>