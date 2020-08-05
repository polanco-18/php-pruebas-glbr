<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="fas fa-calendar-check"></i> &nbsp;Lista de Asistencias del <?php echo $_SESSION["SEMESTRE"];?>
            </h1>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <?PHP   if($_SESSION["ID_PERSONA"]=="40034231" || $_SESSION["ID_PERSONA"]=="74085764" ){?>

        <div class="alert alert-primary" role="alert">
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <p><b><i class="fas fa-calendar-check"></i> &nbsp;Validación :</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="">Fecha :</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="FechaAct" class="form-control" required>
                        <?php                                 
                                $Editar = new ControladorAsistencia();
                                $Editar ->ctrValidarCierre(); 
                                ?>
                    </div> 
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning btn-block text-center">
                            <b>Validar &nbsp;<i class="fas fa-calendar-check"></i></b>
                        </button>
                    </div>

                </div>
            </form>
            <hr class="bg-light">
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-10">
                        <p><b><i class="fas fa-search"></i> &nbsp;Busqueda</b></p>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" onclick="getLoad()" class="btn btn-danger btn-block text-center">
                            <b>Limpiar Campos &nbsp;<i class="fas fa-broom"></i></b>
                        </button>

                        <input type="hidden" name="Limpiar" class="form-control"
                            value="<?php echo $_SESSION["AsiFI"];?>" required>
                        <?php
                                $Editar = new ControladorAsistencia();
                                $Editar ->ctrLimpiarSesion(); 
                                ?>
                    </div>
                </div>
            </form>
            <form role="form" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="FechaI" class="form-control"
                                value="<?php echo $_SESSION["AsiFI"];?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha Fin</label>
                            <input type="date" name="FechaF" class="form-control"
                                value="<?php echo $_SESSION["AsiFF"];?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Personal</label>
                            <select class="form-control js-example-basic-single" name="PERSONA" style="width: 100%;"
                                name="Persona">
                                <?php if($_SESSION["AsiPer"]!=null){?>
                                <option><?php echo $_SESSION["AsiPer"];?></option>
                                <option>Todos</option>
                                <?php }else{?>
                                <option>Todos</option>
                                <?php }?>
                                <?php 
                                            $item=null;
                                            $valor=null;
                                            $lista=ControladorPersona::ctrListar($item,$valor);
                                            foreach($lista as $key =>$value){ 
                                                echo '      
                                                <option value="'.$value["ID_PERSONA"].'">'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</option>
                                                ';
                                            }
                                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="submit" class="btn btn-info btn-block text-center mt-2">
                            <b>Buscar &nbsp;<i class="fas fa-search"></i></b>
                        </button>
                    </div>
                    <?php
                                $Editar = new ControladorAsistencia();
                                $Editar ->ctrCrearSesion(); 
                                ?>

                </div>
            </form>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover Data-Table table-sm dt-responsive text-center"
                    style="width:100%" id="tabla">
                    <?php } else{?>
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover Data-T table-sm dt-responsive text-center"
                                style="width:100%">

                                <?php }?>
                                <thead>
                                    <tr>
                                        <th style="width: 5px">N°</th>
                                        <th style="width: 5px">N° Documento</th>
                                        <th style="width: 10px">Personal</th>
                                        <th style="width: 5px">Celular</th>
                                        <th style="width: 5px">Turno</th>
                                        <th style="width: 5px">Dia</th>
                                        <th style="width: 5px">Fecha</th>
                                        <th style="width: 5px">Entrada</th>
                                        <th style="width: 5px">Salida</th>
                                        <th style="width: 5px">Estado</th>
                                        <th>Observación</th>
                                        <th style="width: 5px">Fecha M.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                            $valor=$_SESSION["AsiFI"];
                                            $valor2=$_SESSION["AsiFF"];
                                            $valor3=$_SESSION["AsiT"];
                                            $valor4=$_SESSION["AsiPer"];
                                            $lista=ControladorAsistencia::ctrBusFecha($valor,$valor2,$valor3,$valor4); 
                                            foreach($lista as $key =>$value){ 
                                                echo ' 
                                                <tr>                                              
                                                <td>'.($key+1).'</td>  
                                                <td>'.$value["ID_PERSONA"].'</td>'; 
                                                if($value["POSICION_CH"]>0){ 
                                                        echo' 
                                                <td><a href="http://www.iestpgildaballivian.edu.pe/2020-I/JornadaLaboral/J'.$value["POSICION_CH"].'.pdf" target="_blank">'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</a></td>                      
                                                ';
                                            }else{ 
                                                echo'
                                                    <td>'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</td>                      
                                                    ';               
                                            }
                                                echo'
                                                <td>'.$value["CELULAR"].'</td>
                                                <td>'.$value["TURNO"].'</td>   
                                                <td>'.$value["DIA"].'</td>  ';
                                                //conversion de Fecha
                                                $orgDate = $value["ENTRADA_FECHA"];                      
                                                $newDate = date("d/m/Y", strtotime($orgDate));  
 
                                                echo ' 
                                                <td>'.$newDate.'</td>
                                                <td>'.$value["ENTRADA_HORA"].'</td> 
                                                <td>'.$value["HORA_SALIDA"].'</td>
                                                <td><span class="badge badge-'.$value["COLOR"].'">'.$value["CATEGORIA"].'</span></td>                    
                                                    ';
                                                if($_SESSION["ID_PERSONA"]=="40034231" || $_SESSION["ID_PERSONA"]=="74085764" ){
                                                //Justificar                        
                                                    echo '          
                                                    <td><a class="text-primary" href="#"  onclick="getObservacion('.$value["ID_ASISTENCIA"].')" data-toggle="modal" data-target="#modalObservacion"><i class="fas fa-pen-square"></i></a>&nbsp;&nbsp; '.$value["OBSERVACION"].'</td>                      
                                                    ';}else{
                                                //Justificar                        
                                                echo '          
                                                <td>'.$value["OBSERVACION"].'</td>  
                                                ';
                                                    }
                                                    if($value["FECHA_M"]==null){
                                                        $newDateM=null;
                                                    }else{
                                                        $newDateM = date("d/m/Y h:i:s", strtotime($value["FECHA_M"])); 
                                                    }
                                                echo '
                                                <td>'.$newDateM.'</td>  
                                                </tr>
                                                ';
                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal observacion -->
<div id="modalObservacion" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Observación</h4>
                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- id -->
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="form-group">
                        <label>Persona</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="Per" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado Actual</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-certificate"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="selectv" readonly>
                                    <input type="hidden" class="form-control" name="selectId" id="selectId" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nuevo estado</label>
                                <select class="form-control" name="Categoria">
                                    <option selected>Seleccione</option>
                                    <?php  $lista=ControladorCategoriaAsis::ctrListar(); 
                                        foreach($lista as $key =>$value){  
                                   echo'
                                    <option value="'.$value["ID_CATEGORIA_ASI"].'">'.$value["CATEGORIA"].'</option>
                                    ';} ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Turno</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-smog"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="Tur" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="Fec" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hora entrada</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <input type="time" class="form-control" name="HoraE" id="Hora" step="1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hora salida</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <input type="time" class="form-control" name="HoraS" id="SALIDA" step="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Obser">Observación</label>
                            <textarea class="form-control" id="Obser" name="Obser" minlength="5" rows="3"
                                required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modficar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            <?php
              $Editar = new ControladorAsistencia();
              $Editar ->ctrEditarObservacion(); 
            ?>
        </form>
    </div>
</div>