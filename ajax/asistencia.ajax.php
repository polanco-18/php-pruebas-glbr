<?php 

require_once "../controladores/Asistencia.controlador.php"; 
 
require_once "../modelos/Asistencia.modelo.php"; 

class AjaxAsistencia{
    //Editar Usuario
    public $idUsuario;
    public function ajaxEditar(){
        $valor=$this->idUsuario;
        $respuesta=ControladorAsistencia::ctrBusEditar($valor);
        echo json_encode($respuesta);
    } 
    
    public $idObservacion;
    public function ajaxObservacion(){
        $valor=$this->idObservacion;
        $respuesta=ControladorAsistencia::ctrBusEditar($valor);
        echo json_encode($respuesta);
    }     
    public $FechaI; 
    public $FechaF; 
    public function ajaxbuscar(){
        $valor=$this->FechaI;
        $valor2=$this->FechaF;
        $valor3='Docentes';
        $valor4=null;
        $respuesta=ControladorAsistencia::ctrBusFecha($valor,$valor2,$valor3,$valor4); 
        echo json_encode($respuesta);
    }
}


//Editar Usuario
if(isset($_POST["idEditar"])){
    $editar=new AjaxAsistencia();
    $editar->idUsuario = $_POST["idEditar"];
    $editar->ajaxEditar();
} 
//Editar Observacion 
if(isset($_POST["observacion"])){ 
    $observacion=new AjaxAsistencia();
    $observacion->idObservacion = $_POST["observacion"];
    $observacion->ajaxObservacion();
} 
//Editar buscar 
if(isset($_POST["FechaIn"])){ 
    $buscar=new AjaxAsistencia();
    $buscar->FechaI = $_POST["FechaIn"]; 
    $buscar->FechaF = $_POST["FechaFi"]; 
    $buscar->ajaxbuscar();
} 