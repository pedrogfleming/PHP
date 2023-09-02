<?php
echo "Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta < br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach. <br/>";

$nums = array();
$number = 1;

while (count($nums) < 10) {
    $nums[] = $number;
    $number += 2;
}
foreach ($nums as $n) {    
    echo $n . " <br/>";
}
?>