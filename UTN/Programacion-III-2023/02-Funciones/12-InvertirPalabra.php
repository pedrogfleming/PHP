<?php
echo "Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”. <br/>";
$palabraAConvertir = "HOLA";
echo implode(invertirPalabra($palabraAConvertir));
function invertirPalabra($str) {
    $ret = array();
    $len = strlen($str);    
    for ($i=$len-1,$j=0 ; $i >= 0,$j < $len; $i--,$j++) { 
        $ret[$j] = $str[$i];
    }
    return $ret;
}
?>