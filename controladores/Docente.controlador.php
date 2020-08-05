<?php 
class ControladorDocente{
    
    
    //Listar
    static public function ctrListar($item){ 
        $Semestre= $_SESSION["ID_SEMESTRE"];
        $respuesta=ModeloDocente::mdlListar($item,$Semestre);
        return $respuesta;
    }
    
}