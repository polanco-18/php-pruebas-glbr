 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary">
     <!-- Brand Logo -->
     <a class="brand-link" style="background-color:#20609d">
         <img src="vistas/img/plantilla/logo.png" alt="Logo" class="brand-image float-left">
         <span class="brand-text text-light"><b>Gilda Ballivian</b></span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="Inicio" class="nav-link <?php echo $_SESSION['Pagina'] =='Inicio' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Inicio
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="MiPersona"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='MiPersona' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-user"></i>
                         <p>
                             Datos Personales
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="MiAsistencia"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='MiAsistencia' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-user-clock"></i>
                         <p>
                             Mis Asistencias
                         </p>
                     </a>
                 </li>
                 <li class="nav-header"><i class="fas fa-puzzle-piece"></i> &nbsp;Servicios</li>
                 <li class="nav-item">
                     <a href="MiMesadePartes"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='MiMesadePartes' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-print"></i>
                         <p>
                             Mesa de partes
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="MiCapacitaciones"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='MiCapacitaciones' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-headset"></i>
                         <p>
                             Capacitaciones
                         </p>
                     </a>
                 </li>
                 <?php if($_SESSION["ROL"]=='1'){?>
                 <li class="nav-header"><i class="fas fa-th"></i> &nbsp;Administrativo</li>
                 <li
                     class="nav-item has-treeview <?php echo $_SESSION['Pagina'] =='Persona'|| $_SESSION['Pagina'] =='PersonaEdit' || $_SESSION['Pagina'] =='Administracion' || $_SESSION['Pagina'] =='PersonaActividad' || $_SESSION['Pagina'] =='Usuario' ? 'menu-open" ' : ''; ?>">
                     <a href="#"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='Persona' || $_SESSION['Pagina'] =='PersonaActividad' || $_SESSION['Pagina'] =='PersonaEdit'||$_SESSION['Pagina'] =='Administracion' || $_SESSION['Pagina'] =='Usuario'  ? 'active" ' : ''; ?>">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Adm
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="Usuario"
                                 class="nav-link <?php echo $_SESSION['Pagina'] =='Usuario' ? 'active' : ''; ?>">
                                 <i class="nav-icon fas fa-users-cog"></i>
                                 <p>
                                     Usuarios
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="Persona"
                                 class="nav-link <?php echo $_SESSION['Pagina'] =='Persona' || $_SESSION['Pagina'] =='PersonaEdit' ? 'active' : ''; ?>">
                                 <i class="nav-icon fas fa-users"></i>
                                 <p>
                                     Personal
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="Administracion"
                                 class="nav-link <?php echo $_SESSION['Pagina'] =='Administracion' ? 'active' : ''; ?>">
                                 <i class="nav-icon fas fa-users"></i>
                                 <p>
                                     Administracion
                                 </p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <?php }?>
                 <?php if($_SESSION["ROL"]=='1' || $_SESSION["ROL"]=='2'){?>
                 <li class="nav-header"><i class="fas fa-th"></i> &nbsp;Unidad Academica</li>
                 <li class="nav-item">
                     <a href="AsigPlazaVacante" class="nav-link <?php echo $_SESSION['Pagina'] =='AsigPlazaVacante' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-chalkboard-teacher"></i>
                         <p>
                             Plaza vacante
                         </p>
                     </a>
                 </li>
                 <?php }?>

                 <?php if($_SESSION["ROL"]=='1' || $_SESSION["ROL"]=='3'){?>
                 <li class="nav-header"><i class="fas fa-hands-helping"></i>&nbsp; Recursos Humanos</li>
                 <li class="nav-item">
                     <a href="Asistencia"
                         class="nav-link <?php echo $_SESSION['Pagina'] =='Asistencia' ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-calendar-check"></i>
                         <p>
                             Asistencia
                         </p>
                     </a>
                 </li>
                 <?php }?>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>