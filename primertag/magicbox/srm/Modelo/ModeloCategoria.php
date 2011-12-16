<?php 

include_once ("../DataConexion/conexion.php");


  // se validará la existencia del registro
	
	function validarExistencia($cat_nombre)
	{
		
	     $validar_Existe=sql("SELECT cat_id FROM categoria where cat_nombre LIKE '$cat_nombre'");
        $fila=oci_fetch_array($validar_Existe,OCI_BOTH);
        $filas=oci_num_rows($validar_Existe);
		
		
		 return $filas;
	}
	// se guarda el registro
	
	function salvarCategoria($cat_nombre)
	{
		$insertar_Cat= sql("insert into categoria values (AUTO_INC_categoria.NEXTVAL,'$cat_nombre')");
		
	}

     // se modifica 
     function modificarCategoria($cat_id,$cat_nombre)
	 {
     $actualiza_Cat = sql("UPDATE categoria SET cat_nombre='$cat_nombre' WHERE cat_id= ".$cat_id);
	 }


     //se elimina
	function eliminarCategoria($cat_id)
	{
		$eliminar_Cat = sql ("DELETE FROM categoria WHERE cat_id= ".$cat_id);
	
	}
?>