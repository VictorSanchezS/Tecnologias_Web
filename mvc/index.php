<?php 

//var_dump($_GET);
//echo $_GET["controller"];
//echo $_GET["action"];

require_once "core/routes.php";
require_once "config/config.php";
require_once "config/Conexion.php";

if(!empty($_GET["controller"])){
    
    $controller = validarControlador($_GET["controller"]);
    
    if(!empty($_GET["action"])){
        //validarAccion($controller, $_GET["action"]);

        if(!empty($_GET["id"])){
            validarAccion($controller, $_GET["action"], $_GET["id"]);
        }else{
            validarAccion($controller, $_GET["action"]);
        }
    }else{
        validarAccion($controller, ACCION_DEFAULT);
    }

}else{
    $controller = validarControlador(CONTROLADOR_DEFAULT);
    $action = ACCION_DEFAULT;
    $controller->$action();
}


?>