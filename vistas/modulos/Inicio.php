<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header)  -->
    <section class="content-header">
        <div class="container-fluid text-primary"> 
            <div class="row">
                <div class="col-md-8">
                    <h1>Inicio</h1>
                </div>
                <div class="col-md-4  d-none d-md-block">
                    <h1>Acceso rapido</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 Scroll" style="height: 82vh; overflow: auto;">
                <div class="row">
                    <div class="container">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="vistas/img/noticias/Mesa.png" class="img-fluid"
                                            alt="Responsive image">
                                    </div>
                                    <div class="col-md-6">

                                        <h4><b>Horario:</b> 8:30am - 4:00pm
                                            <br>
                                            <b>Consultas :</b> 943861917
                                            <br> </h4>
                                        <a href="MiMesadePartes" class="btn btn-success btn-block"><i
                                                class="fas fa-info"></i>&nbsp; Mas información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="timeline-header"><a href="#">Directiva N° 02</h3>
                                        <br>
                                        <a class="btn btn-primary btn-block"
                                            href="http://www.iestpgildaballivian.edu.pe/2020-I/Eventos/DIRECTIVA14-06-2020.pdf"
                                            target="_blank"><i class="fas fa-file"></i>&nbsp; Ver documento</a>
                                        <br>

                                        <?php if($_SESSION["ASIG_PLAZA"]<92 && $_SESSION["ASIG_PLAZA"]>0){?>
                                        <a class="btn btn-secondary btn-block" href="MiDocumentos">
                                            <i class="fas fa-file"></i>&nbsp; Ver todos los documento</a>
                                        <?php }?>
                                    </div>
                                    <div class="col-md-8">
                                        <embed
                                            src="http://www.iestpgildaballivian.edu.pe/2020-I/Eventos/DIRECTIVA14-06-2020.pdf"
                                            type="application/pdf" width="100%" height="300px" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4  d-none d-md-block">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4>Mis Asistencias</h4>

                        <p class="d-flex justify-content-start">Registro de entrada y salida virtual.</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <a href="MiAsistencia" class="small-box-footer"><i class="fas fa-arrow-circle-left"></i>
                        Visualizar</a>
                </div>
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h4>Capacitación</h4>

                        <p class="d-flex justify-content-start">Información de uso de programas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <a href="MiCapacitaciones" class="small-box-footer"><i class="fas fa-arrow-circle-left"></i>
                        Visualizar</a>
                </div>
            </div>
        </div>
    </section>
    <!-- right col -->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--
    //Limpia jaja
-->
<?php
//Asistencia Buscaer
$_SESSION["AsiT"]=null;
$_SESSION["AsiFI"]=null;
$_SESSION["AsiFF"]=null;
$_SESSION["AsiPer"]=null;  
?>
<script>
Swal.fire({
    title: '<strong>Capacitaciones</strong>',
    icon: 'info',
    html: '<br>' +
        '<strong>Google Classroom y Google Meet</strong><br><br>' +
        '<a class="btn btn-success text-light" href="MiCapacitaciones"><i class="fas fa-headset"></i>&nbsp; Ir a capacitaciones</a>',
    allowOutsideClick: false
})
</script>