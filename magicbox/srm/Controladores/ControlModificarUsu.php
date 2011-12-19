<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloUsuario.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
		if(array_key_exists('usuario',$_POST))
			$admin_cedula=$_POST['usuario'];
		else
			$admin_cedula=0;

		$usuarios=array();
				
		try
		{
			$filas=buscaradministradores();
			$usuarios=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los participantes por evento"); 
			
			
			if($admin_cedula>0)
			{
			
				
				foreach($filas as $usuario)
				{
					$admin_nombre = $usuario['admin_nombre'];
					$admin_cedula = $usuario['admin_cedula'];
					$admin_apellido = $usuario ['admin_apellido'];
					$admin_login = $usuario ['admin_login'];
					$admin_status = $usuario ['admin_status']; 
					
					
				}
				
				
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los usuarios"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/modificar_us.php";
	
	
	
	

?>