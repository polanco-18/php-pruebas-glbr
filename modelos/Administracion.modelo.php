<?php 

require_once "conexion.php";

class ModeloAdministracion{

    //Listar
    static public function mdlListar($item){
      if($item!=null){
        $stmt = Conexion::conectar()->prepare("select AD.ID_ADMINISTRATIVO,AD.CARGO,AD.CONDICION,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CORREO,PER.CELULAR,PER.TELEFONO from persona PER inner join administrativo AD on AD.ID_PERSONA=PER.ID_PERSONA where AD.ID_ADMINISTRATIVO=$item");
        $stmt->execute();    
        return $stmt -> fetch();        //fetch solamente devuelve un valor        
      }  else{
        $stmt = Conexion::conectar()->prepare("select AD.ID_ADMINISTRATIVO,AD.CARGO,AD.CONDICION,PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M,PER.CORREO,PER.CELULAR,PER.TELEFONO from persona PER inner join administrativo AD on AD.ID_PERSONA=PER.ID_PERSONA order by PER.ID_PERSONA");
        $stmt->execute();    
        return $stmt -> fetchAll();
      }
      $stmt -> close(); 
      $stmt=null;  
    }
    //Listar
    static public function mdlListarPersona(){ 
      $stmt = Conexion::conectar()->prepare("select PER.ID_PERSONA,PER.NOMBRE,PER.APELLIDO_P,PER.APELLIDO_M from persona PER where  PER.ID_PERSONA NOT IN (select ID_PERSONA from administrativo) ");
      $stmt->execute();    
      return $stmt -> fetchAll();        //fetch solamente devuelve un valor
      $stmt -> close(); 
      $stmt=null;  
    }   
    static public function mdlBorrar($id){
      $stmt = Conexion::conectar()->prepare("DELETE FROM `administrativo` WHERE ID_ADMINISTRATIVO=:ID_ADMINISTRATIVO");   
      $stmt -> bindParam(":ID_ADMINISTRATIVO",$id,PDO::PARAM_STR); 
      if($stmt->execute()){
          return "ok";            
      }
      else{
          return "error";
      }
      $stmt->close();
      $stmt=null;
    } 
    static public function mdlCrear($datos){
      $stmt = Conexion::conectar()->prepare("INSERT INTO administrativo (ID_PERSONA,CARGO,CONDICION)values(:ID_PERSONA,:CARGO,:CONDICION)");
      $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR);
      $stmt -> bindParam(":CARGO",$datos["CARGO"],PDO::PARAM_STR); 
      $stmt -> bindParam(":CONDICION",$datos["CONDICION"],PDO::PARAM_STR);
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
      $stmt = Conexion::conectar()->prepare("UPDATE administrativo SET CARGO=:CARGO,CONDICION=:CONDICION where ID_ADMINISTRATIVO=:ID_ADMINISTRATIVO");
      $stmt -> bindParam(":ID_ADMINISTRATIVO",$datos["ID_ADMINISTRATIVO"],PDO::PARAM_STR);
      $stmt -> bindParam(":CARGO",$datos["CARGO"],PDO::PARAM_STR); 
      $stmt -> bindParam(":CONDICION",$datos["CONDICION"],PDO::PARAM_STR);
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