<?php 


require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
				
		try
		{
			 $filas= buscarAdministradores();
			 $eventos= $filas;
			 $lista_usu=array();
			 
			 foreach($filas as $clave=>$valor)
				{
					$filas['admin_nombre']=$valor['admin_nombre'];
				    $filas['admin_cedula']=$valor['admin_cedula'];
					$filas['admin_apellido']=$valor['admin_apellido'];	
					$filas['admin_status']=$valor['admin_status'];	
					$filas['admin_login']=$valor['admin_login'];		
					$lista_usu[]=$filas;
				}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		//require "../Formularios/ListarUsuariosP.php";
	
	
	
	

?>