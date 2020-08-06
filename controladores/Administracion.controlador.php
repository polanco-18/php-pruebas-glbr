<?php 
class ControladorAdministracion
{    
    //Listar
    static public function ctrListar($item){  
        $respuesta=ModeloAdministracion::mdlListar($item);
        return $respuesta;
    }//Listar
    static public function ctrListarPersona(){  
        $respuesta=ModeloAdministracion::mdlListarPersona();
        return $respuesta;
    }
    static public function ctrCrear(){
        if(isset($_POST['ingDni'])){   
                $datos = array(
                    "ID_PERSONA"=>$_POST['ingDni'],      
                    "CARGO"=>$_POST['ingCargo'],
                    "CONDICION"=>$_POST['ingCondicion']);
                $respuesta = ModeloAdministracion::mdlCrear($datos);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Creado",
                        text: "Se creo correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Administracion";
                          }
                        });
                    </script>
                    ';
                }else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo crear",
                      });
                    </script>
                    '; 
                }   
        }
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
                $respuesta = ModeloAdministracion::mdlBorrar($_POST["idBorrar"]);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registro borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Administracion";
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
    static public function ctrEditar(){
        if(isset($_POST['editId'])){    
                $datos = array(
                    "ID_ADMINISTRATIVO"=>$_POST['editId'],      
                    "CARGO"=>$_POST['editCargo'],
                    "CONDICION"=>$_POST['editCondicion']);
                $respuesta = ModeloAdministracion::mdlEditar($datos);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Actualizado",
                        text: "Se actualizo correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="Administracion";
                          }
                        });
                    </script>
                    ';
                }else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo actualizar",
                      });
                    </script>
                    '; 
                }   
        }    
    } 
    
}