<?php
    include_once "Garage.php";
    $g = new Garage("UTN_Garage", 100);

    $autos = array();
    array_push($autos, new Auto("Toyota","negro"), new Auto("Toyota","negro"));
    array_push($autos, new Auto("Nissan","blanco",455), new Auto("Nissan","blanco",856));
    array_push($autos, new Auto("Ford", "Verde", 1200,DateTimeImmutable::createFromFormat('j-M-Y', '15-Feb-2009')));
    
    for ($i=0; $i < count($autos); $i++) { 
        if($g->Add($autos[$i])){
            echo Auto::MostrarAuto($autos[$i]) . " agregado al garage <br/> <br/>";
        }
        else {
            echo Auto::MostrarAuto($autos[$i]) . " no se pudo agregar al garage, ya existe <br/> <br/>";
        }
    }

    if($g->Equals($autos[0])){
        $a1 = $autos[0];
        $g->Remove($a1);
        
        if ($g->Equals($a1)) {
            echo "Sigue estando el auto 1 dentro del garage <br/>";
        }        
        else {
            echo "Se removio el auto 1 del garage <br/>";
        }
        
    }
    echo "<br/>". $g->MostrarGarage();
?>