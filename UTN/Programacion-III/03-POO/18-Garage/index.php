<?php
include_once "Garage.php";
include_once "Auto.php";
//======================================================================
// // Crear la clase ​Garage​ que posea como atributos privados:
// // _razonSocial (String)
// // _precioPorHora (Double)
// // _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
// // Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
// // i. La razón social.
// // ii. La razón social, y el precio por hora.
// // Realizar un método de ​instancia​ llamado ​“MostrarGarage”,​ 
// // que no recibirá parámetros y que mostrará todos los atributos del objeto.
// // Crear el método de instancia ​“Equals”
// // ​que permita comparar al objeto de tipo ​Garaje​ con un objeto de tipo ​Auto.​
// // Sólo devolverá ​TRUE​ si el auto está en el garaje.
// // Crear el método de instancia ​“Add” ​para que permita sumar un objeto ​“Auto”​ al ​“Garage”
// // (sólo si el auto ​no​ está en el garaje, de lo contrario informarlo).
// // Ejemplo: $miGarage->Add($autoUno);
// // Crear el método de instancia ​“Remove” ​para que permita quitar un objeto ​“Auto”​ del “Garage”​ 
// // (sólo si el auto ​está​ en el garaje, de lo contrario informarlo).
// Ejemplo: $miGarage->Remove($autoUno);
// En ​testGarage.php​, crear autos y un garage.
// Probar el buen funcionamiento de todos los métodos.
//======================================================================

$garage = new Garage("Pikachu garage",170);
$a1 = new Auto("Mitsubishi", "Azul", 500000, new DateTime("now"));
$a2 = new Auto("Ford", "Negro", 1000000);
$a3 = new Auto("Fiat", "Azul");

$garage->Add($a1);
$garage->Add($a1); //Repetido
$garage->Add($a2);
$garage->Add($a3);
echo "<h1>01 - Garage</h1>";
echo $garage->MostrarGarage();


echo "<h1>02 - ELIMINAREMOS UN AUTO</h1>";

if($garage->Remove($a1)){       //El auto  está en el garage.
    echo("Elemento removido");
}
else{
    echo("No existe el elemento a eliminar");
} 

echo "<h1>03 - Mostramos el garage despues de eliminar un auto</h1>";
echo $garage->MostrarGarage();

echo "<h1>04 - Tratamos de eliminar de nuevo un auto q ya no existe en el garage</h1>";

if($garage->Remove($a1)){       //El auto no está en el garage.
    echo("Elemento duplicado fue removido");
} 
else{
    echo("No existe el elemento a eliminar");
}
// //var_dump($garage);

echo "<h1>05 - Mostramos otra vez el garage</h1>";
echo $garage->MostrarGarage();

echo "<h1>06 - Agregamos el auto eliminado anteriormente a1 </h1>";

 $garage->Add($a1);


echo "<h1>07 - Mostramos otra vez el garage</h1>";
echo $garage->MostrarGarage();


// //TODO OK

// //TODO OK

// echo "<p style = 'color:red;' >hola en rojo</p>";
// echo "<p style = 'color:violet;' >hola en violeta</p>";
// echo "<p style = 'color:white; background-color: black;'>hola en blanco con fondo negro</p>";

?>
