<?php 

require_once "conexion.php";

class ModeloAsistencia{
   //Listar Asistencia
   static public function mdlListar($valor,$Semestre){
            if($valor!=null){
            $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M, ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,ASI.OBSERVACION,ASI.HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA LEFT JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where PER.ID_PERSONA='$valor' AND SE.ID_SEMESTRE=$Semestre order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
            $stmt->execute();    
            return $stmt -> fetchAll();      
            }else{
               $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,ASI.OBSERVACION,ASI.HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA LEFT JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI WHERE SE.ID_SEMESTRE=$Semestre order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
               $stmt->execute();    
               return $stmt -> fetchAll();         
            }
            $stmt -> close(); 
            $stmt=null; 

   }
   //Validar Asistencia
   static public function mdlValidar($valor,$fecha,$Semestre){ 
         $stmt = Conexion::conectar()->prepare("select DISTINCT ASI.ID_ASISTENCIA,ASI.ENTRADA_HORA  from asistencia ASI INNER JOIN semestre SE ON SE.ID_semestre=ASI.ID_SEMESTRE WHERE SE.ID_SEMESTRE=$Semestre AND ASI.ID_CATEGORIA_ASI=1 and ASI.ID_PERSONA='$valor' and ENTRADA_FECHA='$fecha' ");
         $stmt->execute();    
         return $stmt -> fetch(); 
         $stmt -> close(); 
         $stmt=null; 
   }

   //Buscar para Editar
   static public function mdlBusEditar($valor){
      $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M, ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE, ASI.ENTRADA_FECHA,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.ENTRADA_HORA,ASI.ID_CATEGORIA_ASI,CTASI.COLOR,CTASI.CATEGORIA,ASI.OBSERVACION,ASI.DIA,ASI.HORA_SALIDA from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where ASI.ID_ASISTENCIA=$valor");
      $stmt->execute();    
      return $stmt -> fetch(); 
      $stmt -> close(); 
      $stmt=null; 
   }

   //Buscar para Fecha
   static public function mdlBusFecha($valor,$valor2,$valor3,$valor4,$Semestre){
      if($valor==null){
         $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,IFNULL(ASI.OBSERVACION,'')AS OBSERVACION, IFNULL(ASI.HORA_SALIDA,'')AS HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA LEFT JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where ASI.ID_SEMESTRE=$Semestre order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
      }else {
         if($valor3=='Docentes'){
            $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,IFNULL(ASI.OBSERVACION,'')AS OBSERVACION, IFNULL(ASI.HORA_SALIDA,'')AS HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE inner join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA inner JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where PLA.POSICION_CH>0 and ASI.ID_SEMESTRE=$Semestre and ASI.ENTRADA_FECHA BETWEEN '$valor' AND '$valor2' order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
         }else if($valor3=='Administrativos'){
            $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,IFNULL(ASI.OBSERVACION,'')AS OBSERVACION, IFNULL(ASI.HORA_SALIDA,'')AS HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA left JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN administrativo ADM on ADM.ID_PERSONA=PER.ID_PERSONA INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where ASI.ID_SEMESTRE=$Semestre and ASI.ENTRADA_FECHA BETWEEN '$valor' AND '$valor2' order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
         }else if($valor4!=null) {
            $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,IFNULL(ASI.OBSERVACION,'')AS OBSERVACION, IFNULL(ASI.HORA_SALIDA,'')AS HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA LEFT JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where ASI.ENTRADA_FECHA BETWEEN '$valor' AND '$valor2' and ASI.ID_PERSONA='$valor4' AND ASI.ID_SEMESTRE=$Semestre order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
         }else {
            $stmt = Conexion::conectar()->prepare("select ASI.FECHA_M,ASI.ID_ASISTENCIA,ASI.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CELULAR,PER.CORREO,SE.SEMESTRE,IF(ASI.TURNO='N','Nocturno','Diurno') as TURNO ,ASI.DIA, ASI.ENTRADA_FECHA,ASI.ENTRADA_HORA,CTASI.COLOR,CTASI.CATEGORIA,IFNULL(ASI.OBSERVACION,'')AS OBSERVACION, IFNULL(ASI.HORA_SALIDA,'')AS HORA_SALIDA,PLA.POSICION_CH from asistencia ASI inner join persona PER on PER.ID_PERSONA=ASI.ID_PERSONA inner join semestre SE on SE.ID_semestre=ASI.ID_SEMESTRE left join asig_plaza_vacante ASIGP ON ASIGP.ID_PERSONA=PER.ID_PERSONA LEFT JOIN plaza_vacante PLA ON PLA.ID_PLAZA_VACANTE=ASIGP.ID_PLAZA_VACANTE INNER JOIN categoria_asistencia CTASI ON CTASI.ID_CATEGORIA_ASI=ASI.ID_CATEGORIA_ASI where ASI.ENTRADA_FECHA BETWEEN '$valor' AND '$valor2' and ASI.ID_SEMESTRE=$Semestre order by ASI.ENTRADA_FECHA desc , ASI.ENTRADA_HORA desc");
         }
    }
    $stmt->execute();    
      return $stmt -> fetchAll(); 
      $stmt -> close(); 
      $stmt=null; 
   }

   //Registro de Entrada
   static public function mdlEntrada($datos){
      $stmt = Conexion::conectar()->prepare("INSERT INTO asistencia (ID_PERSONA,ENTRADA_FECHA,ENTRADA_HORA,ID_SEMESTRE,ID_CATEGORIA_ASI,DIA,TURNO) values(:ID_PERSONA,:ENTRADA_FECHA,:ENTRADA_HORA,:ID_SEMESTRE,:ID_CATEGORIA_ASI,:DIA,:TURNO)");
      $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR); 
      $stmt -> bindParam(":ENTRADA_FECHA",$datos["ENTRADA_FECHA"],PDO::PARAM_STR);
      $stmt -> bindParam(":ENTRADA_HORA",$datos["ENTRADA_HORA"],PDO::PARAM_STR);
      $stmt -> bindParam(":ID_SEMESTRE",$datos["ID_SEMESTRE"],PDO::PARAM_STR);
      $stmt -> bindParam(":ID_CATEGORIA_ASI",$datos["ID_CATEGORIA_ASI"],PDO::PARAM_STR);
      $stmt -> bindParam(":DIA",$datos["DIA"],PDO::PARAM_STR); 
      $stmt -> bindParam(":TURNO",$datos["TURNO"],PDO::PARAM_STR); 
      if($stmt->execute()){
         return "ok";            
      }
      else{
         return "error";
      }
      $stmt->close();
      $stmt=null;
   }
   //Editar
   static public function mdlSalida($datos){
      $stmt = Conexion::conectar()->prepare("UPDATE asistencia SET HORA_SALIDA=:HORA_SALIDA,ID_CATEGORIA_ASI=:ID_CATEGORIA_ASI WHERE ID_ASISTENCIA=:ID_ASISTENCIA");   
      $stmt -> bindParam(":HORA_SALIDA",$datos["HORA_SALIDA"],PDO::PARAM_STR);           
      $stmt -> bindParam(":ID_CATEGORIA_ASI",$datos["ID_CATEGORIA_ASI"],PDO::PARAM_STR);        
      $stmt -> bindParam(":ID_ASISTENCIA",$datos["ID_ASISTENCIA"],PDO::PARAM_STR);
      if($stmt->execute()){
          return "ok";            
      }
      else{
          return "error";
      }
      $stmt->close();
      $stmt=null;
  }
     //Editar
     static public function mdlEditarObser($datos){
      $stmt = Conexion::conectar()->prepare("UPDATE asistencia SET FECHA_M=:FECHA_M, OBSERVACION=:OBSERVACION, ID_CATEGORIA_ASI=:ID_CATEGORIA_ASI,ENTRADA_HORA=:ENTRADA_HORA,HORA_SALIDA=:HORA_SALIDA WHERE ID_ASISTENCIA=:ID_ASISTENCIA");   
      $stmt -> bindParam(":OBSERVACION",$datos["OBSERVACION"],PDO::PARAM_STR);     
      $stmt -> bindParam(":FECHA_M",$datos["FECHA_M"],PDO::PARAM_STR);            
      $stmt -> bindParam(":ID_CATEGORIA_ASI",$datos["ID_CATEGORIA_ASI"],PDO::PARAM_STR);   
      $stmt -> bindParam(":ENTRADA_HORA",$datos["ENTRADA_HORA"],PDO::PARAM_STR);  
      $stmt -> bindParam(":HORA_SALIDA",$datos["HORA_SALIDA"],PDO::PARAM_STR);           
      $stmt -> bindParam(":ID_ASISTENCIA",$datos["ID_ASISTENCIA"],PDO::PARAM_STR);
      if($stmt->execute()){
          return "ok";            
      }
      else{
          return "error";
      }
      $stmt->close();
      $stmt=null;
  }

   //ValidarCierre
   static public function mdlValidarCierre($Semestre,$FEchaVal){
      $stmt = Conexion::conectar()->prepare("UPDATE asistencia SET ID_CATEGORIA_ASI=4 WHERE ID_SEMESTRE=:ID_SEMESTRE AND ID_CATEGORIA_ASI=1 AND ENTRADA_FECHA=:ENTRADA_FECHA");   
      $stmt -> bindParam(":ID_SEMESTRE",$Semestre,PDO::PARAM_STR);            
      $stmt -> bindParam(":ENTRADA_FECHA",$FEchaVal,PDO::PARAM_STR);
      if($stmt->execute()){
          return "ok";            
      }
      else{
          return "error";  
      }
      $stmt->close();
      $stmt=null;
  }
  //ValidarCierre
 static public function mdlValidarCierreDIA($Semestre,$FEchaVal){
   $stmt = Conexion::conectar()->prepare("SELECT DISTINCT DIA from asistencia where ENTRADA_FECHA='$FEchaVal' AND ID_SEMESTRE=$Semestre");   
   $stmt->execute();    
   return $stmt -> fetch(); 
   $stmt -> close(); 
   $stmt=null;
}
 //ValidarCierre
 static public function mdlValidarCierreADM($Semestre,$FEchaVal,$DIAV){
   $stmt = Conexion::conectar()->prepare("INSERT INTO `asistencia`( `ID_PERSONA`, `ID_SEMESTRE`, `ID_CATEGORIA_ASI`, `DIA`, `ENTRADA_FECHA`) SELECT administrativo.ID_PERSONA, $Semestre,4,'$DIAV','$FEchaVal' from administrativo where administrativo.ID_PERSONA NOT IN (SELECT ID_PERSONA from asistencia where ENTRADA_FECHA='$FEchaVal' and ID_SEMESTRE=$Semestre) AND administrativo.CONDICION!='Tercero' ");   
   if($stmt->execute()){
       return "ok";            
   }
   else{
       return "error";
   }
   $stmt->close();
   $stmt=null;
}
 //ValidarCierre
 static public function mdlValidarCierreDOC($Semestre,$FEchaVal,$DIAV){
   $stmt = Conexion::conectar()->prepare("INSERT INTO `asistencia`( `ID_PERSONA`, `ID_SEMESTRE`, `ID_CATEGORIA_ASI`, `DIA`, `ENTRADA_FECHA`) SELECT ASI.ID_PERSONA,$Semestre,4,'$DIAV','$FEchaVal' as fecha FROM asig_plaza_vacante ASI WHERE ASI.ID_PERSONA NOT IN (SELECT ID_PERSONA from asistencia where ENTRADA_FECHA='$FEchaVal')");   
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