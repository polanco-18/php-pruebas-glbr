<?php 
class ControladorLogin{

    // Ingreso Usuario
    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>';  
            //declarando valiables
            $usuario=$_POST["ingUsuario"];
            $contraseña=$_POST["ingPassword"];
            //si cumple caracteres
            if(preg_match('/^[0-9]+$/',$usuario)
             && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$contraseña)){     
                //encryptacion de contraseña
                $encriptar = crypt($contraseña,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //consulta sql por usuario
                $resUsuario=ModeloUsuario::mdlValidar($usuario);   
                //validando si existe usuario         
                if($resUsuario["ID_PERSONA"]===$usuario){     
                    //validando si esta activo usuario
                    if($resUsuario["ESTADO"]==="1"){
                        //validando si esta incriptado        
                        if($resUsuario["PASSWORD"]==$encriptar || $resUsuario["PASSWORD"]==$contraseña){ 
                            //creando ultima sesion                                       
                            $_SESSION["Ultima_Sesion"]=$resUsuario["ULTIMA_SESION"];      
                            $_SESSION["ROL"]=$resUsuario["ROL"];   
                            //Extraer datos persona
                            $respuesta=ModeloUsuario::mdldatos($usuario); 
                            $_SESSION["ID_PERSONA"]=$respuesta["ID_PERSONA"];
                            $_SESSION["NOMBRE"]=$respuesta["NOMBRE"];
                            $_SESSION["APELLIDO_P"]=$respuesta["APELLIDO_P"];  
                            //Semestre
                            $_SESSION["SEMESTRE"]="2020-I";   
                            $_SESSION["ID_SEMESTRE"]="1";                
                            // Actualizando Ultima Sesion  
                            date_default_timezone_set("America/Lima");    
                            $datos=array(
                                "ID_PERSONA"=>$usuario,
                                "ULTIMA_SESION"=>date("Y/m/d H:i:s") 
                            );                    
                            $respuesta = ModeloUsuario::mdlActualizarSesion($datos);
                            //rol administrador
                            $tabla = "administrativo";
                            $item="ID_PERSONA";
                            $valor=$usuario;                   
                            $respuesta2=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);         
                            //rol Plaza vacante
                            $tabla = "asig_plaza_vacante inner join plaza_vacante on asig_plaza_vacante.ID_PLAZA_VACANTE=plaza_vacante.ID_PLAZA_VACANTE left join plaza_vacante_area on plaza_vacante_area.ID=plaza_vacante.ID_AREA";
                            $item="ID_PERSONA";
                            $valor=$usuario;  
                            $Semestre=$_SESSION["ID_SEMESTRE"];                 
                            $respuesta3=ModeloPlazaVacante::mdlListarAsig($tabla,$item,$valor,$Semestre);                        
                            $_SESSION["ASIG_PLAZA"]=$respuesta3["ID_ASIG_PLAZA_V"];                        
                            $_SESSION["CH"]=$respuesta3["POSICION_CH"];                         
                            $_SESSION["ASIG_HORA"]=$respuesta3["HORA"];                       
                            $_SESSION["ASIG_AREA"]=$respuesta3["AREA"];                      
                            $_SESSION["ASIG_CARGO"]=$respuesta3["CARGO"];  
                            //Tiempo Sesion                    
                            $_SESSION["Sesion_tiempo"]=time();                                      
                            echo '<script> 
                            window.location="Inicio";
                            </script>';                                     
                        }
                        else{
                            echo '<br><div class="alert alert-danger">Contraseña incorrecta</div>'; 
                        }
                    }else{                        
                        echo '<br><div class="alert alert-danger">usuario inactivo</div>';
                    }                    
                } else{
                    echo '<br><div class="alert alert-danger">No se encontro usuario</div>';
                }  
            }else{
                echo '<br><div class="alert alert-danger">Ingrese datos valido</div>';
            }
            
            //Carga off
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.add("hide"); 
                element.classList.remove("show");
            </script>';  
        }  
    }
}