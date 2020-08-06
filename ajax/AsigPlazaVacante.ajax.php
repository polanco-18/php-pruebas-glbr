<?php 

require_once "../controladores/AsigPlazaVacante.controlador.php"; 
 
require_once "../modelos/AsigPlazaVacante.modelo.php"; 

class AjaxAsigPlazaVacante{
    //Editar 
    public $idBuscar;
    public function ajaxBuscar(){
        $valor=$this->idBuscar;
        $se=null;
        $respuesta=ControladorAsigPlazaVacante::ctrListarAsig($valor,$se);
        echo json_encode($respuesta);
    }
}


//Editar Usuario
if(isset($_POST["idBuscar"])){
    $editar=new AjaxAsigPlazaVacante();
    $editar->idBuscar = $_POST["idBuscar"];
    $editar->ajaxBuscar(); 
}