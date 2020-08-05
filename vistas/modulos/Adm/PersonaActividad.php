<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="fas fa-chart-line"></i> &nbsp;Persona Actividad</h1>
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
                            <th style="width: 10px">N°</th>
                            <th>N° Documento</th>
                            <th>Persona</th>  
                            <th>Actividad</th> 
                            <th>Fecha</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                      $usuario=ControladorPersonaActividad::ctrListar();
                      foreach($usuario as $key =>$value){ 
                        //conversion de fecha
                      $newDate = date("d/m/Y h:i:s", strtotime($value["FECHA"]));  
                       echo ' 
                       <tr>          
                       <td>'.($key+1).'</td>             
                       <td>'.$value["ID_PERSONA"].'</td> 
                       <td>'.$value["NOMBRE"].', '.$value["APELLIDO_P"].'</td> 
                       <td>'.$value["ACTIVIDAD"].'</td>
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