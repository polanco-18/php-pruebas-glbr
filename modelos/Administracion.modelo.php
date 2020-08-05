<?php 

require_once "conexion.php";

class ModeloAdministracion{

    //Listar
    static public function mdlListar($item,$Semestre){
            $stmt = Conexion::conectar()->prepare("select AD.ID_ADMINISTRATIVO,AD.CARGO,AD.CONDICION,AD.ROL,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CORREO_INST,PER.CORREO,PER.CELULAR,PER.TELEFONO from persona PER inner join administrativo AD on AD.ID_PERSONA=PER.ID_PERSONA where AD.ID_SEMESTRE=$Semestre order by PER.ID_PERSONA");
            $stmt->execute();    
            return $stmt -> fetchAll();        //fetch solamente devuelve un valor
          $stmt -> close(); 
        $stmt=null; 

    }

    
}