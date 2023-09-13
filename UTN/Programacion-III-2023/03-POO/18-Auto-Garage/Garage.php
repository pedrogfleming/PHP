<?php
// Aplicación No 18 (Auto - Garage)
// Crear la clase Garage que posea como atributos privados:
include_once "../17-Auto/Auto.php";
class Garage{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;
    
    public function __construct($razonSocial, $precioPorHora=null){
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }
    public function MostrarGarage(){
        $str = $this->_razonSocial . " " . $this->_precioPorHora . " " . "Y tiene los siguientes autos: \n";
        for ($i=0; $i < count($this->_autos); $i++) { 
            $a = Auto::MostrarAuto($this->_autos[$i]);
            $str .= $a;
        }
        return $str;
    }
    public function Equals($a) {
        for ($i=0; $i < count($this->_autos); $i++) { 
            if (Auto::Equals($a, $this->_autos[$i])) {
                // El auto esta en el garage
                return true;
            }
        }
        // El auto no esta en el garage
        return false;
    }
    public function Add($a){
        if (!$this->Equals($a)) {
            array_push($this->_autos,$a);
            return true;
        }
        //El auto ya esta en el garage
        return false;
    }
    public function Remove($a){
        $index = array_search($a, $this->_autos, true);
        if($index !== false){
            $this->_autos = array_filter($this->_autos, fn($x) => !Auto::Equals($a, $x));
            $this->_autos = array_values($this->_autos);
            return true;
        }
        //El auto ya esta en el garage
        return false;
    }
}
?>