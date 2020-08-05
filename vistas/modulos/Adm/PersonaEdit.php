<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-users"></i> &nbsp;Actualización de Datos de Persona</h1>
        </div><!-- /.container-fluid -->
    </section>

    <?php 
            $item='ID_PERSONA';
            $valor=$_GET["Id"];
            $lista=ControladorPersona::ctrListar($item,$valor); 
     ?>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form role="form" method="post">
            <div class="card">
                <div class="card-body">
                    <p><span class="text-danger">* Casilla Obligatoria</span>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo de Documento <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $lista["TIPO_DOCUMENTO"];?>"
                                        placeholder="Ingrese N° de Documento" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nacionalidad <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="<?php echo $lista["NACIONALIDAD"];?>" name="EditNacionalidad"
                                            placeholder="Ingrese Nacionalidad" disabled>
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
                                        <input type="text" class="form-control" pattern="[0-9]{7,}"
                                            value="<?php echo $lista["ID_PERSONA"];?>" name="EditDocumento"
                                            id="EditDocumento" placeholder="Ingrese N° de Documento" required>
                                    </div>
                                </div>
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
                                        <input type="text" class="form-control" name="EditNombre" id="EditNombre"
                                            value="<?php echo $lista["NOMBRE"];?>" placeholder="Ingrese Nombre"
                                            required>
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
                                        <input type="text" class="form-control" name="EditApellido_p"
                                            id="EditApellido_p" value="<?php echo $lista["APELLIDO_P"];?>"
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
                                        <input type="text" class="form-control" name="EditApellido_m"
                                            id="EditApellido_m" value="<?php echo $lista["APELLIDO_M"];?>"
                                            placeholder="Ingrese Apellido Materno" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sexo <span class="text-danger">*</span></label>
                                    <select class="form-control" name="EditSexo" value="<?php echo $lista["SEXO"];?>"
                                        required>
                                        <?php $sexo;
                                if($lista["SEXO"]==0){
                                    echo'
                                    <option value="'.$lista["SEXO"].'">Femenino</option>
                                    <option value="1">Masculino</option>
                                    ';
                                }else{
                                    echo'
                                    <option value="'.$lista["SEXO"].'">Masculino</option>
                                    <option value="1">Femenino</option>
                                    ';
                                } ?>
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
                                        <input type="text" class="form-control" name="EditFecha"
                                            value="<?php echo $lista["FECHA_NACIMIENTO"];?>" id="ingFecha"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask="" im-insert="false" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingrese Correo Corporativo </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="EditCorreoCorp"
                                            value="<?php echo $lista["CORREO_INST"];?>" placeholder="Ingrese Correo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Correo <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="EditCorreo"
                                            value="<?php echo $lista["CORREO"];?>" placeholder="Ingrese Correo"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Telefono</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="nu" class="form-control" name="EditTelefono"
                                            value="<?php echo $lista["TELEFONO"];?>" placeholder="Ingrese Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ingrese Celular <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" name="EditCelular"
                                            value="<?php echo $lista["CELULAR"];?>" placeholder="Ingrese nueve digitos"
                                            pattern="[0-9]{9}" maxlength="9" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <a type="button" class="btn btn-success" href="Persona">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <?php
                    $crearPersona = new ControladorPersona();
                    $crearPersona ->ctrEditarPersona(); 
                    ?>
                </div>
        </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->