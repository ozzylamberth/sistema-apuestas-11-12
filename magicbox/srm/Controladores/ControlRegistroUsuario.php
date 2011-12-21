<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloCategoria.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
			
		if(array_key_exists('categoria',$_POST))
			$cat_id=$_POST['categoria'];
		else
			$cat_id=0;

		$categorias=array();
				
		try
		{
			$filas=buscarCategoriasOrdenadas();
			$categorias=$filas;

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de categorias en la plantilla de Creacion de un Evento"); 
			
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar las categorias"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eventos.php";
?>