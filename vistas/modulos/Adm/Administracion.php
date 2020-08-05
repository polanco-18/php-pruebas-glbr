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
                            <th style="width:10px">Rol</th>
                            <th style="width:10px">Cargo</th>
                            <th style="width:10px">Condicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                      $item=null;
                      $valor=null;
                      $lista=ControladorAdministracion::ctrListar($item,$valor);
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>        
                        <td>'.($key+1).'</td>      ';?>                 
                        <td><a class="badge badge-success" onclick="getPer('<?=$value['ID_PERSONA']?>')" data-toggle="modal" data-target="#modalView"><i class="fas fa-info-circle"></i></a>            
                        <?php echo '
                        <td>'.$value["ID_PERSONA"].'</td>
                        <td>'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</td>                              
                        <td>'.$value["ROL"].'</td>                           
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

<!-- Modal Agregar -->
<div id="modalAdd" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-xl"> 
    <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Agregar Usuario</h4>
                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Personal</label>
                        <select class="form-control js-example-basic-single" name="ingDni" style="width: 100%;"
                            name="Persona">
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
                    <div class="form-group">
                        <label>Ingrese contraseña</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="password" class="form-control" name="ingContraseña"
                                placeholder="Ingrese Constraseña" required>
                        </div>
                    </div>

                    <!-- <h4>Subir Foto</h4>
                    <hr>
                    <input type="file" class="nuevaFoto" name="nuevaFoto">
                    <p class="help-block">Peso maximo de la foto 20MB</p>
                    <img src="vistas/img/usuario/default/anonymous.png" class="img-thumbnail" width="100px"> -->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>
            </div>
            <?php
      $crearUsuario = new ControladorUsuario();
      $crearUsuario ->ctrCrearUsuario(); 
      ?>
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