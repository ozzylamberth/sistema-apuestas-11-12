<?php 


require '../../../php/Logger.php';
include_once ("../Modelo/ModeloEvento.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
				
		try
		{
			 $filas= mostraEventos();
			 $eventos= $filas;
			 $lista_eve=array();
			 
			 foreach($filas as $clave=>$valor)
				{
					$filas['eve_nombre']=$valor['eve_nombre'];
				    $filas['eve_status']=$valor['eve_status'];
					$filas['eve_fecha']=$valor['eve_fecha'];	
					$filas['eve_nro_part']=$valor['eve_nro_part'];	
					$filas['eve_nro_gan']=$valor['eve_nro_gan'];	
					$filas['eve_tipo_pago']=$valor['eve_tipo_pago'];	
					$lista_eve[]=$filas;
				}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		//require "../Formularios/listareventos.php";
	
	
	
	

?>