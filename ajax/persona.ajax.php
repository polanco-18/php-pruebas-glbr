<?php 

require_once "../controladores/Persona.controlador.php"; 
 
require_once "../modelos/Persona.modelo.php"; 

class Ajax{
    //Editar 
    public $id;
    public function ajaxEditar(){
        $item = "ID_PERSONA";
        $valor=$this->id;
        $respuesta=ControladorPersona::ctrListar($item,$valor);
        echo json_encode($respuesta);
    } 
}


//Editar 
if(isset($_POST["id"])){
    $editar=new Ajax();
    $editar->id = $_POST["id"];
    $editar->ajaxEditar();
} 
 
 