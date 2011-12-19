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
			$filas=buscarEventosProximos();
			$eventos=$filas;
		

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los proximos eventos"); 
			
			 if($eve_id>0)
			{
				$datos_eve=buscarEventoPorId($eve_id);
				foreach($filas as $eve)
				{
					$eve_nombre = $eve['nombre'];
					$eve_nro_gan = $eve['ganadores'];
					$eve_fecha = $eve['fecha'];
					$eve_tipo_pago = $eve['pago'];
				}
				
			}
		 }
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/proximos_eventos.php";
	
	
	
	

?>