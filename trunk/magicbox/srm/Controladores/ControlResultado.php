<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloResultado.php");
		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
	
        $nro_ganadores= $_POST["eve_nro_gan"];
        $eve_id= $_POST["eve_id"];
        $res_resultado=$_POST["descripcion_eve"];
		
		try
		{
			insertarResultado($res_resultado,$eve_id,$nro_ganadores);
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar insertar un resultado en la base de datos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		require "../Formularios/Generar_Resultados2.php";
?>