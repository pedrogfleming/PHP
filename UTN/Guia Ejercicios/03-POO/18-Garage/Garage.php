<?php
include "Auto.php";
Class Garage{
    private  $_razonSocial;
    private  $_precioPorHora;
    private $_autos =[];

    function __construct(){
        // $this->_autos = array();
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$num_params = func_num_args();
		//cada constructor de un número dado de parámtros tendrá un nombre de función
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcion_constructor ='__construct'.$num_params;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcion_constructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}  
	//ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros
    
    
	function __construct0()	{
		$this->__construct1("Default");
	}	
    function __construct1( $_razonSocial){
		$this->__construct2($_razonSocial,0);
	}		
    function __construct2( $_razonSocial, $_precioPorHora){
        $this->_razonSocial = $_razonSocial;
		$this->_precioPorHora = $_precioPorHora;
        
	}
    public function MostrarGarage(){
        $s = array($this->_razonSocial,$this->_precioPorHora);
        $s = implode("<br/>",$s);   
        $s .= "<br/>"; 
        //Opcion 1
        //var_dump($this->_autos);
        foreach ($this->_autos as $item) {
            $s .= "<br/>" . Auto::MostrarAuto($item);
        }
        //Opcion 2
        // $auxArray = array_values($this->_autos);
        // foreach ($auxArray as $item) {
        //         $s .= "<br/>" . Auto::MostrarAuto($item);
        //     }
        return $s;
    }
    public function getAutos(){

    return $this->_autos;
    }
    public function ExistCar(Auto $a){

        return in_array($a, $this->_autos);
 
     }  
     
     public function getIndex(Auto $a){
         echo "<br>0003<br>";
         return array_search($a,$this->_autos);	
     }
     
     public function Add(Auto $a){
         if(!$this->ExistCar($a)){          
             array_push($this->_autos,$a);
             return true;
         }
         return false;
     }
     public function Remove(Auto $a){
     
     echo "<br>0001<br>";
 
         if (!$this->ExistCar($a)) 
         {return false;
 
         }
             echo "<br>0001-a <br>";
         $index = $this->getIndex($a);
         echo "<h2> el indice es : ". $index ."</h2>";
             unset($this->_autos[$index]);
             return true;
     }
}
?>