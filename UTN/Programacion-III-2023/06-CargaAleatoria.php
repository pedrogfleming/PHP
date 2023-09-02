<?php
echo "Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.<br/>";
$nums = array(rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10));
$media = array_sum($nums)/count($nums);

foreach ($nums as $n) {    
    echo $n . " <br/>";

}
if($media > 6){
    echo "El promedio es mayor que 6";
}
elseif ($media < 6) {
    echo "El promedio es menor que 6 ";
}
else {
    echo "El promedio es igual a 6";
}

?>