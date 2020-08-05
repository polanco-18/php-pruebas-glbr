<?php 
class ControladorAdministracion
{    
    //Listar
    static public function ctrListar($item){ 
        $Semestre= $_SESSION["ID_SEMESTRE"];
        $respuesta=ModeloAdministracion::mdlListar($item,$Semestre);
        return $respuesta;
    }
    
}