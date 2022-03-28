<?php
Class InUsuarios{
    public static function requestApi(string $method, array $data=null)
    {
        
        try {
            //code...
            $response=setErrorResponse("Petición incorrecta.");
            switch ($method){
                case METHOD_ADD:
                    return InUsuarios::putUsuario($data);
                    break;
                case METHOD_GET:
                    return InUsuarios::getAllUsuarios();
                    break;
                case METHOD_UPDATE:
                    
                    break;
                default:
                    throw new Exception("Método (".$method.") no definido.");
                    break;
            }
            return $response;
        } catch (\Throwable $th) {
            echo("<br>". "Error:"  . $th . "</br>");
        }
    }

    public function getAllUsuarios()
    {
        $resultSet = Usuario::GetUsuarios();
        if ($resultSet == null) {
            return setErrorResponse($usuarioObject->getErrorMessage());
        } else {
            return $resultSet;
        }
    }

    /**
     * @param array $personaObject
     * @return array
     */
    private function putUsuario(array $personaObject)
    {
        try {
            if (sizeof($personaObject) == 0) {
                // return setErrorResponse("El objecto Usuario no existe en PutUsuario");
                return false;
            }
            if (ControladorUsuario::InsertNuevoUsuario(ControladorUsuario::CrearUsuarioArray($personaObject))) {
                // return array(JSON_ERROR => false);
                return true;
            }
        } catch (\Throwable $th) {
            throw new Exception($th,0);
        }
    }
    
}
?>