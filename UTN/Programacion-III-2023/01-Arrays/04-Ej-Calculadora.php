<?php
echo "Escribir un programa que use la variable operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras op1 y op2. De acuerdo al
símbolo que tenga la variable operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla. <br />";

// $operation = "+";
// $operation = "-";
$operation = "*";
// $operation = "/";

$op1 = 10;
$op2 = 5;
$result = 0;
switch ($operation) {
    case '+':
        $result = $op1 + $op2;
        break;
    case '-':
        $result = $op1 - $op2;
        break;
    case '*':
        $result = $op1 * $op2;
        break;
    case '/':
        $result = $op1 / $op2; 
        break;
}

echo "El resultado de la operacion es ". $result . " y los operandos fueron " . $op1 . " y $op2";
?>