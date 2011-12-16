<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloCasaA.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$casapu_id =  $_POST['casapu_id'];
		
		try
		{
			
			
			
				eliminarCasa($casapu_id);
				
				$mensaje= "La casa de apuesta se elimino de forma exitosa";
				$log->info("Se elimino una casa de apuesta de forma exitosa"); 		
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar eliminar una nueva casa de apuesta"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_cda2.php";


?>