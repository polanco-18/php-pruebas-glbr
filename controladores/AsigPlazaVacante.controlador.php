<?php 
class ControladorAsigPlazaVacante{
 
    //Listar
    static public function ctrListarAsig($id,$Semestre){  
        $respuesta=ModeloAsigPlazaVacante::mdlListarAsig($id,$Semestre);
        return $respuesta;
    }   
    static public function ctrListarPlazaV($Semestre){
        $respuesta=ModeloAsigPlazaVacante::mdlListarPlazaV($Semestre);
        return $respuesta;
    } 
    static public function ctrListarPersona($Semestre){
        $respuesta=ModeloAsigPlazaVacante::mdlListarPersona($Semestre);
        return $respuesta;
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
                $respuesta = ModeloAsigPlazaVacante::mdlBorrar($_POST["idBorrar"]);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registro borrado",
                        text: "Se borro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="AsigPlazaVacante";
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
    static public function ctrCrear(){
        if(isset($_POST["ingPlaza"])){                 
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>';    
                $respuesta = ModeloAsigPlazaVacante::mdlCrear($_POST["ingPlaza"],$_POST["ingPersona"]);
                if($respuesta=="ok"){ 
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registrado",
                        text: "Se registro correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="AsigPlazaVacante";
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
    } 
    static public function ctrEditar(){
        if(isset($_POST["editId"])){ 
            //Carga on
            echo'
            <script>             
                var element = document.getElementById("loader");
                element.classList.remove("hide"); 
                element.classList.add("show");
            </script>';  
            if($_POST["editObservacion"]!=null && $_POST["editEstado"]!=1){  
                $datos=array(
                "ID_ASIG_PLAZA_V"=>$_POST["editId"], 
                "ESTADO"=>$_POST["editEstado"], 
                "OBSERVACION"=>$_POST["editObservacion"]);
                $respuesta = ModeloAsigPlazaVacante::mdlEditar($datos);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Actualizo",
                        text: "Se actualizo correctamente",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="AsigPlazaVacante";
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
            }else{
                $datos=array(
                    "ID_USUARIO"=>$_POST["editId"],  
                    "ID_ROL"=>$_POST["editRol"]);
                    $respuesta = ModeloUsuario::mdlEditarRol($datos);
                    if($respuesta=="ok"){
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Actualizo",
                            text: "Se actualizo correctamente",
                            allowOutsideClick: false
                          }).then((result)=>{
                              if(result.value){
                                  window.location="AsigPlazaVacante";
                              }
                            });
                        </script>
                        ';
                    } 
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