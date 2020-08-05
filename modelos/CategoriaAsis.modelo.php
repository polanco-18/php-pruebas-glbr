<?php 

require_once "conexion.php";

class ModeloCategoriaAsis{

    // Mostrar 
    static public function mdlListar($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();    
        return $stmt -> fetchAll();  
        $stmt -> close(); 
        $stmt=null; 
    }
    

}