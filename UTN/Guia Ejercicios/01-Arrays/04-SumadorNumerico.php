<?php
//======================================================================
// Confeccionar un programa que sume todos los numeros enteros desde 1
// mientras la suma no supere a 1000. Mostrar los numeros sumados
// y al finalizar el proceso indicar cuantos numeros se sumaron
//======================================================================
//No anda :(
    $y = 0;
    $totalNumerosSumados = 0;       

    for ($x = 1; $y<=1000; $x++) {
        $totalNumerosSumados = $x;
        $y += $x;        
        ?><br/>
        <?php
        echo($x . " " . $y);        
    }
    ?><br/>
    <?php
    echo($totalNumerosSumados);
?>
<?php
    #for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++); 
    #for ($i = 1, $j = 0; $j <= 1000; $j += $i, print $i, $i++); 
    for($i = 1, $j = 0; $j <= 1000; $j += $i)
    {
        print $i;
        ?><br/>
        <?php
        $i++;
    }
?>
