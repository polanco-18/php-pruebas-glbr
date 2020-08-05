<?php 

require_once "conexion.php";

class ModeloPlazaVacante{

    // Mostrar AsigPlazaVacante
    static public function mdlListarAsig($tabla,$item,$valor,$Semestre){
        if($tabla != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $Semestre=:$Semestre");
            $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);         
            $stmt -> bindParam(":".$Semestre,$Semestre,PDO::PARAM_STR);         
            $stmt->execute();    
            return $stmt -> fetch();
        }else {
            $stmt = Conexion::conectar()->prepare("SELECT PL.ID_PLAZA_VACANTE,ASIGP.ID_ASIG_PLAZA_V,PL.PLAZA,PL.CARGO,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_M,PER.APELLIDO_P,PER.CORREO,PER.CORREO_INST,PER.CELULAR,PLA.AREA,PL.CARGO,PL.TIPO,PL.POSICION_CH,PL.HORA,SE.SEMESTRE FROM asig_plaza_vacante ASIGP INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE  INNER JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA LEFT JOIN persona PER on PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre 
            WHERE SE.ID_SEMESTRE='$Semestre' AND ASIGP.ESTADO=1");
            $stmt->execute();    
            return $stmt -> fetchAll();    
        }
        $stmt -> close(); 
        $stmt=null; 
    }
       // Mostrar AsigPlazaVacante
       static public function mdlListarAsigArea($valor,$Semestre){
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT ASIGP.ID_ASIG_PLAZA_V,PL.POSICION_CH,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PLA.AREA,PL.CARGO,PL.PLAZA FROM plaza_vacante PL INNER JOIN asig_curso ASIGC ON PL.ID_PLAZA_VACANTE=ASIGC.ID_PLAZA_VACANTE  INNER JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA INNER JOIN asig_plaza_vacante ASIGP ON ASIGP.ID_PLAZA_VACANTE=PL.ID_PLAZA_VACANTE LEFT JOIN persona PER ON PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN curso CUR ON CUR.ID_CURSO=ASIGC.ID_CURSO INNER JOIN categoria_curso CAT ON CAT.ID_CAT_CURSO=CUR.ID_CATEGORIA INNER JOIN ciclo CI ON CI.ID_ciclo=CUR.ID_ciclo INNER JOIN carrera CAR ON CAR.ID_CARRERA=CI.ID_CARRERA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre WHERE SE.ID_SEMESTRE=$Semestre AND ASIGP.ESTADO=1 AND CAR.NOMBRE like '%$valor%'");
            $stmt->execute();    
            return $stmt -> fetchAll();    
        $stmt -> close(); 
        $stmt=null; 
    }
     
}