<?php 
//======================================================================
// Realizar las líneas de código necesarias para generar un Array asociativo
// y otro indexado que contengan como elementos tres Arrays del punto anterior cada uno.
// Crear, cargar y mostrar los Arrays de Arrays.
//======================================================================
$lapicera1= array(
    "color" => "Verde",
    "marca" => "Bic",
    "trazo" => "fino",
    "precio" => 25,);
    
$lapicera2= array(
        "color" => "Roja",
        "marca" => "Faber-Castell",
        "trazo" => "grueso",
        "precio" => 39,);
$lapicera3= array(
    "color" => "Azul",
    "marca" => "Marca China",
    "trazo" => "mediana",
    "precio" => 20,);

$cartuchera=array();
array_push($cartuchera,$lapicera1,$lapicera2,$lapicera3);
foreach ($cartuchera as $lapicera) {
    echo $lapicera["color"] . " " . $lapicera["marca"] . " " . $lapicera["trazo"] . " " . $lapicera["precio"];
    ?><br/>
    <?php 
}

?>