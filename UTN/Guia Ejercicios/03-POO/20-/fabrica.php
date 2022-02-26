<?php
require_once("Operario.php");
Class Fabrica{
    private int $_cantMaxOperarios;
    private $_operarios= [];
    private string $_razonSocial;

    function __construct(string $rs){
        $this->_cantMaxOperarios = 5;
        $this->_razonSocial = $rs;
    }

    private function RetornarCostos():float{
        $totalSalarios = 0;
        foreach ($this->_operarios as $item) {
            $totalSalarios += $item->GetSalario();
        }
        return $totalSalarios;
    }
    public function MostrarOperarios():string{
        $infoOperarios = "";
        foreach ($this->_operarios as $item) {
            $infoOperarios .= "<br/>" . Operario::MostrarOperario($item);
        }
        return $infoOperarios;
    }
    public static function MostrarCosto(Fabrica $fb){
        echo($fb->RetornarCostos());
    }
    public static function Equals(Fabrica $fb, Operario $op):bool{
        // echo(in_array($op,$fb->_operarios));
        return in_array($op,$fb->_operarios);
    }
    public function Add(Operario $op){
        if(!Fabrica::Equals($this,$op) &&
         count($this->_operarios)<$this->_cantMaxOperarios){             
            array_push($this->_operarios,$op);
            return true;
         }
         return false;
    }
    public function Remove(Operario $op){
        if(Fabrica::Equals($this,$op)){
            unset($this->_operarios[array_search($op,$this->_operarios)]);
            return true;
         }
         return false;
    }
}
?>