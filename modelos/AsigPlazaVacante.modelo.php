<?php 

require_once "conexion.php";

class ModeloAsigPlazaVacante{

    // Mostrar AsigPlazaVacante
    static public function mdlListarAsig($id,$Semestre){
        if($id != null){
            $stmt = Conexion::conectar()->prepare("SELECT PL.ID_PLAZA_VACANTE,ASIGP.ESTADO,ASIGP.OBSERVACION,ASIGP.ID_ASIG_PLAZA_V,PL.PLAZA,PL.CARGO,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CORREO,PER.CELULAR, PLA.AREA,PL.CARGO,PL.TIPO,PL.POSICION_CH,PL.HORA,SE.SEMESTRE FROM asig_plaza_vacante ASIGP INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE  left JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA LEFT JOIN persona PER on PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre 
            WHERE ASIGP.ID_ASIG_PLAZA_V=$id");   
            $stmt->execute();    
            return $stmt -> fetch(); 
        }else {
            $stmt = Conexion::conectar()->prepare("SELECT PL.ID_PLAZA_VACANTE,ASIGP.ESTADO,ASIGP.OBSERVACION,ASIGP.ID_ASIG_PLAZA_V,PL.PLAZA,PL.CARGO,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_M,PER.APELLIDO_P,PER.CORREO,PER.CELULAR,PLA.AREA,PL.CARGO,PL.TIPO,PL.POSICION_CH,PL.HORA,SE.SEMESTRE FROM asig_plaza_vacante ASIGP INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE left JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA LEFT JOIN persona PER on PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre WHERE SE.ID_SEMESTRE=$Semestre ORDER BY `PL`.`POSICION_CH` ASC");   
            $stmt->execute();    
            return $stmt -> fetchAll();    
        }
        $stmt -> close(); 
        $stmt=null; 
    }
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `asig_plaza_vacante` WHERE ID_ASIG_PLAZA_V=:ID_ASIG_PLAZA_V"); 
        $stmt -> bindParam(":ID_ASIG_PLAZA_V",$id,PDO::PARAM_STR);      
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlListarPlazaV($Semestre){
        $stmt = Conexion::conectar()->prepare("SELECT PL.ID_PLAZA_VACANTE, PL.POSICION_CH,PL.PLAZA,PL.CARGO,PL.TIPO FROM plaza_vacante PL where PL.ID_SEMESTRE=$Semestre AND PL.ID_PLAZA_VACANTE NOT IN (SELECT ASI.ID_PLAZA_VACANTE FROM asig_plaza_vacante ASI INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASI.ID_PLAZA_VACANTE WHERE ASI.ESTADO=1 AND PL.ID_SEMESTRE=$Semestre) order by PL.POSICION_CH");
        $stmt->execute();    
        return $stmt -> fetchAll();
        $stmt -> close(); 
        $stmt=null; 
    }
    static public function mdlListarPersona($Semestre){
        $stmt = Conexion::conectar()->prepare("SELECT PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M FROM persona PER where PER.ID_PERSONA NOT IN (SELECT ASI.ID_PERSONA FROM asig_plaza_vacante ASI INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASI.ID_PLAZA_VACANTE WHERE PL.ID_SEMESTRE=$Semestre) order by PER.ID_PERSONA");
        $stmt->execute();    
        return $stmt -> fetchAll();
        $stmt -> close(); 
        $stmt=null; 
    } 
    // Mostrar AsigPlazaVacante
    static public function mdlListarAsig2($id,$Semestre){
        if($tabla != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM asig_plaza_vacante WHERE $item = :$item AND $Semestre=:$Semestre");
            $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);         
            $stmt -> bindParam(":".$Semestre,$Semestre,PDO::PARAM_STR);         
            $stmt->execute();    
            return $stmt -> fetch();
        }else {
            $stmt = Conexion::conectar()->prepare("SELECT PL.ID_PLAZA_VACANTE,ASIGP.ESTADO,ASIGP.ID_ASIG_PLAZA_V,PL.PLAZA,PL.CARGO,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_M,PER.APELLIDO_P,PER.CORREO,PER.CELULAR,PLA.AREA,PL.CARGO,PL.TIPO,PL.POSICION_CH,PL.HORA,SE.SEMESTRE FROM asig_plaza_vacante ASIGP INNER JOIN plaza_vacante PL ON PL.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE  left JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA LEFT JOIN persona PER on PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre 
            WHERE SE.ID_SEMESTRE='$Semestre' AND ASIGP.ESTADO=1");
            $stmt -> bindParam(":".$Semestre,$Semestre,PDO::PARAM_STR);   
            $stmt->execute();    
            return $stmt -> fetchAll();    
        }
        $stmt -> close(); 
        $stmt=null; 
    } /**borrar 
    static public function mdlListarAsigArea($valor,$Semestre){
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT ASIGP.ID_ASIG_PLAZA_V,PL.POSICION_CH,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PLA.AREA,PL.CARGO,PL.PLAZA FROM plaza_vacante PL INNER JOIN asig_curso ASIGC ON PL.ID_PLAZA_VACANTE=ASIGC.ID_PLAZA_VACANTE  left JOIN plaza_vacante_area PLA on PLA.ID=PL.ID_AREA INNER JOIN asig_plaza_vacante ASIGP ON ASIGP.ID_PLAZA_VACANTE=PL.ID_PLAZA_VACANTE LEFT JOIN persona PER ON PER.ID_PERSONA=ASIGP.ID_PERSONA INNER JOIN curso CUR ON CUR.ID_CURSO=ASIGC.ID_CURSO INNER JOIN categoria_curso CAT ON CAT.ID_CAT_CURSO=CUR.ID_CATEGORIA INNER JOIN ciclo CI ON CI.ID_ciclo=CUR.ID_ciclo INNER JOIN carrera CAR ON CAR.ID_CARRERA=CI.ID_CARRERA INNER JOIN semestre SE ON SE.ID_semestre=PL.ID_semestre WHERE SE.ID_SEMESTRE=$Semestre AND ASIGP.ESTADO=1 AND CAR.NOMBRE like '%$valor%'");
        $stmt->execute();    
        return $stmt -> fetchAll();    
        $stmt -> close(); 
        $stmt=null; 
    } */
    static public function mdlCrear($id,$idPer){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `asig_plaza_vacante`(ID_PLAZA_VACANTE,ID_PERSONA) values (:ID_PLAZA_VACANTE,:ID_PERSONA)");
        $stmt -> bindParam(":ID_PLAZA_VACANTE",$id,PDO::PARAM_STR);
        $stmt -> bindParam(":ID_PERSONA",$idPer,PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlEditar($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE asig_plaza_vacante SET ESTADO=:ESTADO,OBSERVACION=:OBSERVACION WHERE ID_ASIG_PLAZA_V=:ID_ASIG_PLAZA_V");  
        $stmt -> bindParam(":ESTADO",$datos["ESTADO"],PDO::PARAM_STR);       
        $stmt -> bindParam(":OBSERVACION",$datos["OBSERVACION"],PDO::PARAM_STR); 
        $stmt -> bindParam(":ID_ASIG_PLAZA_V",$datos["ID_ASIG_PLAZA_V"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    } 
     
}