<?php
    
// Class IdProducto{
//     private static int $_number = 1;
//         public static Function GetId(){
//             $ret = IdProducto::$_number;
//             IdProducto::$_number++;
//             return $ret;
//         }
//     }
Class Producto implements \JsonSerializable{

    // public $STATUS_PRODUCTO = array(
    //     'INGRESADO' => 0,
    //     'ACTUALIZADO' => 1,
    //     'NULL'=>2     
    // );
    private int $_codBarra;
    private string $_nombre;
    private  string $_tipo;
    private int $_stock;
    private float $_precio;
    private Datetime $_fecha_de_creacion;
    private Datetime $_fecha_de_modificacion;

    function __construct($codBarra,$nombre ="",
        $tipo="",$stock=0,$precio=0,$fCreacion = null,$fModificacion = null){
             $this->_codBarra = $codBarra;
             $this->_nombre = $nombre;
             $this->_tipo = $tipo;
             $this->_stock = $stock;
             $this->_precio = $precio;
             if($fCreacion == null)
                $this->_fecha_de_creacion = date_create("now");
             else
                $this->_fecha_de_creacion = $fCreacion;
             if($fModificacion == null)
                $this->_fecha_de_modificacion = date_create("now");
             else
                $this->_fecha_de_modificacion = $fModificacion;
    }

    public function GetCodBarra(){
        return $this->_codBarra;
    }
    public function GetNombre(){
        return $this->_nombre;
    }
    public function GetTipo(){
        return $this->_tipo;
    }
    public function GetStock(){
        return $this->_stock;
    }
    public function GetPrecio(){
        return $this->_precio;
    }
    public function GetFechaCreacion(){
        return $this->_fecha_de_creacion;
    }
    public function GetFechaModificion(){
        return $this->_fecha_de_modificacion;
    }


    private function AumentarStock(){
        $this->_stock++;
    }
    public static function Equals(Producto $p1,Producto $p2){
        return $p1->_codBarra == $p2->_codBarra;
    }
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    public function SerializarProducto(){
        return json_encode($this);
    }
    public static function SerializarProductos($productos){
        $jsonString = "";
        foreach ($productos as $item) {
            $jsonString .= $item->SerializarProducto();
        }
        return $jsonString;
    }
    public static function ExisteProducto($productos,Producto $p2){
        foreach ($productos as $item) {
            if(Producto::Equals($item,$p2)){
                return true;
            }
        }
        return false;
    }
    
    /**
     * @param $productos array de productos
     * @param Producto $p2 Producto a agregar en el array
     * return string "Agregado" si no existia y lo pudo agregar
     * return string "Modificado" si existia y lo modifico
     * return null si no pudo hacer
     */
    public static function Add($productos,Producto $p2){
        $ret = Producto::ExisteProducto($productos,$p2);
        if(!$ret){
            array_push($producto,$p2);      
            return "Agregado Producto";                  
        }
        else if($ret){
            $key = array_search($p2,$productos);
            $productos[$key]->AumentarStock();
            return "Stock Aumentado";
        }
        return null;        
    }

}



?>