<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		  $admin_cedula =  $_POST['ADMIN_CEDULA'];
 
		
		
		try
		{
			eliminarUsuario($admin_cedula);
			$log->info("Se ha eliminado a un administrador");
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar eliminar un administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_us2.php";


?>