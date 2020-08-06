<?php 
require "./modelos/Asistencia.modelo.php";
class Asistencia{    
      
    //Validar
    static public function ctrValidar($id){        
       //Validacion que se registre el mismo dia
        date_default_timezone_set("America/Lima");
        $fecha=date("Y-m-d"); 
        $HORA=date("H:i:s");
        //validacion de tiempo completo 
        $HORAVA = strtotime("06:00");
        $HORAINI = strtotime($HORA);
        //Que sea mayor a 6am
        if($HORAINI>$HORAVA)
        { 
            $Semestre=1;             
            $respuesta=ModeloAsistencia::mdlValidar($id,$fecha,$Semestre);
            if($respuesta==null){
                return "entrada";    
            }else{
                return "salida";
            }
        } else{
            return "disable";
        }
    }  
    static public function ctrBusEditar($valor){ 
        $respuesta=ModeloAsistencia::mdlBusEditar($valor);
        return $respuesta;
    }
    static public function ctrBusFecha($valor,$valor2,$valor3,$valor4){  
        $Semestre=$_SESSION["ID_SEMESTRE"];
        $respuesta=ModeloAsistencia::mdlBusFecha($valor,$valor2,$valor3,$valor4,$Semestre);
        return $respuesta;
    }  
    //Crear Sesion
    static public function ctrCrearSesion(){ 
        if(isset($_POST["FechaI"])){
            if($_POST["FechaI"]<$_POST["FechaF"]){
                if($_POST["PERSONA"]=="Todos"){
                    $_SESSION["AsiPer"]=null;   
                }else{
                    $_SESSION["AsiPer"]=$_POST["PERSONA"]; 
                    $_SESSION["AsiT"]=null;   
                }
                $_SESSION["AsiFI"]=$_POST["FechaI"];
                $_SESSION["AsiFF"]=$_POST["FechaF"];  
                echo '<script>
                window.location="Asistencia";
                </script>';
            }else{
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "La fecha de inicio no puede ser mayor a la fecha de fin!!",
                    }).then((result)=>{
                        if(result.value){
                            window.location="Asistencia";
                        }
                        });
                    </script>
                    ';  
            }          
        }
    }  
    //Limpiar Sesion
    static public function ctrLimpiarSesion(){ 
        if(isset($_POST["Limpiar"])){
            $_SESSION["AsiT"]=null;
            $_SESSION["AsiFI"]=null;
            $_SESSION["AsiFF"]=null;
            $_SESSION["AsiPer"]=null;        
            echo '<script>
            window.location="Asistencia";
            </script>';
        }
    }  
    // Crear Asistencia 
    static public function ctrEntrada(){ 
         
        if(isset($_POST["idUsu"])){ 
            //Fecha de hoy
            date_default_timezone_set("America/Lima"); 
            $valor=$_SESSION["ID_PERSONA"];
            $Semestre=$_SESSION["ID_SEMESTRE"];  
            $fecha=date("Y-m-d"); 
            $Hturno =date("H"); 
            $respuesta=ModeloAsistencia::mdlValidar($valor,$fecha,$Semestre);
                //validar si hay asistencias activas
                if($respuesta==null){
                    //VALIDACION DIA DE SEMANA
                    $DIA =date("N");    
                    if($DIA==1){
                        $DIA="Lunes";
                    }                   
                    else if($DIA==2){
                        $DIA="Martes";
                    }                   
                    else if($DIA==3){
                        $DIA="Miercoles";
                    }                   
                    else if($DIA==4){
                        $DIA="Jueves";
                    }                   
                    else if($DIA==5){
                        $DIA="Viernes";
                    }                   
                    else if($DIA==6){
                        $DIA="Sabado";
                    }                
                    else{
                        $DIA="Domingo";
                    }               
                    //validacion de turno
                    if($Hturno<13){
                        $Hturno="D";
                    }else{
                        $Hturno="N";                
                    }                           
                    $datos=array("ID_PERSONA"=>$_SESSION["ID_PERSONA"],  
                    "ENTRADA_FECHA"=>date("Y-m-d"),
                    "ENTRADA_HORA"=>date("H:i:s"), 
                    "ID_CATEGORIA_ASI"=>1,
                    "DIA"=>$DIA,
                    "TURNO"=>$Hturno,
                    "ID_SEMESTRE"=>$_SESSION["ID_SEMESTRE"]
                    ); 
                    $respuesta = ModeloAsistencia::mdlEntrada($datos);
                    if($respuesta=="ok"){
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Entrada '.date("H:i:s").'",
                            text: "Se registro correctamente",
                            allowOutsideClick: false
                        }).then((result)=>{
                            if(result.value){
                                window.location="MiAsistencia";
                            }
                        });
                        </script>
                        ';
                    }else{
                            echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error...",
                                text: "No se puedo registrar",
                            });
                            </script>
                            ';
                        }
                }   else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Actualmente tiene una asitencia que falta marcar salida, refresque la pagina",
                        allowOutsideClick: false
                    }).then((result)=>{
                        if(result.value){
                            window.location="MiAsistencia";
                        }
                        });
                    </script>
                    ';
                }  

        }
    }
    // Editar Asistencia 
    static public function ctrSalida(){
        if(isset($_POST["idNewEditar"])){  
                //Fecha de hoy
                date_default_timezone_set("America/Lima"); 
                $Salida=date("H:i:s");
                $Entrada=$_POST["Entrada"];
            //validacion de tiempo trabajado                        
            $horadifI = new DateTime($Entrada);
            $horadifT= new DateTime($Salida);
            $dif = $horadifT->diff($horadifI); 
            $Diferencia = strtotime($dif->format('%H:%i:%s')); 
            //validacion de tiempo completo
            $TiempoEnM = strtotime("8:05");
            $TiempoEnMS = strtotime("13:00");
            $horaInicio = strtotime($Entrada);
            //validacion de tiempo completo
            $TiempoCompleto = strtotime( "5:00" );
            //tiempo de bolsa
            $TiempoBolsa = strtotime( "0:45" );
          if($_SESSION["ASIG_HORA"]<22  && $_SESSION["ASIG_HORA"]>0){
            if($TiempoBolsa<$Diferencia) {                          
                $Estado=2;
            }
               else {
                $Estado=8;
               }            
          }
            else{
                if($TiempoCompleto<$Diferencia){
                    if($horaInicio<$TiempoEnMS && $horaInicio>$TiempoEnM){                          
                        $Estado=3;
                    }
                    else{          
                        $Estado=2;
                    }
                }else{
                    $Estado=8;
                }
            }
                $datos=array(                                
                "ID_ASISTENCIA"=>$_POST["idNewEditar"], 
                "ID_CATEGORIA_ASI"=>$Estado,  
                "HORA_SALIDA"=>$Salida);
                $respuesta = ModeloAsistencia::mdlSalida($datos);
                if($respuesta=="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Salida '.date("H:i:s").'",
                        text: "Se registro correctamente ",
                        allowOutsideClick: false
                      }).then((result)=>{
                          if(result.value){
                              window.location="MiAsistencia";
                          }
                        });
                    </script>
                    ';
                } 
                else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Error al registrar",
                    });
                    </script>
                    ';
                }   
        }
    }
    // Editar Observacion 
    static public function ctrEditarObservacion(){
        if(isset($_POST["Obser"])){  
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>';  
                if($_POST["Categoria"]=='Seleccione'){
                    $Cat=$_POST["selectId"];
                }else{
                    $Cat=$_POST["Categoria"];
                }
                //FECHA ACTUAL
                date_default_timezone_set("America/Lima");  
                $fecha=date("Y-m-d h:i:s"); 
                    $datos=array(                                
                    "ID_ASISTENCIA"=>$_POST["id"],             
                    "ID_CATEGORIA_ASI"=>$Cat ,  
                    "ENTRADA_HORA"=>$_POST["HoraE"] ,  
                    "HORA_SALIDA"=>$_POST["HoraS"] ,            
                    "FECHA_M"=>$fecha,           
                    "OBSERVACION"=>$_POST["Obser"]);
                    $respuesta = ModeloAsistencia::mdlEditarObser($datos);
                    if($respuesta=="ok"){
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Observacion",
                            text: "Se registro correctamente ",
                            allowOutsideClick: false
                          }).then((result)=>{
                              if(result.value){
                                  window.location="Asistencia";
                              }
                            });
                        </script>
                        ';
                    } 
                    else{
                        echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "Error al ingresar",
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

    static public function ctrValidarCierre(){ 
        
        if(isset($_POST["FechaAct"])){ 
            //fecha actual
            date_default_timezone_set("America/Lima");                    
            $FechaAct = date("Y-m-d");  
            $FEchaVal=$_POST["FechaAct"];
            $Semestre=$_SESSION["ID_SEMESTRE"]; 
            if($FechaAct>$FEchaVal){
                //Carga on
                echo'
                <script>             
                    var element = document.getElementById("loader");
                    element.classList.remove("hide"); 
                    element.classList.add("show");
                </script>'; 
                //validar
                $DIA=ModeloAsistencia::mdlValidarCierreDIA($Semestre,$FEchaVal);
                if($DIA!=null){
                    $DIAV=$DIA["DIA"];
                    $respuesta1=ModeloAsistencia::mdlValidarCierre($Semestre,$FEchaVal);                    
                    $respuesta=ModeloAsistencia::mdlValidarCierreADM($Semestre,$FEchaVal,$DIAV);
                     $respuesta=ModeloAsistencia::mdlValidarCierreDOC($Semestre,$FEchaVal,$DIAV);
                     if($respuesta=="ok"){
                        echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Valido",
                            text: "Se registro correctamente ",
                            allowOutsideClick: false
                        }).then((result)=>{
                            if(result.value){
                                window.location="Asistencia";
                            }
                            });
                        </script>
                        ';
                    } else{
                        echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "No se pudo registrar",
                        });
                        </script>
                        ';
                    }
                }else{
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se encuentra registros de ese dia",
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
            }else{
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "La fecha no puede ser la misma de hoy o menor",
                });
                </script>
                ';
            }
        }
    }
}