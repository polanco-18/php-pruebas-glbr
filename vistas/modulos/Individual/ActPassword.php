<script src="vistas/dist/js/Password.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1>Actualización de contraseña</h1>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- /.login-logo -->
        <div class="card shadow">
            <div class="card-body login-card-body">
                <form class="needs-validation " method="post" novalidate>
                    <div class="form-group">
                        <label>Ingrese contraseña actual</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Ingrese contraseña actual"
                                name="ContraseñaAct" minlength="7" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Recuerde debe tener minimo 7 digitos
                            </div>
                            <div class="valid-feedback">
                                valido
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ingrese contraseña nueva</label>


                        <div class="input-group mb-3" id="show_hide_password">
                            <input type="password" class="form-control" placeholder="Ingrese contraseña nueva"
                                name="PasswordNew" id="PasswordNew" minlength="7" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Recuerde debe tener minimo 7 digitos
                            </div>
                            <div class="valid-feedback">
                                valido
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Repita la contraseña nueva</label>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Repita contraseña nueva"
                                name="PasswordNew2" id="PasswordNew2" minlength="7" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Recuerde que debe ser igual la contraseña
                            </div>
                            <div class="valid-feedback">
                                valido
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </form>
                <?php 
                $ob = new ControladorUsuario();
                $ob->ctrPasswordNew();
            ?>
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->