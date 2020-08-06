<?php 

require "./modelos/Usuario.modelo.php";

class Usuario { 
    public function ctrActualizarContraseña($c_actual,$n_password,$n_password2,$usuario){    
            if(preg_match('/^[a-zA-Z0-9]+$/',$c_actual) && 
            preg_match('/^[a-zA-Z0-9]+$/',$n_password) && 
            preg_match('/^[a-zA-Z0-9]+$/',$n_password2)){ 
                //validando contraseña nueva 
                if($n_password==$n_password2){
                //encryptacion de contraseña
                $encriptar = crypt($c_actual,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //Validadr Sesion
                $tabla = "usuario";
                $item="ID_PERSONA";
                $valor=$usuario;           
                $respuesta1=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);                   
                //validando usuario y contraseña         
                        //validando si esta incriptado        
                if($respuesta1["PASSWORD"]==$encriptar || $respuesta1["PASSWORD"]==$c_actual){   
                        //encryptacion de contraseña Nueva
                        $encriptarN = crypt($n_password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');    
                        $tabla ="usuario";
                        $datos=array(
                        "ID_USUARIO"=>$respuesta1["ID_USUARIO"], 
                        "PASSWORD"=>$encriptarN);
                        $respuesta = ModeloUsuario::mdlPasswordNew($tabla,$datos); 
                        if($respuesta=="ok"){
                            return 'Actualizado';
                        } else{
                            return 'Error';
                        }
                }else{
                    return 'No es la contraseña actual';
                    }
            }else{
                return 'No coincide contraseñas nuevas';
            }
        }else{
            return 'Caracteres no validos';
        } 
    } 
    // Crear Usuario 
    public function ctrCrearUsuario($usuario,$c_actual){ 
            if(preg_match('/^[0-9]+$/',$usuario) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$c_actual)){ 
                $tabla ="usuario";
                //encryptacion de contraseña
                $encriptar = crypt($c_actual,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
                $datos=array("ID_PERSONA"=>$usuario,
                "USUARIO"=>$usuario,
                "PASSWORD"=>$encriptar);
                $respuesta = ModeloUsuario::mdlIngresarUsuario($tabla,$datos);
                if($respuesta=="ok"){ 
                    return 'Creado';
                } else{
                    return 'error';
                } 
            } else{
                return 'Caracteres no validos';
            } 
    }
    //Listar
    public function Listar($item,$valor){ 
        $tabla="usuario inner join persona on persona.ID_PERSONA=usuario.ID_PERSONA inner join ultima_sesion on ultima_sesion.ID_PERSONA=persona.ID_PERSONA ";
        $respuesta=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);
        return $respuesta;
    } 
    // Editar Usuario 
    public function ctrEditarUsuario($c_actual,$usuario){ 
            if(preg_match('/^[a-zA-Z0-9]+$/',$c_actual)){    
                //encryptacion de contraseña
                $encriptar = crypt($c_actual,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla ="usuario";
                $datos=array(
                "ID_USUARIO"=>$usuario, 
                "PASSWORD"=>$encriptar);
                $respuesta = ModeloUsuario::mdlEditarUsuario($tabla,$datos);
                if($respuesta=="ok"){
                    return 'Actualizado';
                } else{
                    return 'Error';
                } 
            }
            else{
            return 'Caracteres no validos';
            } 
    } 
}