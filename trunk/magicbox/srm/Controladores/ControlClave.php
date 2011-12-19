<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
	
        $admin_cedula=$_POST["cedula"];
        $contrasena1=$_POST["contrasena1"];
		
		try
		{
			claveAdmin ($contrasena1,$admin_cedula);
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error al cambiar la clave del administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/Guardarclave.php";


?>