<!-- Navbar -->
<nav class="main-header navbar navbar-expand  fixed-top navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><span
                    class="navbar-toggler-icon"></span></a>
        </li>
        <!--
        <li class="nav-item d-none d-sm-inline-block">
            <a href="Inicio" class="nav-link">Inicio</a>
        </li>
-->
    </ul>
    <!-- Right navbar links -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
            <!--
            Messages Dropdown Menu 
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <?php echo $_SESSION["NOMBRE"];?>  <?php echo $_SESSION["APELLIDO_P"];?> &nbsp;
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <a href="salir" class="dropdown-item dropdown-footer">Salir</a>
                </div>
            </li>
            -->
            <!-- <li class="nav-item dropdown">
                <select class="form-control" id="Semestre">
                    <option>2020-I</option>
                    <option>2020-II</option>
                </select>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle text-light" href="#" id="bd-versions" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <b> 2020-I</b>
                </a>
                <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
                    <a class="dropdown-item active">2020-I</a>
                </div>
            </li>-->
            <!-- Web -->
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="https://mail.google.com/a/iestpgildaballivian.edu.pe/" target="_blank"><img
                        class="gb_ua" src="https://img.icons8.com/fluent/48/000000/gmail.png" alt="" aria-hidden="true"
                        style="width:25px;height:25px">&nbsp;Correo</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="https://drive.google.com/a/iestpgildaballivian.edu.pe/" target="_blank">
                    <img src="https://img.icons8.com/fluent/24/000000/google-drive.png" />&nbsp;Drive</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="https://classroom.google.com/a/iestpgildaballivian.edu.pe/"
                    target="_blank"><img class="gb_ua" src="https://img.icons8.com/color/48/000000/google-classroom.png"
                        alt="" aria-hidden="true" style="width:25px;height:25px">&nbsp;Classroom</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="https://www.google.com/calendar/a/iestpgildaballivian.edu.pe/"
                    target="_blank"><img class="gb_ua" src="https://img.icons8.com/fluent/48/000000/calendar.png" alt=""
                        aria-hidden="true" style="width:25px;height:25px">&nbsp;Calendario</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a class="nav-link " href="https://meet.google.com/" target="_blank"><i
                        class="fas fa-video text-success"></i>&nbsp; Meet</a>
            </li>
            <!-- Android -->
            <li class="nav-item dropdown d-block  d-md-none">
                <a class="nav-item nav-link dropdown-toggle text-light" href="#" id="bd-versions" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <b><img src="https://lh3.googleusercontent.com/kroer1kpwSe3j-lIfPnE7Q3MVaCoJVF8atjdh0VtGDWCz2ulLejVsDh2k6a6VUgpUFQ8qRMHMEX7bsr2jTrLXhZR_ETbqILDf-qfkk0=h128"
                            style="max-width: 25px; max-height: 25px;" alt=""></b>
                </a>
                <div class="dropdown-menu dropdown-menu dropdown-menu-right text-center"
                    style="left: inherit; right: 0px;">
                    <a class="dropdown-item" href="https://mail.google.com/a/iestpgildaballivian.edu.pe/"
                        target="_blank"><img class="gb_ua" src="https://img.icons8.com/fluent/48/000000/gmail.png"
                            alt="" aria-hidden="true" style="width:30px;height:30px">&nbsp;Correo</a>
                    <a class="dropdown-item" href="https://drive.google.com/a/iestpgildaballivian.edu.pe/"
                        target="_blank">
                        <img src="https://img.icons8.com/fluent/24/000000/google-drive.png" />&nbsp;Drive</a>
                    <a class="dropdown-item" href="https://classroom.google.com/a/iestpgildaballivian.edu.pe/"
                        target="_blank"><img class="gb_ua"
                            src="https://img.icons8.com/color/48/000000/google-classroom.png" alt="" aria-hidden="true"
                            style="width:30px;height:30px">&nbsp;Classroom</a>
                    <a class="dropdown-item" href="https://www.google.com/calendar/a/iestpgildaballivian.edu.pe/"
                        target="_blank"><img class="gb_ua" src="https://img.icons8.com/fluent/48/000000/calendar.png"
                            alt="" aria-hidden="true" style="width:30px;height:30px">&nbsp;Calendario</a>
                    <a class="dropdown-item bg-success" href="https://meet.google.com/" target="_blank"><i
                            class="fas fa-video"></i>&nbsp;Meet</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle text-light" href="#" id="bd-versions" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <b><i class="fas fa-user"></i>&nbsp; <?php echo strtok($_SESSION["NOMBRE"]," ");?>
                        <?=$_SESSION["APELLIDO_P"];?> </b>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center"
                    style="left: inherit; right: 0px;">
                    <a class="dropdown-header text-primary" style="line-height: 35px;" href="MiPersona">
                        <b>
                            <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                            <br>
                            <?=$_SESSION["NOMBRE"];?>
                            <?=$_SESSION["APELLIDO_P"];?> </b></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-header"><b>Último Ingreso :
                        </b><?php 
                        //conversion de Fecha
                        $orgDate = $_SESSION["Ultima_Sesion"];                      
                        $newDate = date("d/m/Y h:i:s", strtotime($orgDate)); 
                        echo $newDate;?></a>
                    <a class="dropdown-item bg-primary" href="ActPassword">Actualizar Contraseña &nbsp;<i
                            class="fas fa-key"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-danger btnSalir" href="#">Cerrar Sesión &nbsp;<i
                            class="fas fa-sign-out-alt"></i></a>
                </div>
            </li>
        </ul>
    </div>
</nav>


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
<!-- /.navbar -->
<script>
$(document).ready(function() {
    function displayVals() {
        var singleValues = $("#Semestre").val();
        document.cookie = "SemestreA = " + singleValues;
        location.reload(true);
    }
    // $("select").change(displayVals);
    //siempre se muestre    displayVals();
});
</script>