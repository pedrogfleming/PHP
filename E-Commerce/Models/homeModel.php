<?php
class HomeModel extends MySQL{
    public function __construct(){
        parent::__construct();
    }
    public function SetUser(string $nombre,int $edad){
        $query_insert = "INSERT INTO usuarios(nombre,edad) VALUES(?,?)";
        $arrData = array($nombre,$edad);
        $request_insert = $this->Insert($query_insert,$arrData);
        return $request_insert;
    }
}



?>