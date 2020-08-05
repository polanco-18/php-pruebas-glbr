<?php 
class ControladorCategoriaAsis{

    
    //Listar
    static public function ctrListar(){ 
        $tabla="categoria_asistencia";
        $respuesta=ModeloCategoriaAsis::mdlListar($tabla);
        return $respuesta;
    }
    

}