<?php 
class ControladorPersonaActividad{

    
    //Listar
    static public function ctrListar(){ 
        $tabla="actividad_persona inner join persona on persona.ID_PERSONA=actividad_persona.ID_PERSONA";
        $respuesta=ModeloPersonaActividad::mdlListar($tabla);
        return $respuesta;
    } 

}