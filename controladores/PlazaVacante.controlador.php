<?php 
class ControladorPlazaVacante{
 
    //Listar
    static public function ctrListarAsig($id,$valor){
        $Semestre=$_SESSION["ID_SEMESTRE"];
        $item=$id;
        $tabla=null;
        $respuesta=ModeloPlazaVacante::mdlListarAsig($tabla,$item,$valor,$Semestre);
        return $respuesta;
    }     //Listar
    static public function ctrListarAsigArea($valor){
        $Semestre=$_SESSION["ID_SEMESTRE"]; 
        $respuesta=ModeloPlazaVacante::mdlListarAsigArea($valor,$Semestre);
        return $respuesta;
    } 


}