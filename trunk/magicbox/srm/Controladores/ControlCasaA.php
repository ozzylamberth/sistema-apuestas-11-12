<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloCasaA.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$casapu_nombre= $_POST["casapu_nombre"];
		
		try
		{
			$filas=validarExistencia($casapu_nombre);
			
			if($filas>0)
			{
				///mensaje log de que el usuario ya existe	
				$log->error("Esta agregando una casa de apuesta que ya existe"); 
				$mensaje= "La casa de apuesta ya existe, verifica cuidadosamente la informacion e intenta nuevamente";
			}
			else
			{
				salvarCasa($casapu_nombre);
				
				$mensaje= "La casa de apuesta se creo de forma exitosa";
				$log->info("Se creó una nueva casa de apuesta de forma exitosa"); 		
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una nueva casa de apuesta"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/casa_apuesta2.php";


?>