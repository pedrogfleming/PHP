<?php
//======================================================================
// Confeccionar un programa que sume todos los numeros enteros desde 1
// mientras la suma no supere a 1000. Mostrar los numeros sumados
// y al finalizar el proceso indicar cuantos numeros se sumaron
//======================================================================
    $y = 0;
    $totalNumerosSumados = 0;       
    //x=44 y=990
    for ($x = 1; $y<=1000; $x++) {
        $y += $x;        
        if($y > 1000){
            break;
        }
        $totalNumerosSumados = $x;
        ?><br/>
        <?php
        echo("La suma da: ". $y);
        ?><br/>
        <?php
        echo("x: ".$x . " " ."y: " .$y); 
        echo(" Iteracion numero:".$x);    
    }
    ?><br/>
    <?php
    echo("El total de numeros sumados es:".$totalNumerosSumados);
?>
<?php
    #for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++); 
    #for ($i = 1, $j = 0; $j <= 1000; $j += $i, print $i, $i++); 
    // for($i = 1, $j = 0; $j <= 1000; $j += $i)
    // {
    //     print $i;
    //     ?><br/>
    //     <?php
    //     $i++;
    // }
?>
