<?php 


require '../../../php/Logger.php';
include_once ("../DataConexion/guardarXmlEvento.php");
include_once ("../Modelo/ModeloEvento.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
		if(array_key_exists('eve',$_POST))
			$eve_id=$_POST['eve'];
		else
			$eve_id=0;

		$eventos=array();
				
		try
		{
			$filas=buscarEventosInactivos();
			$eventos=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los ganadores de un evento "); 
			
			if($eve_id>0)
			{
				 
                
	  			$ganadores_eve=array();
				$datos_eve=buscarEventoPorId($eve_id);
				$part_eve=buscarganadoresEvento($eve_id);
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
					
				}
				
				foreach($part_eve as $clave=>$valor)
				{
					$parts_eve['par_nombre']=$valor['par_nombre'];
					
						
					$ganadores_eve[]=$parts_eve;
				}
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/listar_ganadores.php";
	
	
	
	

?>