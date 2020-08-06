<?php 
require_once "controladores/plantilla.controlador.php";
require_once "controladores/Usuario.controlador.php";
require_once "controladores/Asistencia.controlador.php";
require_once "controladores/Persona.controlador.php";
require_once "controladores/PlazaVacante.controlador.php";   
require_once "controladores/CategoriaAsis.controlador.php"; 
require_once "controladores/AsigPlazaVacante.controlador.php";      
require_once "controladores/Administracion.controlador.php";  
require_once "controladores/Login.controlador.php";          
    
require_once "modelos/Administracion.modelo.php";       
require_once "modelos/AsigPlazaVacante.modelo.php";    
require_once "modelos/CategoriaAsis.modelo.php"; 
require_once "modelos/PlazaVacante.modelo.php";
require_once "modelos/Asistencia.modelo.php";
require_once "modelos/Usuario.modelo.php"; 
require_once "modelos/Persona.modelo.php";  

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();