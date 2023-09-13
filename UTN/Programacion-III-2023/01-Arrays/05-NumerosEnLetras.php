<?php
echo "Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable num, pueda mostrarse por pantalla,
 el nombre del número que tenga dentro escrito con palabras, para los números entre el 20 y el 60.
Por ejemplo, si num = 43 debe mostrarse por pantalla “cuarenta y tres”. <br/>";

// $num = 40;
// $num = 27;
$num = 55;
// $num = 69;
if ($num >= 20 && $num <= 60) {
    $mapDecenas = array(
        20 => 'veinte',
        30 => 'treinta',
        40 => 'cuarenta',
        50 => 'cincuenta',
        60 => 'sesenta'
    );
    $mapUnits = array (
        1 => 'uno',
        2 => 'dos',
        3 => 'tres',
        4 => 'cuatro',
        5 => 'cinco',
        6 =>'seis',
        7 =>'siete',
        8 => 'ocho',
        9 => 'nueve'
    );
    $decena = floor($num / 10) * 10;
    $units = $num % 10;

    if (array_key_exists($decena, $mapDecenas))     {
        $numberToLetters = $mapDecenas[$decena];
        if($units != 0 && array_key_exists($units, $mapUnits))        {
            $numberToLetters .= " y " . $mapUnits[$units];
        }
        echo $numberToLetters;
    }
} else {
    echo "El número está fuera del rango permitido (20-60)";
}
?>