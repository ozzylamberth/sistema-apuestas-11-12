<?php 


require '../../../php/Logger.php';
include_once ("../DataConexion/guardarXmlEvento.php");
include_once ("../Modelo/ModeloCategoria.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
	

		$categorias=array();
				
		try
		{
			$filas=buscarCategoriasOrdenadas();
			$categorias=$filas;	
			$log->info("Se cargo la pagina de listar categorias"); 
			
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar las categorias"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/listarcat.php";
	
	
	
	

?>