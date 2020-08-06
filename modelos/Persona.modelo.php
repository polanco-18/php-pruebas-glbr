<?php 

require_once "conexion.php";

class ModeloPersona{
    
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `persona` WHERE ID_PERSONA=:ID_PERSONA");   
        $stmt -> bindParam(":ID_PERSONA",$id,PDO::PARAM_STR); 
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    } 

    static public function mdlIngresarPersona($datos){ 
        $stmt = Conexion::conectar()->prepare("INSERT INTO persona (ID_PERSONA,TIPO_DOCUMENTO,NACIONALIDAD,NOMBRE,APELLIDO_P,APELLIDO_M,SEXO,FECHA_NACIMIENTO,CORREO,TELEFONO,CELULAR) VALUES(:ID_PERSONA,:TIPO_DOCUMENTO,:NACIONALIDAD,:NOMBRE,:APELLIDO_P,:APELLIDO_M,:SEXO,:FECHA_NACIMIENTO,:CORREO,:TELEFONO,:CELULAR)");
        $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR);
        $stmt -> bindParam(":TIPO_DOCUMENTO",$datos["TIPO_DOCUMENTO"],PDO::PARAM_STR);
        $stmt -> bindParam(":NACIONALIDAD",$datos["NACIONALIDAD"],PDO::PARAM_STR);
        $stmt -> bindParam(":NOMBRE",$datos["NOMBRE"],PDO::PARAM_STR);
        $stmt -> bindParam(":APELLIDO_P",$datos["APELLIDO_P"],PDO::PARAM_STR);
        $stmt -> bindParam(":APELLIDO_M",$datos["APELLIDO_M"],PDO::PARAM_STR);
        $stmt -> bindParam(":SEXO",$datos["SEXO"],PDO::PARAM_STR);
        $stmt -> bindParam(":FECHA_NACIMIENTO",$datos["FECHA_NACIMIENTO"],PDO::PARAM_STR);
        $stmt -> bindParam(":CORREO",$datos["CORREO"],PDO::PARAM_STR); 
        $stmt -> bindParam(":TELEFONO",$datos["TELEFONO"],PDO::PARAM_STR);
        $stmt -> bindParam(":CELULAR",$datos["CELULAR"],PDO::PARAM_STR);  
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlEditarPersona($tabla,$datos){ 
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE=:NOMBRE,APELLIDO_P=:APELLIDO_P,APELLIDO_M=:APELLIDO_M,SEXO=:SEXO,FECHA_NACIMIENTO=:FECHA_NACIMIENTO,CORREO=:CORREO,TELEFONO=:TELEFONO, CELULAR=:CELULAR  WHERE ID_PERSONA=:ID_PERSONA");  
        $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR); 
        $stmt -> bindParam(":NOMBRE",$datos["NOMBRE"],PDO::PARAM_STR);
        $stmt -> bindParam(":APELLIDO_P",$datos["APELLIDO_P"],PDO::PARAM_STR);
        $stmt -> bindParam(":APELLIDO_M",$datos["APELLIDO_M"],PDO::PARAM_STR);
        $stmt -> bindParam(":SEXO",$datos["SEXO"],PDO::PARAM_STR);
        $stmt -> bindParam(":FECHA_NACIMIENTO",$datos["FECHA_NACIMIENTO"],PDO::PARAM_STR); 
        $stmt -> bindParam(":CORREO",$datos["CORREO"],PDO::PARAM_STR); 
        $stmt -> bindParam(":TELEFONO",$datos["TELEFONO"],PDO::PARAM_STR);
        $stmt -> bindParam(":CELULAR",$datos["CELULAR"],PDO::PARAM_STR);  
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";                        
        }
        $stmt->close();
        $stmt=null;
    }

    //Listar Persona
    static public function mdlListar($tabla, $item,$valor){
        if($valor != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor'");           
            $stmt->execute();    
            return $stmt -> fetch();        //fetch solamente devuelve un valor
        }else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();    
            return $stmt -> fetchAll();    
        } 
        $stmt -> close(); 
        $stmt=null; 
    } 
    static public function mdlEditar($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET FECHA_NACIMIENTO=:FECHA_NACIMIENTO,CORREO=:CORREO,TELEFONO=:TELEFONO, CELULAR=:CELULAR WHERE ID_PERSONA=:ID_PERSONA");  
        $stmt -> bindParam(":FECHA_NACIMIENTO",$datos["FECHA_NACIMIENTO"],PDO::PARAM_STR);
        $stmt -> bindParam(":CORREO",$datos["CORREO"],PDO::PARAM_STR);      
        $stmt -> bindParam(":TELEFONO",$datos["TELEFONO"],PDO::PARAM_STR);
        $stmt -> bindParam(":CELULAR",$datos["CELULAR"],PDO::PARAM_STR);  
        $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR);  
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