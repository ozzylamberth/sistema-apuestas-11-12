<?php 

require '../../../php/Logger.php';

include_once ("../Modelo/ModeloMaquina.php"); 

//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		
		$coordenadas =$_POST['ejemplo'];
		$casapu_nombre =$_POST['casapu_nombre'];
		$maq_des =$_POST['Maq_Des'];

		
		try
		{
			
			$cont=strlen($coordenadas)-2;
			$coord=substr($coordenadas,1,$cont);
			list($latitud,$longitud)=explode(',',$coord);
			
			
				salvarMaquina($latitud,$longitud,$casapu_nombre,$maq_des);
				
				$mensaje= "La Maquina se creo de forma exitosa";
				$log->info("Se creó una nueva maquina de forma exitosa"); 		
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una nueva maquina"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
			
		
	
		require "../Formularios/mapa2.php";
		


?>