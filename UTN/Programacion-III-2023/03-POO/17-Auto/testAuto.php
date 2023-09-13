<?php
echo "Realizar una clase llamada “Auto” que posea los siguientes atributos  <br/>

privados: _color (String) <br/>
_precio (Double) <br/>
_marca (String). <br/>
_fecha (DateTime) <br/>

Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: <br/>
i. La marca y el color. <br/>
ii. La marca, color y el precio. <br/>
iii. La marca, color, precio y fecha. <br/>

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto. <br/>
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto. <br/>
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca. <br/>
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación. <br/>
Ejemplo: importeDouble = Auto::Add(autoUno, autoDos); <br/>

En testAuto.php: <br/>
● Crear dos objetos “Auto” de la misma marca y distinto color. <br/>
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio. <br/>
● Crear un objeto “Auto” utilizando la sobrecarga restante. <br/>

● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio. <br/>
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido. <br/>
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no. <br/>
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5) <br/>";

require ".\Auto.php";

echo "<br/><br/>Test: <br/><br/>";

$autos = array();
//Crear dos objetos “Auto” de la misma marca y distinto color.
array_push($autos, new Auto("Toyota","negro"), new Auto("Toyota","negro"));
//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
array_push($autos, new Auto("Nissan","blanco",455), new Auto("Nissan","blanco",856));
// Crear un objeto “Auto” utilizando la sobrecarga restante.
array_push($autos, new Auto("Ford", "Verde", 1200,DateTimeImmutable::createFromFormat('j-M-Y', '15-Feb-2009')));

// Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
for ($i=3; $i < count($autos); $i++) { 
    $autos[$i]->AgregarImpuestos(1500);
}
$importeA1A2 = Auto::Add($autos[0], $autos[1]);
echo "Suma de auto 1 y auto 2 es igual a " . $importeA1A2 . "<br/>";

$sonIguales = json_encode(Auto::Equals($autos[0],$autos[4]));

echo "El primer y el quinto autos son iguales : " . $sonIguales . "<br/>";


// Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
for ($i=0; $i < count($autos); $i+=2) { 
    echo Auto::MostrarAuto($autos[$i]) . "<br/>";
}

?>