<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloUsuario.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
		if(array_key_exists('admin',$_POST))
			$admin_cedula=$_POST['admin'];
		else
			$admin_cedula=0;

		$administradores=array();
				
		try
		{
			$filas=buscarAdministradores();
			$administradores=$filas;

	
			//print_r($filas);
			//die();

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de eventos en la plantilla de los participantes por evento"); 
			
			
			if($admin_cedula>0)
			{
				/*$admin2=array();
				$datos_admin=buscarAdministradoresPorId($admin_cedula);
				$admin2 = $datos_admin;*/
				
				foreach($filas as $admin)
				{
					$admin_nombre = $admin['admin_nombre'];
					$admin_apellido = $admin['admin_apellido'];
					$admin_login = $admin['admin_login'];
					$admin_status = $admin['admin_status'];
				}
				
				
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los administradores"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eliminar_us.php";
	
	
	
	

?>