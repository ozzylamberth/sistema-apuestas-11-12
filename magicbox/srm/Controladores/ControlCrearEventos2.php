<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloEvento.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		 
		 $cat_id=$_POST['categoria'];
		 
		 $desc_Evento= $_POST["desc_Evento"];
		 $fecha_Evento= $_POST["fecha_Evento"];
		 $fecha= $_POST['Fecha']; 
		 if(isset($_POST['tipo_Ganador'])) $tipo_Ganador= $_POST['tipo_Ganador'];
		 
		 
		 $nro_Participantes= $_POST["nro_Participantes"];			
			$participantes=array();
		
		if(array_key_exists('par_nombre',$_POST))
			$par_nombre=$_POST['par_nombre'];
		   else
			$par_nombre=0;

		$participantes=array();
		
		
		try
		{
			// Cargar el combo de los participantes de un evento dependiendo del formulario que se despliegue en la pag de eventos
			if ($tipo_Ganador==='un_Ganador')
			{
						
						$filas= participantes();
						$participantes= $filas;
			
			foreach($filas as $par_nombre)
				{
						$par_nombre = $par_nombre['par_nombre'];
					
				}
				
			}
			// Cargar el combo de los participantes de un evento dependiendo del formulario que se despliegue en la pag de eventos
			if ($tipo_Ganador==='tabla_Resultados')
			{
						$filas= participantes();
						$participantes= $filas;
		
			foreach($filas as $par_nombre)
				{
						$par_nombre = $par_nombre['par_nombre'];
					
				}
				
			}
				

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de participantes en la Creacion de un Evento"); 
			
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los participantes de un evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eventos2.php";
?>