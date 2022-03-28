<?php
Class InProductos{
    public static function requestApi(string $method, array $data=null)
    {
        $inProductos=new InProductos();
        $response=setErrorResponse("Petición incorrecta.");
        switch ($method){
            case METHOD_ADD:
                return $inProductos->putProducto($data);
                break;
            case METHOD_GET:
                return $inProductos->getAllProductos();
                break;
            case METHOD_UPDATE:
                
                break;
            default:
                $response=setErrorResponse("Método (".$method.") no definido.");
        }
        return $response;
    }

    public function getAllProductos()
    {
        $resultSet = Producto::GetUsuarios();
        if ($resultSet == null) {
            return setErrorResponse($productoObject->getErrorMessage());
        } else {
            return $resultSet;
        }
    }

    /**
     * @param array $personaObject
     * @return array
     */
    private function putProducto(array $personaObject)
    {
        if (sizeof($personaObject) == 0) {
            return setErrorResponse("El objecto Producto no existe en PutUsuario");
        }
        $productoObject = new Producto();
        if ($productoObject->insertNewPersona($productoObject->createPersonaArray($personaObject))) {
            return array(JSON_ERROR => false);
        } else {
            return setErrorResponse($productoObject->getErrorMessage());
        }
    }

}
?>