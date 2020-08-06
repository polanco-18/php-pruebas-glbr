<?php 

require_once "../controladores/Administracion.controlador.php"; 
 
require_once "../modelos/Administracion.modelo.php"; 

class AjaxAdministrativo{
    //Editar Administrativo
    public $idEditar;
    public function ajaxEditar(){ 
        $item=$this->idEditar;
        $respuesta=ControladorAdministracion::ctrListar($item);
        echo json_encode($respuesta);
    } 
}

//Editar Administrativo
if(isset($_POST["id"])){
    $editar=new AjaxAdministrativo();
    $editar->idEditar = $_POST["id"];
    $editar->ajaxEditar();
}  