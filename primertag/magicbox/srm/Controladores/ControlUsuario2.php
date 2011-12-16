<?php 

require '../../../php/Logger.php';
include_once ("../DataConexion/guardarXmlAdmin.php");
include_once ("../Modelo/ModeloUsuario.php");
//include_once ("../Formularios/RegistroUsuario2_1.php");


		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		//muestra los datos consultados de acuerdo a la opción
		$admin_cedula = $_POST['admin_cedula'];
	    $admin_login = $_POST['admin_login'];
	    $admin_contrasena = $_POST['admin_contrasena'];
	    $admin_nombre = $_POST['admin_nombre'];
	    $admin_apellido = $_POST['admin_apellido'];
	    $admin_status = $_POST['admin_status'];
		
		
		try
		{
			modificarUsuario($admin_login,$admin_status,$admin_contrasena,$admin_nombre,$admin_apellido,$admin_cedula); 
			$log->info("Se ha hecho una modificacion a un administrador");
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar modificar un usuario"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/modificar_us2.php";


?>