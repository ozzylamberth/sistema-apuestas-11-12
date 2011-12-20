<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
	
        $admin_cedula=$_POST["cedula"];
		
		try
		{
			
		$filas= validarExistenciaPregSec($admin_cedula);
		
		if ($filas>0)
		{
				
			$datosPregSecreta= SeleccionarPregSecreta($cedula);
			foreach($datosPregSecreta as $admin)
				{
					$admin_fk_id_pre = $admin['admin_fk_id_pre'];
					$admin_resp_secreta = $admin['admin_resp_secreta'];
				}
				
		   $pre_des=EnunciadoPreg($admin_fk_id_pre);
		    
		//break;
		//exit();
				
				
		}
		
		
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error al validar la existencia del administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	//	require "../Formularios/mostrarPreguntaSecreta.php";


?>