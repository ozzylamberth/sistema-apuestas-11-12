<?php 

require '../../../php/Logger.php';
include_once ("../Modelo/ModeloUsuario.php");



		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
	
        $admin_login= $_POST['usuario'];
        $admin_contrasena= $_POST['clave'];
		
		try
		{
			$filas= validarExistencia2($admin_login,$admin_contrasena);
			if ($filas>0){	
											
					$_SESSION["usuario"]= "$usuario";
					$_SESSION["clave"]= "$clave";
					header("location:aplicacion.php");
					}
					else								
					{
					$log->error("Usuario No Existe"); 
					
					// aqui viene la impresion
			
			
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error al validar si existia el administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/iniciando.php";


?>