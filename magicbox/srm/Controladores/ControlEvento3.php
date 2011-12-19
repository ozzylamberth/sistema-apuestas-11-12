<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloEvento.php");
include_once("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlEvento.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
	
		$eve_id = $_POST['eve_id'];
		$eve_nombre = $_POST['eve_nombre'];
		$fecha_Evento=$_POST['fecha_Evento'];
		$eve_nro_part= $_POST['eve_nro_part'];
		$eve_nro_gan= $_POST['eve_nro_gan'];

		
		try
		{
			 actualizarEvento ($eve_id,$eve_nombre,$fecha_Evento,$eve_nro_part,$eve_nro_gan);
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar modificar el evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/modificar_ev2.php";


?>