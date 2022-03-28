<?php
class Venta{
    private int $_idProducto;
    private int $_idUsuario;
    private int $_cantidad;
    private DateTime $_fechaVenta;

    function __construct(int $idProducto,int $idUsuario,int $cantidad,$fechaVenta=null){
        $this->_idProducto = $idProducto;
        $this->_idUsuario = $idUsuario;
        $this->_cantidad = $cantidad;
        if($fechaAlta == null)
            $this->$_fechaVenta =  date_create("now");
        else
            $this->_fechaVenta = $fechaVenta;
    }
    
}




?>