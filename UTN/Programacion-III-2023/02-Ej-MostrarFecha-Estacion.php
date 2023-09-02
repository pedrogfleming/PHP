<?php
echo "Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. <br />";

$date_now = date("Y-m-d");
$season = "";
if ($date_now > "2023-12-22 " && $date_now < "202-03-20") {
    $season = "Verano";
}
elseif ($date_now > "2023-03-21" && $date_now < "2023-06-20" )  {
    $season = "Otoño";
}
elseif ($date_now > "2023-06-21" && $date_now > "2023-06-21") {
    $season = "Invierno";
}
elseif ($date_now > "2023-09-23" && $date_now > "2023-12-22") {
    $season = "Primavera";
}

echo "La fecha actual es " . $date_now . "<br/> y estamos en $season<br/>";
?>