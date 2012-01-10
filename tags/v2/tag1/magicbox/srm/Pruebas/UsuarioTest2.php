<?php
require_once ("PHPUnit/Framework/TestCase.php");
//require_once("../../../www/Sistema_Apuestas/magicbox/srm/Controladores/ControlUsuario.php");
//include_once ("../../../www/Sistema_Apuestas/magicbox/srm/DataConexion/conexion.php");

  function sql($query)
  {
    $db_conn = ocilogon("CASAAPUESTA", "IRENE", "//127.0.0.1/XE");
	$parsed = ociparse($db_conn, $query);
    ociexecute($parsed);
	ocilogoff($db_conn);
    return $parsed;
  }

class UsuarioTest2 extends PHPUnit_Framework_TestCase
{
	public function testValidarExiUsuario()
	{   $admin_cedula=18278116;
		
		$validar_Existencia=sql("select * from administrador where admin_cedula =".$admin_cedula);
         $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		 $filas=oci_num_rows($validar_Existencia);
		 
	
		

// Assert that the size of the Array fixture is 0.
$this->assertNotNull($filas);

}
}
?>