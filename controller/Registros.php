<?php 

//clade del controlador de registros
class RegistrosController{
    
    public function __construct()
    {
        require_once "models/RegistrosModel.php";
    }

    //creamos la función index, que mostrará todos los datos de registros y tipo
    public function index(){
        //requerimos el modelo de registros
        require_once 'models/RegistrosModel.php';
        $registros= new Registros_model();

        //asiganamos los modelos a los arreglos
        $data["titulo"]="Registros";
        $data["registros"]=$registros->get_registros();
        $data["tipo"]=$registros->get_tipo();

        //llamamos la vista de registtod
        require_once "views/Registros/registros.php";
    }

    public function new(){

        //requerimos el modelo de registros
        require_once 'models/RegistrosModel.php';
        $registro= new Registros_model();

        //asiganamos los modelos a los arreglos
        $data["titulo"]="Agregar Registro";
        $data["tipo"]=$registro->get_tipo();

        //llamamos la vista de registtod
        require_once "views/Registros/registro.php";

    }

    public function save(){

        $placas=$_POST['placas'];
        $tipo=$_POST['tipo'];
        $entrada=$_POST['entrada'];

        $registros = new Registros_model();
        $registros->insert($placas,$tipo,$entrada);

        $data['titulo']="Registros";

        $this->index();

    }


    public function edit($id){

        $registro = new Registros_model();
        $data['id']=$id;
        $data['registro']=$registro->get_registro($id);
        $data['titulo']="Registro Editar";

        require_once "views/Registros/registroEditar.php";

    }


    public function actualizar(){

        $salida=$_POST['salida'];
        $id=$_POST['id'];

        $registros = new Registros_model();
        $registros->editar($salida,$id);

        $data['titulo']="Registros";

        $this->index();

    }


    public function descargarpdf(){

        require_once 'models/RegistrosModel.php';
        $registros= new Registros_model();

        //asiganamos los modelos a los arreglos
        $data["titulo"]="Registros";
        $data["registros"]=$registros->get_registros();
        $data["tipo"]=$registros->get_tipo();
        $data['titulo']="Registro Editar";

        require_once 'libreria/pdf_mc_table.php';
        require_once "views/Registros/pdf.php";

    }


    public function descargarExcel(){

        require_once 'models/RegistrosModel.php';
        $registros= new Registros_model();

        //asiganamos los modelos a los arreglos
        $data["titulo"]="Registros";
        $data["registros"]=$registros->get_registros();
        $data["tipo"]=$registros->get_tipo();
        $data['titulo']="Registro Editar";

       
        require_once "views/Registros/excel.php";

    }

}

?>