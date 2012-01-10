<?php
require_once ("PHPUnit/Framework/TestCase.php");
//require_once("../../../www/Sistema_Apuestas/magicbox/srm/Controladores/ControlUsuario.php");
//include_once ("../../../www/Sistema_Apuestas/magicbox/srm/DataConexion/conexion.php");


class CategoriaTest extends PHPUnit_Framework_TestCase
{
	public function testCategoria()
	{
  
         $cat_id =14;
		$cat_nombre='Futbol';
		

// Assert that the size of the Array fixture is 0.
$this->assertNotNull($cat_id);
$this->assertNotNull($cat_nombre);


}
}
?>