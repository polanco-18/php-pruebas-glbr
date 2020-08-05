<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid text-primary">
                    <h1><i class="nav-icon fas fa-user"></i> &nbsp;Mis Datos Personales</h1>
                </div><!-- /.container-fluid -->
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditar">Actualizar mis
                    datos</button>
            </div>
        </div>
    </section>
    <?php 
            $item='ID_PERSONA';
            $valor=$_SESSION["ID_PERSONA"];
            $lista=ControladorPersona::ctrListar($item,$valor); 
     ?>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-primary">
                        <h3>Datos Personales</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><b><?php echo $lista["TIPO_DOCUMENTO"];?>
                                            :</b> <?php echo $lista["ID_PERSONA"];?></td>
                                </tr>
                                <tr>
                                    <td><b>Nombres :</b> <?php echo $lista["NOMBRE"];?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Paterno :</b> <?php echo $lista["APELLIDO_P"];?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Materno :</b> <?php echo $lista["APELLIDO_M"];?></td>
                                </tr>
                                <tr>
                                    <td><b>Fecha de Nacimiento :</b> <?php echo  $lista["FECHA_NACIMIENTO"] ?></td>
                                </tr>
                                <?php $sexo;
                                if($lista["SEXO"]==1){
                                    $sexo='Masculino';
                                }else{
                                    $sexo='Femenino';
                                } ?>
                                <tr>
                                    <td><b>Sexo :</b> <?php echo $sexo; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-primary">
                        <h3>Telefono</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>N°</th>
                                    <th>Tipo</th>
                                    <th>Numero</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Celular</td>
                                    <td><?php echo $lista["CELULAR"];?></td>
                                </tr>
                                <?php if($lista["TELEFONO"]){ ?>
                                <tr>
                                    <td>2</td>
                                    <td>Telefono</td>
                                    <td><?php echo $lista["TELEFONO"];?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body text-primary">
                        <h3>Email</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>N°</th>
                                    <th>Email</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $lista["CORREO_INST"];?></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><?php echo $lista["CORREO"];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal Editar Persona -->
<div id="modalEditar" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-xl">
        <form role="form" method="post" class="was-validated">
            <input type="hidden" name="action" value="new-persona">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Actualizar datos Personales</h4>
                    <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Cuerpo -->
                <div class="modal-body">
                    <span class="text-danger">* Casilla Obligatoria</span>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nacionalidad <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $lista["NACIONALIDAD"];?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo $lista["TIPO_DOCUMENTO"];?> <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $lista["ID_PERSONA"];?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Paterno <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $lista["APELLIDO_P"];?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Materno <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $lista["APELLIDO_M"];?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nombre <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $lista["NOMBRE"];?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sexo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $sexo;?>" disabled>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ingrese Fecha de Nacimiento <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ingFecha" id="ingFecha"
                                            value="<?php echo  $lista["FECHA_NACIMIENTO"]?>"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask="" im-insert="false" required>
                                        <div class="valid-feedback">
                                            Recuerde Dia/Mes/Año
                                        </div>
                                        <div class="invalid-feedback">
                                            Ingrese su fecha de nacimiento Dia/Mes/Año
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Correo Corporativo<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" class="form-control" value="<?php echo $lista["CORREO_INST"];?>"
                                        readonly>
                                    <div class="valid-feedback">
                                        Correo correctamente Ingresado
                                    </div>
                                    <div class="invalid-feedback">
                                        Necesita ingresar su correo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ingrese Correo <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="ingCorreo"
                                        placeholder="Ingrese Correo" value="<?php echo $lista["CORREO"];?>" required>
                                    <div class="valid-feedback">
                                        Correo correctamente Ingresado
                                    </div>
                                    <div class="invalid-feedback">
                                        Necesita ingresar su correo
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ingrese Telefono</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" name="ingTelefono"
                                        placeholder="Ingrese Telefono" value="<?php echo $lista["TELEFONO"];?>"
                                        pattern="[0-9]{6,}" maxlength="11">
                                    <div class="valid-feedback">
                                        El telefono es opcional, no es obligatorio
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ingrese Celular <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" name="ingCelular"
                                        placeholder="Ingrese nueve digitos" value="<?php echo $lista["CELULAR"];?>"
                                        pattern="[0-9]{9}" maxlength="9" required>
                                    <div class="valid-feedback">
                                        N° de celular valido
                                    </div>
                                    <div class="invalid-feedback">
                                        Esta Incompleto, numero de celular obligatorio 9 digitos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

            <?php
      $Editar = new ControladorPersona();
      $Editar ->ctrEditar(); 
      ?>
        </form>
    </div>
</div>