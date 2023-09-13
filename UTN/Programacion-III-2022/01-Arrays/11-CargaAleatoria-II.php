<?php 
//======================================================================
// Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
// $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
//======================================================================
$v[1]=90;
$v[30]=7;
$v['e']=99;
$v['hola']= 'mundo';

foreach ($v as $key => $value) {
    echo($value);
    ?><br/>
    <?php
}
?>
<?php 
// $v = array(1 => 90, 30 => 7, 'e' => 99, 'hola'=>'mundo');
// foreach($v as $k => $value)
// {
//     echo($value . "<br>");
// }
?>