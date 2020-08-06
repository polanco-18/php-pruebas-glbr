<?php 

require_once "conexion.php";

class ModeloUsuario{

    // Mostrar Usuario
    static public function mdlMostrarUsuario($tabla,$item,$valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = '$valor'");         
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
    static public function mdlBorrar($id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM `usuario` WHERE ID_USUARIO=:ID_USUARIO"); 
        $stmt -> bindParam(":ID_USUARIO",$id,PDO::PARAM_STR);      
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlListarPersona(){  
        $stmt = Conexion::conectar()->prepare("SELECT ID_PERSONA,NOMBRE,APELLIDO_P,APELLIDO_M FROM persona WHERE ID_PERSONA NOT IN (SELECT ID_PERSONA FROM usuario)");
        $stmt->execute();    
        return $stmt -> fetchAll();     
        $stmt -> close(); 
        $stmt=null; 
    } 
    // Mostrar Usuario
    static public function mdlValidar($valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE USUARIO='$valor'");         
        $stmt->execute();    
        return $stmt -> fetch();
        $stmt -> close(); 
        $stmt=null; 
    } 
    // Mostrar Usuario
    static public function mdldatos($valor){
        $stmt = Conexion::conectar()->prepare("SELECT NOMBRE,ID_PERSONA,APELLIDO_P,APELLIDO_M FROM persona WHERE ID_PERSONA='$valor'");         
        $stmt->execute();    
        return $stmt -> fetch();
        $stmt -> close(); 
        $stmt=null; 
    } 
    static public function mdlIngresarUsuario($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuario (ID_PERSONA,USUARIO,PASSWORD,ROL)values(:ID_PERSONA,:USUARIO,:PASSWORD,:ROL)");
        $stmt -> bindParam(":ID_PERSONA",$datos["ID_PERSONA"],PDO::PARAM_STR);
        $stmt -> bindParam(":USUARIO",$datos["USUARIO"],PDO::PARAM_STR);
        $stmt -> bindParam(":PASSWORD",$datos["PASSWORD"],PDO::PARAM_STR);
        $stmt -> bindParam(":ROL",$datos["ROL"],PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";            
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    
    static public function mdlEditarUsuario($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET PASSWORD=:PASSWORD,  ROL=:ROL WHERE ID_USUARIO=:ID_USUARIO");  
        $stmt -> bindParam(":PASSWORD",$datos["PASSWORD"],PDO::PARAM_STR);        
        $stmt -> bindParam(":ID_USUARIO",$datos["ID_USUARIO"],PDO::PARAM_STR);
        $stmt -> bindParam(":ROL",$datos["ROL"],PDO::PARAM_STR);
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

    static public function mdlActualizarSesion($datos){
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET ULTIMA_SESION=:ULTIMA_SESION WHERE ID_PERSONA=:ID_PERSONA");  
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
    static public function mdlEstado($valor,$valor2){
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET ESTADO=:ESTADO WHERE ID_USUARIO=:ID_USUARIO");        
        $stmt -> bindParam(":ESTADO",$valor2,PDO::PARAM_STR);
        $stmt -> bindParam(":ID_USUARIO",$valor,PDO::PARAM_STR);  
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