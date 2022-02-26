<?php
Class Operario{
    private int $_legajo;
    private string $_apellido;
    private string $_nombre;
    private float $_salario;

    function __construct(int $legajo,string $apellido,string $nombre="",float $salario=0){
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_salario = $salario;
    }
    public function Equals(Operario $op1,Operario $op2):bool{
        return $op1->_legajo == $op2->_legajo &&
        $op1->_apellido == $op2->_apellido &&
        $op1->$_nombre == $op2->_nombre;
        }
    public function GetNombreApellido():string{
        return $this->_apellido.",".$this->_nombre; 
    }
    public function GetSalario():float{
        return $this->_salario;
    }
    private function Mostrar(){
        return "<br/>Lp: ".strval($this->_legajo)."<br/>Salario: ".strval($this->_salario)."<br/>Apellido y nombre: ".$this->GetNombreApellido();
    }
    public static function MostrarOperario(Operario $op):string{
        return $op->Mostrar();
    }
    public function SetAumentarSalario(float $aumento){
        if($aumento > 0)
        $this->_salario += $this->_salario * $aumento/100;
        else
        echo("El aumento no puede ser negativo");
    }
}
?>