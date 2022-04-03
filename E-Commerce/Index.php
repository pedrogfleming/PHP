<?php
require_once("Config/Config.php");
//https://www.javatpoint.com/how-to-get-current-page-url-in-php#:~:text=To%20get%20the%20current%20page,always%20available%20in%20all%20scope.
// $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
// foreach ($_SERVER as $key => $value) {
//     echo $key .' contiene: ' . $value . '</br>';
// }
// $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
//echo $_SERVER['HTTP_HOST'];//localhost:3000
//echo $_SERVER['REQUEST_URI'];///E-Commerce/usuario/100
// echo "The URL of current page: ".$CurPageURL;  

// $url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
//http://localhost:3000/E-Commerce/menuPrincipal/Alta/100
// /menuPrincipal/Alta/100Array ( [0] => [1] => menuPrincipal [2] => Alta [3] => 100 )
$arrUrl = explode("/", $_SERVER['PATH_INFO']);

$controller = $arrUrl[1];
$method = $arrUrl[1];
$params = "";
if(!empty($arrUrl)){
    if($arrUrl[2] != ""){
        $method = $arrUrl[2];
    }
}
if(!empty($arrUrl[3])){
    if($arrUrl[3] != ""){
        for ($i=2; $i < count($arrUrl); $i++) { 
            $params .= $arrUrl[$i].",";
        }
        //Delete the last ',' at the last param
        $params = trim($params,',');
    }
}

spl_autoload_register(function($class){
    if(file_exists(LIBS.'Core/'.$class.".php")){
        require_once(LIBS.'Core/'.$class.".php");
    }
});
$controllerFile = "Controllers/".$controller.".php";
if(file_exists($controllerFile)){
    require_once($controllerFile);
    $controller = new $controller();
    if(method_exists($controller, $method)){        
        if(!empty($params)){
            
            $controller->{$method}($params);
        }else{
            $controller->{$method}();
        }
    }else{
        echo "Method not found";
    }
}else{
    echo "Controller not found";
}


?>