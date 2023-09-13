<?php
echo "Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras. <br/>";

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
foreach ($lapiceras as $l) {
    echo $l["color"] . "<br/>";
    echo $l["marca"]. "<br/>";
    echo $l["trazo"]. "<br/>";
    echo $l["precio"]. "<br/>";
    echo "<br/>";
}
?>