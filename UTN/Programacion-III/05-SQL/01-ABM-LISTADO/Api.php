<?php
$_SERVER['REQUEST_METHOD'];
if($metodo == 'POST')
{
    include_once "CrearAlumno.php";
}
else if($metodo == 'GET')
{
    include_once "MostrarAlumno.php";
}
else if($metodo == 'DELETE')
{
    include_once "BorrarAlumno.php";
}
else if($metodo == 'PUT')
{
    include_once "ModificarAlumno.php";
}

$response = setErrorResponse("Bad request");
if (isset($_POST[DATA])) {
    $dataReceive = $_POST[DATA];
    if (isset($dataReceive[METHOD], $dataReceive[ENTITY])){
        $response=getActionData($dataReceive[METHOD],$dataReceive[ENTITY]);
        echo $response;
    }
}
function getActionData(string $method, array $entity)
{
    switch ($entity[ENTITY_NAME]){
        case ENTITY_USUARIO:
            return InUsuarios::requestApi($method, isset($entity[DATA])?$entity[DATA]:null);
        case ENTITY_PRODUCTO:
            return InFrutas::requestApi($method, isset($entity[DATA])?$entity[DATA]:null);
        default:
            return setErrorResponse("No hay una función definida para la entidad ".$entity[ENTITY_NAME]);
    }
}
function setErrorResponse(string $errorMessage = null)
{
    if ($errorMessage == null) {
        return array(JSON_ERROR => false);
    }
    return array(JSON_ERROR => true, JSON_MESSAGE => $errorMessage);
}

?>