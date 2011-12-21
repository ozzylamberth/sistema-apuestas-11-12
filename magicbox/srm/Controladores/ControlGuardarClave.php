<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
	
        $cedula=$_POST["cedula"];
		$contrasena1=$_POST["contrasena1"];
		
		try
		{
			
		$act= ActualizacionClave ($cedula,$contrasena1);
		
		    
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error al validar la existencia del administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	//	require "../Formularios/mostrarPreguntaSecreta.php";


?>