<?php 

require_once "conexion.php";

class ModeloDocente{

    //Listar Docente
    static public function mdlListar($item,$Semestre){
            $stmt = Conexion::conectar()->prepare("select ASIG.OBSERVACION,PLA.AREA, ASIG.ID_ASIG_PLAZA_V,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CORREO_INST,PER.CORREO,PER.CELULAR,PER.TELEFONO from asig_plaza_vacante ASIG inner join plaza_vacante PL on PL.ID_PLAZA_VACANTE=ASIG.ID_PLAZA_VACANTE  INNER JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA inner join persona PER on PER.ID_PERSONA=ASIG.ID_PERSONA WHERE PL.ID_SEMESTRE=$Semestre and PL.TIPO!='ASISTENTE' order by PER.ID_PERSONA");
            $stmt->execute();    
            return $stmt -> fetchAll();        //fetch solamente devuelve un valor
          $stmt -> close(); 
        $stmt=null; 

    }

    
}