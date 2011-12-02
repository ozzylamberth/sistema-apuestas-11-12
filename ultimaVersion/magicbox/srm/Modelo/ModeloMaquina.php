<?php 

include_once ("../DataConexion/conexion.php");
   // esta funcion guardara la maquina y la casa de apuesta
	function salvarMaquina($latitud,$longitud,$casapu_nombre,$Maq_Des)
	{
		
		$Select_CA= sql("select casapu_id FROM casa_apuesta WHERE casapu_nombre LIKE '$casapu_nombre'");
		$row1=oci_fetch_array($Select_CA,OCI_BOTH);
		$casapu_id= $row1['CASAPU_ID'];
		
	
		
		$insertar_Cat= sql("insert into maquina_apuesta values (AUTO_INC_categoria.NEXTVAL,'Activo',$casapu_id,$longitud,$latitud,'$Maq_Des')");
		
	}


?>