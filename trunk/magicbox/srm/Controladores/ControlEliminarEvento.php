<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloEvento.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


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
			$filas=buscarEventos();
			$eventos=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los participantes por evento"); 
			
			
			if($eve_id>0)
			{
				/*$admin2=array();
				$datos_admin=buscarAdministradoresPorId($admin_cedula);
				$admin2 = $datos_admin;*/
				
				foreach($filas as $evento)
				{
					$eve_nombre = $evento['eve_nombre'];
					$eve_fecha = $evento['eve_fecha'];
					$eve_nro_part = $evento['eve_nro_part'];
					$eve_nro_gan = $evento['eve_nro_gan'];
					$eve_tipo_pago = $evento['eve_tipo_pago'];
					$eve_status = $evento['eve_status'];
				}
				
				
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los administradores"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_ev.php";
	
	
	
	

?>