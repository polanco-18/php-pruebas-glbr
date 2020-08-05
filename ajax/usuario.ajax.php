<?php 

require_once "../controladores/Usuario.controlador.php"; 
 
require_once "../modelos/Usuario.modelo.php"; 

class AjaxUsuarios{
    //Editar Usuario
    public $idUsuario;
    public function ajaxEditarUsuario(){
        $item = "ID_USUARIO";
        $valor=$this->idUsuario;
        $respuesta=ControladorUsuario::ctrMostrarUsuario($item,$valor);
        echo json_encode($respuesta);
    }
}


//Editar Usuario
if(isset($_POST["id"])){
    $editar=new AjaxUsuarios();
    $editar->idUsuario = $_POST["id"];
    $editar->ajaxEditarUsuario();
} 
 