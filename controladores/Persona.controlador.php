<?php 
class ControladorPersona{ 
     // Crear Persona 
     static public function ctrCrearPersona(){
        if(isset($_POST['action'])){ 
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>'; 
            $ingTipoDocumento = ( $_POST['ingTipoDocumento'] === NULL ) ? "" : $_POST['ingTipoDocumento'];
            $ingDni = ( $_POST['ingDocumento'] === NULL ) ? "" : $_POST['ingDocumento'];
            $ingNacionalidad = ( $_POST['ingNacionalidad'] === NULL ) ? "" : $_POST['ingNacionalidad'];
            $ingNombre = ( $_POST['ingNombre'] === NULL ) ? "" : $_POST['ingNombre'];
            $ingApellido_p = ( $_POST['ingApellido_p'] === NULL ) ? "" : $_POST['ingApellido_p'];
            $ingApellido_m = ( $_POST['ingApellido_m'] === NULL ) ? "" : $_POST['ingApellido_m'];
            $ingSexo = ( $_POST['ingSexo'] === NULL ) ? "" : $_POST['ingSexo'];
            $ingFecha = ( $_POST['ingFecha'] === NULL ) ? "" : $_POST['ingFecha'];
            $ingCorreo = ( $_POST['ingCorreo'] === NULL ) ? "" : $_POST['ingCorreo'];
            $ingCelular = ( $_POST['ingCelular'] === NULL ) ? "" : $_POST['ingCelular'];                     
            $ingTelefono = ( $_POST['ingTelefono'] === NULL ) ? "" : $_POST['ingTelefono'];  
                $tabla ="persona";
                $newDate = date("d/m/Y", strtotime($ingFecha));
                $datos = array(
                    "ID_PERSONA"=>$ingDni,                
                    "TIPO_DOCUMENTO"=>$ingTipoDocumento,                
                    "NACIONALIDAD"=>$ingNacionalidad,
                    "NOMBRE"=>$ingNombre,
                    "APELLIDO_P"=>$ingApellido_p,
                    "APELLIDO_M"=>$ingApellido_m,
                    "SEXO"=>$ingSexo,
                    "FECHA_NACIMIENTO"=>$ingFecha,
                    "CORREO"=>$ingCorreo, 
                    "TELEFONO"=>$ingTelefono,
                    "CELULAR"=>$ingCelular
                );
                $respuesta = ModeloPersona::mdlIngresarPersona($tabla,$datos);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registrado...",
                        text: "Se registro registro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Persona";
                          }
                        });
                    </script>
                    ';
                }else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No puede ir vacio o llevar caracteres especiales",
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
    // Editar Persona 
    static public function ctrEditarPersona(){
        if(isset($_POST['EditDocumento'])){ 
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>';  
                $tabla ="persona"; 
                $datos = array(
                    "ID_PERSONA"=>$_POST['EditDocumento'],      
                    "NOMBRE"=>$_POST['EditNombre'],
                    "APELLIDO_P"=>$_POST['EditApellido_p'],
                    "APELLIDO_M"=>$_POST['EditApellido_m'],
                    "SEXO"=>$_POST['EditSexo'],
                    "FECHA_NACIMIENTO"=>$_POST['EditFecha'],
                    "CORREO_INST"=>$_POST['EditCorreoCorp'],
                    "CORREO"=>$_POST['EditCorreo'], 
                    "TELEFONO"=>$_POST['EditTelefono'],
                    "CELULAR"=>$_POST['EditCelular']); 
                $respuesta = ModeloPersona::mdlEditarPersona($tabla,$datos);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Actualizado...",
                        text: "Se actualizo correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Persona";
                          }
                        });
                    </script>
                    ';
                }else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No puede ir vacio o llevar caracteres especiales",
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
    //Listar
    static public function ctrListar($item,$valor){
        $tabla="persona";
        $respuesta=ModeloPersona::mdlListar($tabla,$item,$valor);
        return $respuesta;
    }
    // Editar 
    static public function ctrEditar(){
        if(isset($_POST["ingFecha"])){
            if(preg_match('/^[0-9]+$/',$_POST["ingCelular"])){  
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>'; 
                $tabla ="persona"; 
                $fechamax='2005';
                $año=substr($_POST["ingFecha"], -4); 
                if($fechamax> $año){  
                    //validar fecha
                        $datos=array(
                        "ID_PERSONA"=>$_SESSION["ID_PERSONA"],
                        "FECHA_NACIMIENTO"=>$_POST["ingFecha"],
                        "CORREO"=>$_POST["ingCorreo"], 
                        "TELEFONO"=>$_POST["ingTelefono"],
                        "CELULAR"=>$_POST["ingCelular"]
                        );
                        $respuesta = ModeloPersona::mdlEditar($tabla,$datos);
                        if($respuesta=="ok"){
                            echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Actualizado...",
                                text: "Se actualizo correctamente",
                                allowOutsideClick: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location="MiPersona";
                                }
                              });
                            </script>
                            ';
                        }else{
                            echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "No se puedo actualizar",
                            });
                            </script>
                            ';
                        }
                }//Validar fecha 
                else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Un error en la fecha, tiene que ser menor",
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
   // Editar 
   static public function ctrEditarTodo(){
    if(isset($_POST["ingFecha"])){
        if(preg_match('/^[0-9]+$/',$_POST["ingCelular"])){  
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>'; 
            $tabla ="persona"; 
            $fechamax='2005';
            $año=substr($_POST["ingFecha"], -4); 
            if($fechamax> $año){  
                //validar fecha
                    $datos=array(
                    "ID_PERSONA"=>$_SESSION["ID_PERSONA"],
                    "FECHA_NACIMIENTO"=>$_POST["ingFecha"],
                    "CORREO"=>$_POST["ingCorreo"], 
                    "TELEFONO"=>$_POST["ingTelefono"],
                    "CELULAR"=>$_POST["ingCelular"] 
                    );
                    $respuesta = ModeloPersona::mdlEditar($tabla,$datos);
                    if($respuesta=="ok"){
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Actualizado...",
                            text: "Se actualizo correctamente",
                            allowOutsideClick: false
                        }).then((result)=>{
                            if(result.value){
                                window.location="MiPersona";
                            }
                          });
                        </script>
                        ';
                    }else{
                        echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "No se puedo actualizar",
                        });
                        </script>
                        ';
                    }
            }//Validar fecha 
            else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Un error en la fecha, tiene que ser menor",
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
}