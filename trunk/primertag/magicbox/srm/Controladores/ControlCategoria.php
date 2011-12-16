<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloCategoria.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$cat_nombre= $_POST["cat_nombre"];
		
		try
		{
			$filas=validarExistencia($cat_nombre);
			
			if($filas>0)
			{
				///mensaje log de que el usuario ya existe	
				$log->error("Esta agregando una categoria que ya existe"); 
				$mensaje= "La categoria ya existe, verifica cuidadosamente la informacion e intenta nuevamente";
			}
			else
			{
				salvarCategoria($cat_nombre);
				
				$mensaje= "La categoria se creo de forma exitosa";
				$log->info("Se creó una nueva categoria de forma exitosa"); 		
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una nueva categoria"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/categoria2.php";


?>