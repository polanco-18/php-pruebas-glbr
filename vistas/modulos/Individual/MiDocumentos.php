<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid text-primary">
            <h1><i class="nav-icon fas fa-file-alt"></i> &nbsp;Mis Documentos</h1>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body text-primary">
                <br>
                <div class="table-responsive">
                    <table class="table text-center">
                        <tr> 
                            <th>Documento</th>
                            <th>Tipo</th>
                        </tr>

                        <?php if($_SESSION["CH"]<92){ ?>
                        <tr> 
                            <td>Memorando multiple de Cargas academicas 2020-I</td>
                            <td>
                                <a class="btn btn-danger"
                                    href="http://www.iestpgildaballivian.edu.pe/2020-I/CargasAcademicas/C<?php echo $_SESSION["CH"];?>.pdf"
                                    target="_blank">Ver &nbsp;<i class="far fa-file-pdf"></i></a>
                            </td>
                        </tr>
                        <?php   } ?>
                        <tr> 
                            <td>Memorando multiple de Asistencia segun jornada laboral 2020-I</td>
                            <td>
                                <?php if($_SESSION["CH"]>0 && $_SESSION["CH"]<82){ ?>
                                <a class="btn btn-danger"
                                    href="http://www.iestpgildaballivian.edu.pe/2020-I/JornadaLaboral/J<?php echo $_SESSION["CH"];?>.pdf"
                                    target="_blank">Ver &nbsp;<i class="far fa-file-pdf"></i></a>
                                <?php   }   else { ?>
                                <p>Pendiente</p>
                                <?php   } ?>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->