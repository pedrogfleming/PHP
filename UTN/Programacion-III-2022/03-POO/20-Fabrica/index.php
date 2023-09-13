<?php
require_once("Fabrica.php");
require_once ("Operario.php");
//======================================================================

//======================================================================
$op1 = new Operario(3,"Lopez","Jose",100);
$fabricaToyota = new Fabrica("Fabrica Fleming");

// echo($fabricaToyota->MostrarOperarios());

$fabricaToyota->Add($op1);
// echo($fabricaToyota->MostrarOperarios());
$fabricaToyota->Add(new Operario(4,"Quiroz","Ana"));
$fabricaToyota->Add(new Operario(5,"Gamarra","Hector"));
echo($fabricaToyota->MostrarOperarios());
// echo("<br/>El costo total de sueldo actualmente es de:");
// echo(strval(Fabrica::MostrarCosto($fabricaToyota)));
// $op1->SetAumentarSalario(25);

// echo($fabricaToyota->MostrarOperarios());

// echo("<br/>El costo total de sueldo actualmente es de:");
// echo(strval(Fabrica::MostrarCosto($fabricaToyota)));

if($fabricaToyota->Remove($op1)){
    echo("<br/> Removido con exito");
}
else{
    echo("<br/> No se pudo remover el operario ");
}
echo($fabricaToyota->MostrarOperarios());;

?>