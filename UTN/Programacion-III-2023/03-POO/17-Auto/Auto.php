<?php
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;
    
   

    public function __construct($marca,$color,$precio=0,$fecha=new DateTime()){
        $this->_color = $color;
        $this->_marca = $marca;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }
    public function get_color(){
        return $this->_color;
    }
    public function get_marca(){
        return $this->_marca;
    }
    public function get_precio(){
        return $this->_precio;
    }
    public function get_fecha(){
        return $this->_fecha;
    }    
    public function AgregarImpuestos($montoAgregar){
        $this->_precio += $montoAgregar;
    }
    public static function MostrarAuto($auto){
        $detalle = "Marca: " . $auto->get_marca() ." Color: ". $auto->get_color() . " Precio: " . $auto->get_precio() . " Fecha: " . $auto->get_fecha()->format('Y-m-d H:i:s');
        return $detalle;
    }
    public static function Equals($a1, $a2){
        return $a1->get_marca() === $a2->get_marca();
    }
    public static function Add($a1,$a2){
        if (Auto::Equals($a1,$a2) && $a1->get_color() === $a2->get_color()) {
            return $a1->get_precio() + $a2->get_precio();
        }
        else{
            return 0;
        }
    }
}
