<?php 

include_once ("../DataConexion/conexion.php");


    // se validará la existencia del registro
	
	
	function validarExistencia($casapu_nombre)
	{
		
	     $validar_Existencia=sql("select * from casa_apuesta where casapu_nombre LIKE '$casapu_nombre'");
         $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		  $filas=oci_num_rows($validar_Existencia);
		 
		 return $filas;
	}
	
	// se inserta el registro
	
	function salvarCasa($casapu_nombre)
	{
		$insertar_Cat= sql("insert into casa_apuesta values (AUTO_INC_casa_apuesta.NEXTVAL,'$casapu_nombre')");
      	
	}
	// se elimina el registro

    function eliminarCasa($casapu_id)
	{
		$eliminar_Cat = sql ("DELETE FROM casa_apuesta WHERE casapu_id= ".$casapu_id);
		}


	// se modifica la casa de apuestas
	function modificarCasa($casapu_id,$casapu_nombre)
	{
		$actualiza_Casa = sql("UPDATE CASA_APUESTA SET CASAPU_NOMBRE='$casapu_nombre' WHERE CASAPU_ID= ".$casapu_id);
	}


?>