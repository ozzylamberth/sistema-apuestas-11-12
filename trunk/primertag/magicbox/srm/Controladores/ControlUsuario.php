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
		$admin_cedula =$_POST['admin_cedula'];
		$admin_apellido=$_POST['admin_apellido'];
		$admin_nombre=$_POST['admin_nombre'];
		$admin_login= $_POST['admin_login'];
		$admin_contrasena= $_POST['admin_contrasena'];
		$pre_des= $_POST['pre_desc'];
		$admin_resp_secreta= $_POST['admin_resp_secreta'];
		
		try
		{
			$filas=validarExistencia($admin_cedula);
			
			if($filas>0)
			{
				///mensaje log de que el usuario ya existe	
				$log->error("Esta agregando un administrador que ya existe"); 
				$mensaje= "El administrador ya existe, verifica cuidadosamente la informacion e intenta nuevamente";
			}
			else
			{
				$pre_id=buscarIdPreguntaSecreta($pre_des); 
				salvarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena,$pre_des,$admin_resp_secreta,$pre_id);
				guardarXml();
				$mensaje= "El administrador se creo de forma exitosa";
				$log->info("Se creó un nuevo usuario de forma exitosa"); 		
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo usuario"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/RegistroUsuario2_1.php";


?>