<?php
require_once ("PHPUnit/Framework/TestCase.php");
//require_once("../../../www/Sistema_Apuestas/magicbox/srm/Controladores/ControlUsuario.php");
//include_once ("../../../www/Sistema_Apuestas/magicbox/srm/DataConexion/conexion.php");


class CasaATest extends PHPUnit_Framework_TestCase
{
	public function testCasaA()
	{
  
         $casapu_id =15;
		$casapu_nombre='Laapuesta';
		

// Assert that the size of the Array fixture is 0.
$this->assertNotNull($casapu_id);
$this->assertNotNull($casapu_nombre);


}
}
?>