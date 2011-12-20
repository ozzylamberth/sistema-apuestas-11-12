<?php 


require '../../../php/Logger.php';
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
			$filas=buscarEventosActivos();
			$eventos=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los participantes por evento"); 
			
			if($eve_id>0)
			{
				$participantes_eve=array();
				$datos_eve=buscarEventoPorId($eve_id);
				$part_eve=buscarParticipantesEvento($eve_id);
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
					$eve_tipo_pago = $eve['eve_tipo_pago'];
				}
				
				foreach($part_eve as $clave=>$valor)
				{
					$parts_eve['par_nombre']=$valor['par_nombre'];
					if ($valor['pe_top_apuesta']==0) 
						$parts_eve['pe_top_apuesta']="Sin tope apuesta";  
					  
					if ($valor['pe_tipo_pago']==0) 
						$parts_eve['pe_tipo_pago']="Sin tipo pago especial";  
						
					$participantes_eve[]=$parts_eve;
				}
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/participantes_evento.php";
	
	
	
	

?>