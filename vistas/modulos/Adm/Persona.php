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
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo Institucional</th>
                            <th style="width:10px">Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                      $item=null;
                      $valor=null;
                      $lista=ControladorPersona::ctrListar($item,$valor);
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>        
                        <td>'.($key+1).'</td>                       
                        ';
                      ?>
                        <td><a class="badge badge-success" onclick="getPer('<?=$value['ID_PERSONA']?>')"
                                data-toggle="modal" data-target="#modalView"><i class="fas fa-info-circle"></i></a>
                            <a class="badge badge-info"
                                href="index.php?ruta=PersonaEdit&Id=<?=$value['ID_PERSONA']?>"><i
                                    class="fas fa-edit"></i></a></td>
                        <?php echo'
                         <td>'.$value["ID_PERSONA"].'</td>
                        <td>'.strtok($value["NOMBRE"]," ").'</td>
                        <td>'.$value["APELLIDO_P"].'</td>
                        <td>'.$value["APELLIDO_M"].'</td>                     
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

<!-- Modal Agregar -->
<div id="modalAdd" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-xl">
        <form role="form" method="post">
            <input type="hidden" name="action" value="new-persona">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Agregar Persona</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Cuerpo -->
                <div class="modal-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo de Documento <span class="text-danger">*</span></label>
                                    <select class="form-control Tipo-Nacionalidad" name="ingTipoDocumento" required>
                                        <option>Seleccione Tipo</option>
                                        <option>DNI</option>
                                        <option>Carnet de Extranjeria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ingrese Nacionalidad <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="ingNacionalidad"
                                            name="ingNacionalidad" placeholder="Ingrese Nacionalidad"minlength="5" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingrese N° de Documento <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" pattern="[0-9]{7,}" id="ingDocumento"
                                            name="ingDocumento" placeholder="Ingrese N° de Documento" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto text-center">
                                <div class="spinner-border text-primary carga hide" role="status">
                                </div>
                                <p class="text-primary carga hide">Cargando...</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ingNombre" id="ingNombre"
                                            placeholder="Ingrese Nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Apellido Paterno <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ingApellido_p" id="ingApellido_p"
                                            placeholder="Ingrese Apellido Paterno" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Apellido Materno <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ingApellido_m" id="ingApellido_m"
                                            placeholder="Ingrese Apellido Materno" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sexo <span class="text-danger">*</span></label>
                                    <select class="form-control" name="ingSexo" required>
                                        <option value="1">Hombre</option>
                                        <option value="0">Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ingrese Fecha de Nacimiento <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ingFecha" id="ingFecha"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask="" im-insert="false" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingrese Correo <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="ingCorreo"
                                            placeholder="Ingrese Correo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingrese Telefono</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="nu" class="form-control" name="ingTelefono"
                                            placeholder="Ingrese Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingrese Celular <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" name="ingCelular"
                                            placeholder="Ingrese nueve digitos" pattern="[0-9]{9}" maxlength="9"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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