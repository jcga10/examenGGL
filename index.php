<?php 
//incluimos las constantes globales
require_once 'config/config.php';

require_once 'core/routes.php';

//incluimos la conexión a bd
require_once 'config/database.php';

//inlcuimos el controlador de registros
require_once 'controller/Registros.php';
//iniciamos el controlador de registros

if(isset($_GET['c'])){
    $controller=cargarControlador($_GET['c']);

    if(isset($_GET['a'])){
        if(isset($_GET['id'])){
            cargarAccion($controller,$_GET['a'],$_GET['id']);
        }else{
             cargarAccion($controller,$_GET['a']);
        }
       
       
    }else{
         cargarAccion($controller,ACCION_PRINCIPAL);
    }
    
}else{
    $controller=cargarControlador(CONTROLADOR_PRINCIPAL);
    $accionTmp=ACCION_PRINCIPAL;
    $controller->$accionTmp();
}

?>