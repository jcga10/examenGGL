<?php 

class Registros_model{
    //iniciamos nuetras variables
    private $db;
    private $registros;
    private $tipo;

    //definimos el metodo constructor
    public function __construct(){
        $this->db=Conectar::obtenerConexion();
        $this->registros=array();
        $this->tipo=array();

    }


    //función para obtener los registros de la bd
    public function get_registros(){
        $sql="SELECT * FROM registros";
        $result=$this->db->query($sql);

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $this->registros[]=$row;
        }
    
        return $this->registros;
    }


    //función para obtener los tipos de la bd
    public function get_tipo(){
        $sql="SELECT * FROM tipo";
        $result=$this->db->query($sql);

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $this->tipo[]=$row;
        }
    
        return $this->tipo;
    }


    public function insert($placas,$tipo,$entrada){
        $result=$this->db->query("INSERT INTO registros (placas, fk_tipo, hora_entrada) VALUES('$placas',$tipo, '$entrada')");
        
    }


    public function editar ($salida,$id){
        $result=$this->db->query("UPDATE registros SET hora_salida='$salida' WHERE id_registro =$id");

    }


    
    //función para obtener un registro por id
    public function get_registro($id){
        $sql="SELECT * FROM registros WHERE id_registro='$id' LIMIT 1";
        $result=$this->db->query($sql);

        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row ;
    }
    


}

?>