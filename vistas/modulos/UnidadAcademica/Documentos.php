<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1>Documentos a Docentes <?php echo $_SESSION["SEMESTRE"];?></h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hovered table-sm dt-responsive Data-Table text-center"
                    style="width:100%;">
                    <thead>
                        <tr>
                            <th style="width: 8px">N° C.H.</th>
                            <th>N° Plaza</th> 
                            <th>Persona</th> 
                            <th>Area</th>
                            <th>Cargo</th>  
                            <th>Cargas Academicas</th>  
                            <th>Jornada Laboral</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        
                       $id=null;
                       $valor=NULL;
                      $lista=ControladorPlazaVacante::ctrListarAsig($id,$valor); 
                      foreach($lista as $key =>$value){ 
                        echo ' 
                        <tr>                                                 
                        <td>'.$value["POSICION_CH"].'</td>                
                        <td>'.$value["PLAZA"].'</td>  
                        <td>('.$value["ID_PERSONA"].') '.$value["NOMBRE"].', '.$value["APELLIDO_P"].' '.$value["APELLIDO_M"].'</td>                        
                        <td>'.$value["AREA"].'</td>  
                        <td>'.$value["CARGO"].'</td>   
                        <td>
                        ';
                         if($value["CARGO"]!="Asistente"){ 
                            
                            echo'
                            <a class="btn btn-info btn-sm"
                                        href="http://www.iestpgildaballivian.edu.pe/2020-I/CargasAcademicas/C'.$value["POSICION_CH"].'.pdf"
                                        target="_blank">Ver &nbsp;<i class="far fa-file-pdf"></i></a>
                            ';
                        
                        }echo'</td><td>
                            <a class="btn btn-primary btn-sm"
                                        href="http://www.iestpgildaballivian.edu.pe/2020-I/JornadaLaboral/J'.$value["POSICION_CH"].'.pdf"
                                        target="_blank">Ver &nbsp;<i class="far fa-file-pdf"></i></a>
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