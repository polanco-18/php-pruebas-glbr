<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-users"></i> &nbsp;Administracion de Datos de Persona</h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i
                        class="fas fa-plus-square"></i>&nbsp; Agregar
                    Persona</button>
            </div>
            <div class="card-body">
                <?php
                $crearPersona = new ControladorPersona();
                $crearPersona ->ctrCrearPersona(); 
                ?>
                <table class="table table-bordered table-hover table-sm dt-responsive Data-Table text-center"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">N°</th>
                            <th style="width:10px">Opciones</th>
                            <th style="width:10px">N° Documento</th>
                            <th>Persona</th>   
                            <th style="width:10px">Cargo</th>
                            <th style="width:10px">Condicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                      $item=null; 
                      $lista=ControladorAdministracion::ctrListar($item);
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>        
                        <td>'.($key+1).'</td>      ';?>                 
                        <td>
                            <a class="badge badge-info" onclick="getAdm('<?=$value['ID_ADMINISTRATIVO']?>')"
                                data-toggle="modal" data-target="#modalEditar"><i class="fas fa-pen"></i></a>
                            <a class="badge badge-success" onclick="getPer('<?=$value['ID_PERSONA']?>')"
                                data-toggle="modal" data-target="#modalView"><i class="fas fa-info-circle"></i></a>
                            <a class="badge badge-danger" onclick="getBorrarAdm('<?=$value['ID_ADMINISTRATIVO']?>')"
                                data-toggle="modal" data-target="#modalBorrar"><i class="fas fa-trash"></i></a>         
                        <?php echo '
                        </td>
                        <td>'.$value["ID_PERSONA"].'</td>
                        <td>'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</td>                          
                        <td>'.$value["CARGO"].'</td>                           
                        <td>'.$value["CONDICION"].'</td>                           
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
<!-- Modal Editar -->
<div id="modalEditar" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form role="form" method="post" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Editar</h4>
                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="editId" required>
                    <div class="form-group">
                        <label>Persona <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="editPersona" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cargo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="editCargo" name="editCargo">
                    </div>
                    <div class="form-group">
                        <label>Condicion <span class="text-danger">*</span></label>
                        <select class="form-control" name="editCondicion" id="editCondicion" required> 
                        </select>
                    </div>
                    <?php
                    $obj = new ControladorAdministracion();
                    $obj ->ctrEditar(); 
                    ?>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal borrar-->
<div class="modal fade" id="modalBorrar" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <br>
                    <h1><i class="fas fa-trash text-danger"></i></h1>
                    <br>
                    <h4>¿Desea borrar usuario?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorAdministracion();
                    $obj ->ctrBorrar(); 
                    ?>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Agregar -->
<div id="modalAdd" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-xl">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Agregar</h4>
                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Personal <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="ingDni" style="width: 100%;"
                            required>
                            <option value=""> Seleccione Persona </option>
                            <?php  
                                $lista=ControladorAdministracion::ctrListarPersona();
                                foreach($lista as $key =>$value){ 
                                    echo '      
                                    <option value="'.$value["ID_PERSONA"].'">'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cargo <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="ingCargo" placeholder="Ingrese Cargo"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Condicion <span class="text-danger">*</span></label>
                        <select class="form-control" name="ingCondicion" required>
                            <option value="">Seleccione Condicion</option>
                            <option>Nombrado</option>
                            <option>Contratado</option>
                            <option>Tercero</option>
                        </select>
                    </div>
                    <?php
                    $obj = new ControladorAdministracion();
                    $obj ->ctrCrear(); 
                    ?>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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