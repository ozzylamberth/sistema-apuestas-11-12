<?php
//Prueba de los valores recibidos por el formulario de creacion de usuario
require_once ("PHPUnit/Framework/TestCase.php");
//require_once("../../../www/Sistema_Apuestas/magicbox/srm/Controladores/ControlUsuario.php");
//include_once ("../../../www/Sistema_Apuestas/magicbox/srm/DataConexion/conexion.php");


class UsuarioTest extends PHPUnit_Framework_TestCase
{
	public function testInsertUsuario()
	{
  
        $admin_cedula =17278116;
        $admin_apellido='Soto';
		$admin_nombre='Irene';
		$admin_login= 'Ire';
		$admin_contrasena= '12345';
		$pre_des= 'Nombre de su padre';
		$admin_resp_secreta= 'Jose';
		$pre_id=11; //Si se tiene la descripcion de la pregunta se debe poder obtener el id mediante la consualta sql
		$filas= 8; //Es el resultado que devuelve el query de validar la existencia
		$admin_cedula2 =18491656;
		

// Assert that the size of the Array fixture is 0.
$this->assertNotNull($admin_cedula);
$this->assertNotNull($admin_apellido);
$this->assertNotNull($admin_nombre);
$this->assertNotNull($admin_login);
$this->assertNotNull($admin_contrasena);
$this->assertNotNull($pre_des);
$this->assertNotNull($admin_resp_secreta);
$this->assertNotNull($pre_id);
$this->assertNotNull($filas);
$this->assertNotEquals($admin_cedula2,$admin_cedula); 

	}
}
?>