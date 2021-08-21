<?php 

function cargarControlador($controlador){
    //asignamos que controlador se requiere
    $nombreControlador= ucwords($controlador."Controller");

    //Asignamos el nombre del archivo php
    $archivoControlador='controller/'.ucwords($controlador).".php";

    //verificamos si existe el archivo
    if(!is_file($archivoControlador)){
        //asignamos el arhivo por defecto
        $archivoControlador='controller/'.CONTROLADOR_PRINCIPAL.'.php';
    }

    //echo $archivoControlador;
    //requerimos el cotrolador
    require_once $archivoControlador;
    
    //iniciamos un objeto del clase del controlador
    $control= new $nombreControlador();

    return $control;
}

function cargarAccion($controller, $accion, $id=null){
    if(isset($accion)&& method_exists($controller,$accion)){
        if($id==null){
            $controller->$accion();
        }else{
            $controller->$accion($id);
        }
       
    }else{
        $controller->ACCION_PRINCIPAL();
    }
}

?>