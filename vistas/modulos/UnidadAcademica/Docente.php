<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1>Administracion de Datos de Docentes <?php echo $_SESSION["SEMESTRE"];?></h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card"> 
            <div class="card-body"> 
                <table class="table table-bordered table-hover table-sm dt-responsive Data-Table text-center"
                    style="width:100%">
                    <thead>
                        <tr> 
                            <th style="width:8px">N°</th>
                            <th style="width:8px">Estado</th>
                            <th style="width:8px">N° Documento</th>
                            <th>Docente</th> 
                            <th>Area</th> 
                            <th>Correo Corporativo</th> 
                            <th>Celular</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                      $item=null; 
                      $lista=ControladorDocente::ctrListar($item);
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>                                      
                        <td>'.($key+1).'</td>    ';
                        if($value["OBSERVACION"]!=''){
                        echo'
                        <td><span class="badge badge-pill badge-danger">'.$value["OBSERVACION"].'</span></td>
                        ';}else{
                            echo'
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                            ';  
                        }
                        
                        echo'
                        <td>'.$value["ID_PERSONA"].'</td>
                        <td> '.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].' ';?>
                        &nbsp;<a class="badge badge-success" onclick="getPer('<?=$value['ID_PERSONA']?>')"
                                data-toggle="modal" data-target="#modalView"><i class="fas fa-info-circle"></i></a>
                        <?php echo'</td>                            
                        <td>'.$value["AREA"].'</td>                      
                        <td>'.$value["CORREO_INST"].'</td>                         
                        <td>'.$value["CELULAR"].'</td>                            
                        </tr>
                        ';
                      }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal View -->
<div id="modalView" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-xl">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Ver Persona</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Cuerpo -->
                <div class="modal-body">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nacionalidad : </label>
                            <span id="NV-Nac"></span>

                        </div>
                        <div class="col-md-4">
                            <td colspan="2">
                                <label>Documento <span id="NV-DOC"></span> : </label>
                                <span id="NV-NUM"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Nombres : </label>
                            <span id="NV-NOM"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Apellido Paterno : </label>
                            <span id="NV-APE-P"></span>
                        </div>
                        <div class="col-md-4">
                            <td colspan="2">
                                <label>Apellido Materno : </label>
                                <span id="NV-APE-M"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Sexo : </label>
                            <span id="NV-SEX"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Fecha Nacimiento : </label>
                            <span id="NV-FECHA"></span>
                        </div>
                        <div class="col-md-8">
                            <td colspan="2">
                                <label>Correo Institucional : </label>
                                <span id="NV-CORREO_INST"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Correo Personal : </label>
                            <span id="NV-CORREO"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Telefono : </label>
                            <span id="NV-TELEFONO"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Celular : </label>
                            <span id="NV-CELULAR"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>