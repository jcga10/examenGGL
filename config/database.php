<?php 

    class Conectar{

        //? creamos la conexión a base de datos
        public static function obtenerConexion(){
            $password="";
            $user="root";
            $dbName="estacionamiento";
            $database= new PDO('mysql:host=localhost;dbname='.$dbName, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        }


    }

    

    
    


?>