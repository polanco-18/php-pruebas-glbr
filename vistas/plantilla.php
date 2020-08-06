<?php
session_start();
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula Virtual</title>
    <link rel="shortcut icon" href="vistas/img/plantilla/logo.png">
    <!-- Font Awesome -->
    <script src="vistas/dist/js/fontlogo.js"></script>
    <!-- Sweet Alert-->
    <script src="vistas/plugins/stweetAlert/sweetalert2@9.js"></script>
    <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/dist/js/demo.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Plugin overlayScrollbars -->
    <link type="text/css" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.css" rel="stylesheet" />
    <script type="text/javascript" src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.js"></script>
    <!-- DataTables Excel-->
    <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <!-- Inputmask-->
    <script src="vistas/plugins/Inputmask/jquery.inputmask.min.js"></script>
    <!-- Select2-->
    <link href="vistas/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <script src="vistas/plugins/select2/js/select2.min.js"></script>
    <!-- pdf -->
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js" type="text/javascript"></script>
    <!-- css -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="vistas/dist/css/style.css" />
    <!-- js -->
    <script src="vistas/dist/js/Plantilla.js"></script>
    <script src="vistas/dist/js/Usuario.js"></script>
    <script src="vistas/dist/js/Persona.js"></script>
    <script src="vistas/dist/js/Asistencia.js"></script>
    <script src="vistas/dist/js/Administrativo.js"></script>
    <script src="vistas/dist/js/AsigPlazaVacante.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed" style="height: auto;">
    <!-- Site wrapper -->
    <?php 
if($_SESSION["ROL"]>0)
{ echo '<div class="wrapper">';
       
    if((time()-$_SESSION['Sesion_tiempo'])>1800){
        ControladorUsuario::ctrSesionTiempo();
        include "modulos/Salir.php";
    }
    else{
        $_SESSION['Sesion_tiempo']=time();          
        include "modulos/Cabecera.php";        
        $_SESSION["Pagina"]=$_GET["ruta"]; 
        include "modulos/Menu.php";            
    } 
        if(isset($_GET["ruta"])){
            if(
                $_GET["ruta"]=="Inicio" ||
                $_GET["ruta"]=="Salir"){
                include "modulos/".$_GET["ruta"].".php";
            }
            //Indivual
            else if(
                $_GET["ruta"]=="ActPassword" || 
                $_GET["ruta"]=="MiAsistencia" ||
                $_GET["ruta"]=="MiCapacitaciones" || 
                $_GET["ruta"]=="MiMesadePartes" ||
                $_GET["ruta"]=="MiPersona"){
                include "modulos/Individual/".$_GET["ruta"].".php";
            } //UnidadAcademica
            else if(($_SESSION["ROL"]=='1' || 
                $_SESSION["ROL"]=='2' ) && $_GET["ruta"]=="AsigPlazaVacante"){
                include "modulos/UnidadAcademica/".$_GET["ruta"].".php";
            }//SuperAdm
            else if($_SESSION["ROL"]=='1' && 
                ($_GET["ruta"]=="PersonaActividad" || 
                $_GET["ruta"]=="Persona" ||  
                $_GET["ruta"]=="PersonaEdit" ||  
                $_GET["ruta"]=="Administracion" || 
                $_GET["ruta"]=="Usuario") ){
                include "modulos/Adm/".$_GET["ruta"].".php";
            }
            //Administrativo
            else if(($_SESSION["ROL"]=='3' || 
                $_SESSION["ROL"]=='1' || 
                $_SESSION["ROL"]=='2' ) && 
                $_GET["ruta"]=="Asistencia"){
                include "modulos/Administracion/".$_GET["ruta"].".php";
            }
            else {
                include "modulos/404.php";
            }
        }else {                           
            include "modulos/Inicio.php";
        }    
        echo '</div>';
    }else{
        echo '<div class="login-page">';
        include "modulos/Login.php";
    echo '</div>';
    }
?>

    <script>
    (function($) {
        "use strict";
        $('.Scroll').overlayScrollbars({
            className: "os-theme-dark",
            scrollbars: {
                clickScrolling: true
            }
        })
    })(jQuery)
    </script>
</body>

</html>