<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloEvento.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$eve_id =  $_POST['eve_id'];
		
		try
		{
			eliminarEvento($eve_id);
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar eliminar el evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_ev2.php";


?>