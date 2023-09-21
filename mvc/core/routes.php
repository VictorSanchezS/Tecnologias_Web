<?php 

//función para validar el controlador
function validarControlador($controlador){
    $controller = ucfirst($controlador)."Controller";
    $file = "controllers/".$controller.".php";
    if(!is_file($file)){
        //echo "No existe el controlador definido <br>";
        view_error();
    }else{
        require_once $file;
        $control = new $controller();
        return $control;
    }
}
//función para validar las acciones
function validarAccion($controlador,$accion, $id= null){

    if(isset($accion) && method_exists($controlador, $accion)){
        if($id == null){
            $controlador->$accion();
        }else{
            $controlador->$accion($id);
        }
    }else{
        //echo "No existe la función definada<br>";
        view_error();
    }
}

function view_error(){
    $data["contenido"] = ERROR_404;
    require_once TEMPLATE;
}
