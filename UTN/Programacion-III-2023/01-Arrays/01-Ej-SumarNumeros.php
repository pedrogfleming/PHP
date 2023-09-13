<?php
echo "Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron. <br />" ;

$i = 0;
$n = 1;
while ($n < 1000) {
    $j = $n + 1;
    $n += $j;
    if($n < 1000) 
        echo $n . "<br />";
    $i++;
}


echo "Se sumaron ". $i . "numeros";
?>