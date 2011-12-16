<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloCategoria.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$cat_id = $_POST['cat_id'];
        $cat_nombre = $_POST['cat_nombre'];
		
		try
		{
			 modificarCategoria($cat_id,$cat_nombre);
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar modificar una nueva categoria"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/modificar_ca2.php";


?>