<?php
echo " Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays. <br/>";

$lapicera1 = array(
    'color' => 'Negro',
    'marca' => 'BMW',
    'trazo' => '100',
    'precio' => '1000'
);

$lapicera2 = array(
    'color' => 'Rojo',
    'marca' => 'BMW',
    'trazo' => '100',
    'precio' => '1000'
);

$lapicera3 = array(
    'color' => 'Azul',
    'marca' => 'BMW',
    'trazo' => '100',
    'precio' => '1000'
);

$lapiceras = array(
    $lapicera1,
    $lapicera2,
    $lapicera3
);
for ($i = 0; $i < count($lapiceras); $i++) {
    echo $lapiceras[$i]['color']. "<br/>";
    echo $lapiceras[$i]['marca']. "<br/>";
    echo $lapiceras[$i]['trazo']. "<br/>";
    echo $lapiceras[$i]['precio']. "<br/>";
    echo "<br/>";
}

?>