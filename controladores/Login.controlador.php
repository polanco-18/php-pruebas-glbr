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
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"])
             && preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"])){     
                //encryptacion de contraseña
                $encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //Validadr Sesion
                $tabla = "usuario";
                $item="ID_PERSONA";
                $valor=$_POST["ingUsuario"];                   
                $respuesta1=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);   
                //validando usuario y contraseña         
                if($respuesta1["ID_PERSONA"]==$_POST["ingUsuario"]){     
                    //validando si esta incriptado        
                if($respuesta1["PASSWORD"]==$encriptar || $respuesta1["PASSWORD"]==$_POST["ingPassword"]){ 
                    //Validadr ultima sesion
                    $tabla = "ultima_sesion";
                    $item="ID_PERSONA";
                    $valor=$_POST["ingUsuario"];                   
                    $USesion=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);                                        
                    $_SESSION["Ultima_Sesion"]=$USesion["ULTIMA_SESION"];   
                    //Extraer datos persona
                    $tabla = "persona";
                    $item="ID_PERSONA";
                    $valor=$_POST["ingUsuario"];
                    $respuesta=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);
                    $_SESSION["iniciarSesion"]="ok";
                    $_SESSION["ID_PERSONA"]=$respuesta["ID_PERSONA"];
                    $_SESSION["NOMBRE"]=$respuesta["NOMBRE"];
                    $_SESSION["APELLIDO_P"]=$respuesta["APELLIDO_P"];  
                    //Semestre
                    $_SESSION["SEMESTRE"]="2020-I";   
                    $_SESSION["ID_SEMESTRE"]="1";                
                      // Actualizando Ultima Sesion  
                      date_default_timezone_set("America/Lima");                    
                      $tabla = "ultima_sesion";
                      $datos=array(
                          "ID_PERSONA"=>$_POST["ingUsuario"],
                          "ULTIMA_SESION"=>date("Y/m/d H:i:s") 
                      );                    
                    $respuesta = ModeloUsuario::mdlActualizarSesion($tabla,$datos);
                    //rol administrador
                    $tabla = "administrativo";
                    $item="ID_PERSONA";
                    $valor=$_POST["ingUsuario"];                   
                    $respuesta2=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);                             
                    $_SESSION["ADMINISTRATIVO_ROL"]=$respuesta2["ROL"];    
                    //rol Plaza vacante
                    $tabla = "asig_plaza_vacante inner join plaza_vacante on asig_plaza_vacante.ID_PLAZA_VACANTE=plaza_vacante.ID_PLAZA_VACANTE ";
                    $item="ID_PERSONA";
                    $valor=$_POST["ingUsuario"];  
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
                } else{
                    echo '<br><div class="alert alert-danger">No se encontro usuario, vuelve a intentarlo</div>';
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