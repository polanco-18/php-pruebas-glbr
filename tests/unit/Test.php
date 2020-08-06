<?php 
use PHPUnit\Framework\TestCase;
require './tests/Usuario.php';
require './tests/Asistencia.php';
class Test extends TestCase{    
    /** @test @covers */
    public function actualizarContraseña()
    {
        $c_actual='74085764';
        $n_password='74085764';
        $n_password2='74085764';
        $usuario='74085764';
        $Usuario = new Usuario();
        $this->assertEquals($Usuario->ctrActualizarContraseña($c_actual,$n_password,$n_password2,$usuario),'Actualizado','se espera actualizado');
    }   
    /** @test @covers */
    public function CrearUsuario()
    {
        $c_actual='74085764'; 
        $usuario='74085764';
        $Usuario = new Usuario();
        $this->assertEquals($Usuario->ctrCrearUsuario($usuario,$c_actual),'Creado','se espera Creado');
    }
    /** @test @covers */
    public function EditarUsuario()
    {
        $c_actual='74085764'; 
        $usuario='74085764';
        $Usuario = new Usuario();
        $this->assertEquals($Usuario->ctrEditarUsuario($c_actual,$usuario),'Actualizado','se espera Actualizado');
    }
    /** @test @covers */
    public function ValidarAsistencia()
    {
        $usuario='74085764';
        $obj = new Asistencia();
        $this->assertEquals($obj->ctrValidar($usuario),'salida','No existe registro');
    }
     
}