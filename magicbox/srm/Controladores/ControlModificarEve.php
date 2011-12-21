<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloEvento.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
		if(array_key_exists('evento',$_POST))
			$eve_id=$_POST['evento'];
		else
			$eve_id=0;

		$eventos=array();
				
		try
		{
			$filas=buscarEventosActivos();
			$eventos=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se carg� la lista de eventos en la plantilla de los participantes por evento"); 
			
			
			if($eve_id>0)
			{
			    $eve2=array();
				$datos_eve=buscarEventoPorId($eve_id);
				$eve2 = $datos_eve;
				
				foreach($eve2 as $evento)
				{
					$eve_nombre = $evento['eve_nombre'];
					$eve_fecha = $evento['eve_fecha'];
					
					
				}
				
				
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/modificar_ev.php";
	
	
	
	

?>