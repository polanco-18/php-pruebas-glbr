<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-users-cog"></i> &nbsp;Administrar Usuario</h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario"><i
                        class="fas fa-plus-square"></i>&nbsp; Agregar
                    Usuario</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm dt-responsive Data-Table text-center"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">N°</th>
                            <th style="width:10px">Opciones</th>
                            <th>Persona</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Ultima Sesion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                      $item=null;
                      $valor=null;
                      $usuario=ControladorUsuario::ctrMostrarUsuario($item,$valor);
                      foreach($usuario as $key =>$value){  
                          //conversion de fecha
                        $newDate = date("d/m/Y h:i:s", strtotime($value["ULTIMA_SESION"]));
                       echo ' 
                       <tr>          
                       <td>'.($key+1).'</td>             
                       <td><a class="badge badge-info" onclick="getUser('.$value["ID_USUARIO"].')" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></a></td>
                       <td>'.strtok($value["NOMBRE"]," ").', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</td> 
                       <td>'.$value["USUARIO"].'</td>
                       <td>'.$value["PASSWORD"].'</td> 
                       <td>'.$newDate.'</td>                       
                       </tr>
                       ' ;
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
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

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
                            <input type="password" class="form-control"minlength="7" name="ingContraseña"
                                placeholder="Ingrese Constraseña" required>
                        </div>
                    </div> 
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

<!-- Modal Editar -->
<div id="modalEditarUsuario" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog">
    <div class="modal-dialog modal-lg">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Editar Usuario</h4>
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
                    <div class="form-group">
                        <label>Usuario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditDni" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ingrese contraseña nueva</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control"minlength="7" name="EditContraseña" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modficar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

            <?php
            $EditarUsuario = new ControladorUsuario();
            $EditarUsuario ->ctrEditarUsuario(); 
            ?>
        </form>
    </div>
</div>