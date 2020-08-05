<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-user-clock"></i> &nbsp;Mis Asistencias <?php echo $_SESSION["SEMESTRE"];?>
            </h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class=" text-Success"><i class="fas fa-info-circle"></i>&nbsp;<b>Información</b></h3>
                <blockquote class="quote-Success">
                    <p><b>El registro de ingreso y salida de la asistencia es de acuerdo al horario establecido según
                            unidad
                            académica,
                            por lo tanto todo tipo de justificación referente a la asistencia se remitirá a los
                            correos
                            &nbsp;
                            <a href="mailto:iestpglbrmesadepartes@gmail.com"
                                target="_blank">iestpglbrmesadepartes@gmail.com</a>
                            , con la documentación sustentatoria para la justificación correspondiente.</b></p>
                    <hr class="bg-success">
                    <h4 class="text-dark"><b>Cualquier duda o consulta contactar con el Sr. Cristian Milla &nbsp;
                            <a class=" text-success" target="_blank"
                                href="https://api.whatsapp.com/send?phone=+51980487305"><i
                                    class="fas fa-phone-square-alt"></i> 980 487 305</a>
                            &nbsp;&nbsp;<a target="_blank" href="mailto:milla.cristian@iestpgildaballivian.edu.pe"
                                target="_blank"> <i class="far fa-envelope text-primary"></i>
                                milla.cristian@iestpgildaballivian.edu.pe</a></b></h4>
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <?php                      
                        $valor=$_SESSION["ID_PERSONA"];  
                        $lista=ControladorAsistencia::ctrValidar($valor); 
                      ?>
                    <div class="col-md-4 text-light mt-2">
                        <?php if($lista==null && $lista!="disable"){?>
                        <form method="post">
                            <input type="hidden" name="idUsu" value="<?=$_SESSION["ID_PERSONA"]?>">
                            <button class="btn btn-primary" onclick="getLoad()" type="submit"><b>Registrar
                                    Entrada</b></button>
                        </form>
                        <?php }else{?>
                        <button class="btn btn-outline-primary disabled" disabled><b>Registrar
                                Entrada</b></button>
                        <?php }?>
                        <?php
                            $crear = new ControladorAsistencia();
                            $crear ->ctrEntrada(); 
                            ?>
                    </div>
                    <div class="col-md-4 text-light mt-2">
                        <?php if($lista!=null && $lista!="disable"){?>
                        <form role="form" method="post">
                            <input type="hidden" class="form-control" value="<?php echo $lista["ID_ASISTENCIA"];?>"
                                name="idNewEditar">
                            <input type="hidden" class="form-control" value="<?=$lista["ENTRADA_HORA"]?>"
                                name="Entrada">
                            <button type="submit" onclick="getLoad()" class="btn btn-info"><B>Registrar
                                    Salida</B></button>
                        </form>

                        <?php }else{?>
                        <button class="btn btn-outline-info disabled" disabled><b>Registrar
                                Salida</b></button>
                        <?php }?>
                        <?php
                        $Editar = new ControladorAsistencia();
                        $Editar ->ctrSalida(); 
                        ?>
                    </div>
                    <div class="col-md-4 text-right mt-2">
                        <?php  
                       if($_SESSION["CH"]>0 && $_SESSION["CH"]<82){
                        echo'<button class="btn btn-danger" data-toggle="modal" data-target="#HorarioIng"><b>Horario
                            de Asistencia &nbsp;
                            <i class="fas fa-file-pdf"></i></b></button>';}
                            ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-hover table-sm dt-responsive text-center"
                        style="width:100%">
                        <thead>
                            <tr class="bg-primary">
                                <th style="width: 10px">N°</th>
                                <th style="width: 10px">Turno</th>
                                <th style="width: 10px">Dia</th>
                                <th>Fecha</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th style="width: 10px">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            
                    //Lista de asistencias
                    $valor=$_SESSION["ID_PERSONA"];
                    $lista=ControladorAsistencia::ctrListar($valor);

                      if($lista==null){
                        echo' 
                        <tr>                  
                        <td colspan="10">Sin Registros</td>                                                    
                        </tr>
                        ';
                      }else{
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>                                     
                        <td>'.($key+1).'</td>
                        <td>'.$value["TURNO"].'</td>
                        <td>'.$value["DIA"].'</td>';
                        //conversion de Fecha
                        $orgDate = $value["ENTRADA_FECHA"];  
                        date_default_timezone_set("America/Lima");                    
                        $newDate = date("d/m/Y", strtotime($orgDate));      
                                       echo ' 
                        <td>'.$newDate.'</td>
                        <td>'.$value["ENTRADA_HORA"].'</td>         
                        <td>'.$value["HORA_SALIDA"].'</td>                         
                        <td><span class="badge badge-'.$value["COLOR"].'">'.$value["CATEGORIA"].'</span></td>  
                        ';                         
                        echo'                                                                            
                        </tr>
                        ';
                      }}
                      
                      ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal PDF Horario de Asistencia según jornada laboral 2020-I -->
<div id="HorarioIng" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Horario de Asistencia según jornada laboral 2020-I</h4>
                <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <embed
                    src="http://www.iestpgildaballivian.edu.pe/2020-I/JornadaLaboral/J<?php echo $_SESSION["CH"];?>.pdf"
                    type="application/pdf" width="100%" height="600px" />
            </div>
        </div>
    </div>
</div>