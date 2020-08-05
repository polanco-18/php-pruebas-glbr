<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>IESTP</b> <b class="text-primary">Gilda Ballivian</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card shadow">
        <div class="card-body login-card-body">
            <form class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label>Usuario</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ingrese N° de Documento" name="ingUsuario"
                            autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-id-card text-primary"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Recuerde ingresar correctamente su N° de Documento
                        </div>

                        <div class="valid-feedback">
                            N° de Documento valido
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <div class="input-group mb-3" id="show_hide_password">
                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="ingPassword"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
            <?php 
                $login = new ControladorLogin();
                $login->ctrIngresoUsuario();
            ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!--Carga-->
<div class="modal fade hide" id="loader"
    style="background-color: rgb(0,0,0); /* Fallback color */background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <button class="btn btn-primary" type="button" disabled>
                Cargando &nbsp;
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Loading...</span>
            </button>
        </div>
    </div>
</div>
<!-- carga cerrando-->