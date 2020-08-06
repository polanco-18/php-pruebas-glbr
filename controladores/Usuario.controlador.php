<?php 
class ControladorUsuario{

  
    // Crear Usuario 
    static public function ctrCrearUsuario(){
        if(isset($_POST["ingDni"])){
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingDni"]) &&
            preg_match('/^[0-9]+$/',$_POST["ingRol"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$_POST["ingContraseña"])){
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>';   
                //encryptacion de contraseña
                $encriptar = crypt($_POST["ingContraseña"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
                $datos=array("ID_PERSONA"=>$_POST["ingDni"],
                "USUARIO"=>$_POST["ingDni"],
                "ROL"=>$_POST["ingRol"],
                "PASSWORD"=>$encriptar);
                $respuesta = ModeloUsuario::mdlIngresarUsuario($datos);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registrado...",
                        text: "Se registro registro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Usuario";
                          }
                        });
                    </script>
                    ';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se puedo registrar",
                      });
                    </script>
                    ';
                }
                //Carga off
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.add("hide"); 
                    element.classList.remove("show");
                </script>'; 
            }
            else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se puedo registrar",
                    });
                    </script>
                    ';
                }
        }
    }
    //Listar
    static public function ctrMostrarUsuario($item,$valor){ 
        $tabla="usuario inner join persona on persona.ID_PERSONA=usuario.ID_PERSONA ";
        $respuesta=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);
        return $respuesta;
    }
    //sesion tiempo
    static public function ctrSesionTiempo(){
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Inactividad de Usuario",
            text: "30m de inactividad y se cierra su sesion por seguridad",
            allowOutsideClick: false
          }).then((result)=>{
              if(result.value){
                  window.location="Salir";
              }
            });
        </script>
        ';
    }
    static public function ctrBorrar(){
        if(isset($_POST["idBorrar"])){  
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>';   
                $respuesta = ModeloUsuario::mdlBorrar($_POST["idBorrar"]);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registro borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Usuario";
                          }
                        });
                    </script>
                    ';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo borrar",
                      });
                    </script>
                    ';
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
    // Editar Usuario 
    static public function ctrEditarUsuario(){
        if(isset($_POST["id"])){ 
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$_POST["EditContraseña"]) && preg_match('/^[0-9]+$/',$_POST["EditRol"])){ 
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>';  
                //encryptacion de contraseña
                $encriptar = crypt($_POST["EditContraseña"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
                $datos=array(
                "ID_USUARIO"=>$_POST["id"],
                "ROL"=>$_POST["EditRol"], 
                "PASSWORD"=>$encriptar);
                $respuesta = ModeloUsuario::mdlEditarUsuario($datos);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registrado...",
                        text: "Se registro registro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Usuario";
                          }
                        });
                    </script>
                    ';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se registro registro correctamente",
                      });
                    </script>
                    ';
                }
                //Carga off
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.add("hide"); 
                    element.classList.remove("show");
                </script>'; 
            }
         else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "No puede ir vacio o llevar caracteres especiales",
                });
                </script>
                ';
            }
        }
    } 
    static public function ctrEstado(){  
        if(isset($_POST["idEstado"])){
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>';   
                $respuesta = ModeloUsuario::mdlEstado($_POST["idEstado"],$_POST["valueEstado"]);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registrado...",
                        text: "Se registro registro correctamente",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="Usuario";
                        }
                        });
                    </script>
                    ';
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
    static public function ctrListarPersona(){ 
        $respuesta=ModeloUsuario::mdlListarPersona();
        return $respuesta;
    } 
    // Actualizar Contraseña 
    static public function ctrPasswordNew(){
        if(isset($_POST["ContraseñaAct"])){ 
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["ContraseñaAct"]) && 
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["PasswordNew"]) && 
            preg_match('/^[a-zA-Z0-9]+$/',$_POST["PasswordNew2"])){ 
                //validando contraseña nueva 
                if($_POST["PasswordNew"]==$_POST["PasswordNew2"]){
                //encryptacion de contraseña
                $encriptar = crypt($_POST["ContraseñaAct"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //Validadr Sesion
                $tabla = "usuario";
                $item="ID_PERSONA";
                $valor=$_SESSION["ID_PERSONA"];                   
                $respuesta1=ModeloUsuario::mdlMostrarUsuario($tabla,$item,$valor);                   
                //validando usuario y contraseña         
                        //validando si esta incriptado        
                if($respuesta1["PASSWORD"]==$encriptar || $respuesta1["PASSWORD"]==$_POST["ContraseñaAct"]){   
                        //encryptacion de contraseña Nueva
                        $encriptarN = crypt($_POST["PasswordNew"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');    
                        $tabla ="usuario";
                        $datos=array(
                        "ID_USUARIO"=>$respuesta1["ID_USUARIO"], 
                        "PASSWORD"=>$encriptarN);
                        $respuesta = ModeloUsuario::mdlPasswordNew($tabla,$datos);
                        if($respuesta=="ok"){
                            echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Registrado...",
                                text: "Se registro registro correctamente",
                                allowOutsideClick: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location="Inicio";
                                }
                                });
                            </script>
                            ';
                        } else{
                            echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "No se puedo registrar",
                              });
                            </script>
                            ';
                        }
                }else{
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "La contraseña Actual no es igual!",
                              });
                            </script>
                            ';
                    }
            }else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "La contraseña nueva no es igual!",
                  });
                </script>
                ';
            }
        }
        else{
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "No puede ir vacio o llevar caracteres especiales",
            });
            </script>
            ';
            }
        }
    }
}