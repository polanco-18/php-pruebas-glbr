<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-cog"></i> &nbsp;Asignaciones de Plaza Vacante
                <?php echo $_SESSION["SEMESTRE"];?></h1>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar"><i
                        class="fas fa-plus-square"></i>&nbsp; Agregar</button>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-hover table-sm dt-responsive Data-Table text-center"
                    style="width:100%;">
                    <thead class="bg-primary">
                        <tr>
                            <th style="width: 8px">N°</th>
                            <th style="width: 8px">Opciones</th>
                            <th style="width: 8px">N° C.H.</th>
                            <th>N° Plaza</th>
                            <th>Persona</th>
                            <th>Estado</th>
                            <th>Area</th> 
                            <th class="hide">Correo</th>
                            <th class="hide">Celular</th>
                            <th>Cargo</th>
                            <th>Condición</th>
                            <th style="width: 8px">Horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                        $id=null;
                        $Semestre=$_SESSION["ID_SEMESTRE"];
                        $lista=ControladorAsigPlazaVacante::ctrListarAsig($id,$Semestre); 
                        foreach($lista as $key =>$value){ 
                            echo ' 
                            <tr>
                            <td>'.($key+1).'</td>              
                            <td>
                            <a class="badge badge-info" data-toggle="modal" data-target="#modalEditar" onclick="getAsigPlazaV('.$value["ID_ASIG_PLAZA_V"].')"><i class="fas fa-pen"></i></a>
                            <a class="badge badge-danger" onclick="getBorrar('.$value["ID_ASIG_PLAZA_V"].')" data-toggle="modal" data-target="#modalBorrar"><i class="fas fa-trash"></i></a>
                            </td>                                                
                            <td>'.$value["POSICION_CH"].'</td>                
                            <td>'.$value["PLAZA"].'</td><td> ';?>
                        &nbsp;<a class="badge badge-success" onclick="getPer('<?=$value['ID_PERSONA']?>')"
                            data-toggle="modal" data-target="#modalView"><i class="fas fa-info-circle"></i></a>
                        <?php
                            echo'
                            ('.$value["ID_PERSONA"].') '.$value["NOMBRE"].', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'';
                            if($value["ESTADO"]==="1"){
                                echo'</td><td><span class="badge badge-success">Activo</span></td>  ';                        
                            }else{
                                echo'</td><td><span class="badge badge-danger">'.$value["OBSERVACION"].'</span></td>  ';                        
                            }
                            echo'           
                            <td>'.$value["AREA"].'</td>          
                            <td class="hide">'.$value["CORREO"].'</td> 
                            <td class="hide">'.$value["CELULAR"].'</td> 
                            <td>'.$value["CARGO"].'</td>  
                            <td>'.$value["TIPO"].'</td>                        
                            <td>'.$value["HORA"].'</td>    ';          
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
<!-- Modal borrar-->
<div class="modal fade" id="modalBorrar" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form role="form" method="post">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <br>
                    <h1><i class="fas fa-trash text-danger"></i></h1>
                    <br>
                    <h4>¿Desea borrar Asignacion de plaza vacante?</h4>
                    <input type="hidden" id="idBorrar" name="idBorrar" required>
                    <?php
                    $obj = new ControladorAsigPlazaVacante();
                    $obj ->ctrBorrar(); 
                    ?>
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Agregar -->
<div id="modalAgregar" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form role="form" method="post" class="needs-validation" novalidate>
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Agregar</h4>
                    <button type="button" class="close  bg-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Seleccione Plaza Vacante <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="ingPlaza" style="width: 100%;"
                            required>
                            <option value="">Seleccione Plaza Vacante Libre</option>
                            <?php 
                                $lista=ControladorAsigPlazaVacante::ctrListarPlazaV($_SESSION["ID_SEMESTRE"]);
                                foreach($lista as $key =>$value){ 
                                    echo '      
                                    <option value="'.$value["ID_PLAZA_VACANTE"].'">'.$value["POSICION_CH"].' - '.$value["PLAZA"].' - '.$value["CARGO"].' - '.$value["TIPO"].' </option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccione Persona <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="ingPersona" style="width: 100%;"
                            required>
                            <option value="">Seleccione Persona</option>
                            <?php 
                                $lista=ControladorAsigPlazaVacante::ctrListarPersona($_SESSION["ID_SEMESTRE"]);
                                foreach($lista as $key =>$value){ 
                                    echo '      
                                    <option value="'.$value["ID_PERSONA"].'">'.$value["NOMBRE"].', '.$value["APELLIDO_P"].' '.$value["APELLIDO_P"].'</option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                    $obj = new ControladorAsigPlazaVacante();
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
                        <label>Persona</label>
                        <input type="text" class="form-control" id="editPersona" disabled>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Semestre</label>
                                <input type="text" class="form-control" id="editSemestre" disabled>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>N° Cuadrod de horas</label>
                                <input type="text" class="form-control" id="editCH" disabled>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input type="text" class="form-control" id="editCargo" disabled>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control Tipo-Estado" name="editEstado" id="TipoE" required> 
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group hide" id="obArea">
                        <label>Observacion</label>
                        <input type="text" class="form-control" name="editObservacion" id="editObservacion">
                    </div> 
                    <?php
                    $obj = new ControladorAsigPlazaVacante();
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
                    <div class="hide" id="ReportePDF">
                        <table style="width: 100%;font-family: Arial Narrow; line-height: 15px;">
                            <tr>
                                <td style="width: 10%; font-size: 7px;line-height: 7px;">
                                    <center><img src="src/img/plantilla/logo.png" style="width: 40px;height: 50px;" />
                                    </center>
                                </td>
                                <td style="width: 30%; font-size: 7px;line-height: 7px;text-align: center;">
                                    <b><br>MINISTERIO DE EDUACIÓN<br>DIRECCIÓN REGIONAL DE EDUCACIÓN DE LIMA
                                        METROPOLITANA<br>INSTITUTO DE EDUACIÓN SUPERIOR TECNOLÓGICO PÚBLICO<br>"GILDA
                                        LILIANA BALLIVIÁN ROSADO"</b>
                                </td>
                                <td style="width: 20%">
                                </td>
                                <td style="width: 40%;">
                                    <div style="font-size: 9px;line-height: 7px;text-align: center;">
                                        <div style="font-family: Arial Narrow; line-height: 15px;font-size: 7px;"
                                            ALIGN="justify">"DECENIO DE LA IGUALDAD DE OPORTUNIDADES PARA MUJERES Y
                                            HOMBRES
                                            - 2018 - 2027"</div><b>"AÑO DE LA UNIVERSALIZACIÓN DE LA SALUD"</b>
                                    </div><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%;" colspan="2">
                                </td>
                                <td style="width: 15%">
                                </td>
                                <td style="width: 45%;text-align: right;">
                                    <small style="font-size: 12px;line-height: 10px;">San Juan de Miraflores, <span
                                            id="fecha"></span>.</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size: 18px;line-height: 40px; ">
                                    <center><b><u>INFORMACION DEL PERSONAL - I.E.S.T.P. "G.L.B.R." </u></b></center>
                                </td>
                            </tr>
                        </table>
                        <table class="text-left" style="width:100%;font-size: 12px;line-height: 25px;">
                            <tr>
                                <td colspan="2">
                                    <label>Nacionalidad : </label>
                                    <span id="V-Nac"></span>
                                </td>
                                <td colspan="2">
                                    <label>Documento <span id="V-DOC"></span> : </label>
                                    <span id="V-NUM"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Nombres : </label>
                                    <span id="V-NOM"></span>
                                </td>
                                <td colspan="2">
                                    <label>Apellido Paterno : </label>
                                    <span id="V-APE-P"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Apellido Materno : </label>
                                    <span id="V-APE-M"></span>
                                </td>
                                <td>
                                    <label>Sexo : </label>
                                    <span id="V-SEX"></span>
                                </td>
                                <td>
                                    <label>Fecha Nacimiento : </label>
                                    <span id="V-FECHA"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label>Correo Institucional : </label>
                                    <span id="V-CORREO_INST"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label>Correo Personal : </label>
                                    <span id="V-CORREO"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label>Correo Personal N° 2 : </label>
                                    <span id="V-CORREO_2"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Telefono : </label>
                                    <span id="V-TELEFONO"></span>
                                </td>
                                <td colspan="2">
                                    <label>Celular : </label>
                                    <span id="V-CELULAR"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Celular N° 2 : </label>
                                    <span id="V-CELULAR_2"></span>
                                </td>
                                <td colspan="2">
                                    <label>Departamento : </label>
                                    <span id="V-DEPARTAMENTO"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Provincia : </label>
                                    <span id="V-PROVINCIA"></span>
                                </td>
                                <td colspan="2">
                                    <label>Distrito : </label>
                                    <span id="V-DISTRITO"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label>Direccion : </label>
                                    <span id="V-DIRECCION"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label>Referencia : </label>
                                    <span id="V-REFERENCIA"></span>
                                </td>
                            </tr>

                        </table>

                    </div>
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
                        <div class="col-md-6">
                            <label>Correo Personal N° 2 : </label>
                            <span id="NV-CORREO_2"></span>
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
                        <div class="col-md-4">
                            <label>Celular N° 2 : </label>
                            <span id="NV-CELULAR_2"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Departamento : </label>
                            <span id="NV-DEPARTAMENTO"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Provincia : </label>
                            <span id="NV-PROVINCIA"></span>
                        </div>
                        <div class="col-md-4">
                            <label>Distrito : </label>
                            <span id="NV-DISTRITO"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Direccion : </label>
                            <span id="NV-DIRECCION"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Referencia : </label>
                            <span id="NV-REFERENCIA"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button class="btn btn-outline-danger" type="button"
                                onclick="printJS('ReportePDF', 'html')"><i class="fas fa-file-pdf"></i> PDF </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>