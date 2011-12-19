<?php 

include_once ("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlAdmin.php");

// se busca el id de la pregunta secreta para posteriormente insertarla en el administrador
	function buscarIdPreguntaSecreta($pre_des)
	{
         $selec_Preid= sql("select pre_id from pregunta_secreta where pre_des LIKE '$pre_des'");
    	 $filas=oci_fetch_array($selec_Preid,OCI_BOTH);
	    $pre_id= $filas['PRE_ID'];
		
		return $pre_id;
	}
	
	// se valida la existencia del administrador
	function validarExistencia($admin_cedula)
	{
		
	     $validar_Existencia=sql("select * from administrador where admin_cedula = $admin_cedula");
         $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		 $filas=oci_num_rows($validar_Existencia);
		 
		 return $filas;
	}
	
	// se guarda el usuario
	function salvarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena,$pre_des,$admin_resp_secreta,$pre_id)
	{
		$insertar_Cat= sql("insert into administrador (admin_cedula, admin_login,admin_contrasena, admin_resp_secreta, admin_nombre,admin_apellido,admin_status,admin_fk_id_pre) values ('$admin_cedula','$admin_login','$admin_contrasena','$admin_resp_secreta','$admin_nombre','$admin_apellido','Activo','$pre_id')");
		
		guardarXml();
      	
	}
       
	   // se modifica el usuario
	function modificarUsuario($admin_login,$admin_status,$admin_contrasena,$admin_nombre,$admin_apellido,$admin_cedula)
	{
		
  	   $query = sql("UPDATE administrador SET admin_login='$admin_login', admin_status='$admin_status',    admin_contrasena='$admin_contrasena',admin_nombre= '$admin_nombre', admin_apellido='$admin_apellido' WHERE  admin_cedula=".$admin_cedula);
   	   guardarXml();
 
	}

    // se elimina el usuario
	function eliminarUsuario($admin_cedula)
	{
		$eliminar_Adm = sql("DELETE FROM ADMINISTRADOR WHERE ADMIN_CEDULA= ".$admin_cedula);
	guardarXml();
	
	}

	function claveAdmin ($contrasena1,$admin_cedula)
	{
		$act_Adm = sql("update administrador set admin_contrasena='$contrasena1' where admin_cedula='$admin_cedula'"); 
	}

// esta función valida la existencia con clave y login, para ingresar al sistema se deben cumplir las dos condiciones

    	function validarExistencia2($admin_login,$admin_contrasena);
	{
		 $validar_Existencia=sql("SELECT * FROM administrador where admin_login='$usuario' and admin_contrasena='$clave'");
		 $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
         $filas=oci_num_rows($validar_Existencia);
		 
		 return $filas;
	}
	

// funcion que se llama desde mostrar clave 

        function ValidarExistencia3($cedula,$respuestaSecreta)
		{
		  $validar_Existencia=sql("select * from administrador where admin_cedula = '$cedula' and admin_resp_secreta LIKE '$respuestaSecreta'");
          $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		  $filas=oci_num_rows($validar_Existencia);
		  return $filas;
			
		}
		







?>