<?php 

require_once "conexion.php";

class ModeloUsuario{

    // Mostrar Usuario
    static public function mdlMostrarUsuario($tabla,$item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT * FROM $tabla WHERE $item = '$valor'");         
            $stmt->execute();    
            return $stmt -> fetch();
        }else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();    
            return $stmt -> fetchAll();    
        }
        $stmt -> close(); 
        $stmt=null; 
    }
    

    static public function mdlIngresarUsuario($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_PERSONA,USUARIO,PASSWORD)values(:ID_PERSONA,:USUARIO,:PASSWORD)");
        $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR);
        $stmt -> bindParam(":USUARIO",$datos["USUARIO"],PDO::PARAM_STR);
        $stmt -> bindParam(":PASSWORD",$datos["PASSWORD"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    
    static public function mdlEditarUsuario($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET PASSWORD=:PASSWORD WHERE ID_USUARIO=:ID_USUARIO");  
        $stmt -> bindParam(":PASSWORD",$datos["PASSWORD"],PDO::PARAM_STR);        
        $stmt -> bindParam(":ID_USUARIO",$datos["ID_USUARIO"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }

    static public function mdlPasswordNew($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET PASSWORD=:PASSWORD WHERE ID_USUARIO=:ID_USUARIO");   
        $stmt -> bindParam(":PASSWORD",$datos["PASSWORD"],PDO::PARAM_STR);        
        $stmt -> bindParam(":ID_USUARIO",$datos["ID_USUARIO"],PDO::PARAM_STR); 
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }

    static public function mdlActualizarSesion($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ULTIMA_SESION=:ULTIMA_SESION WHERE ID_PERSONA=:ID_PERSONA");  
        $stmt -> bindParam(":ULTIMA_SESION",$datos["ULTIMA_SESION"],PDO::PARAM_STR);
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