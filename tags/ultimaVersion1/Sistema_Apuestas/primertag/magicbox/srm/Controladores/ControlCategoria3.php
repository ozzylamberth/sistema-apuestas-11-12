<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloCategoria.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		 $cat_id =  $_POST['cat_id'];
		 
		try
		{
			 eliminarCategoria($cat_id);
			 $log->info(" SE ha eliminado una categoria"); 		
				$mensaje= "Se ha eliminado exitosamente una categoria";
			 
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar eliminar una nueva categoria"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_ca2.php";


?>