<?php
class UsuariosController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function crearUsuario()
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
	
		$preguntas=array();
		$data=array();
		$mensaje=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			//Le pedimos al modelo todos los items
			$preguntas = $modeloUsuarios->listarPreguntaSecreta();
			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Ingresando a la pagina de creacion de un nuevo administrador del sistema"); 
			$data['preguntas']=$preguntas;
			$data['mensaje']=$mensaje;
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar la pagina de creacion de usuarios"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		$this->view->show("crear_usuario.php", $data);
	}
	
	public function ingresarUsuario() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
	
		$data=array();
		$mensaje=array();
		
		$admin_cedula =$_POST['admin_cedula'];
		$admin_apellido=$_POST['admin_apellido'];
		$admin_nombre=$_POST['admin_nombre'];
		$admin_login= $_POST['admin_login'];
		$admin_contrasena= $_POST['admin_contrasena'];
        $pre_id=$_POST['pregunta'];
		$admin_resp_secreta= $_POST['admin_resp_secreta'];

		try
		{
			if($admin_cedula!='' && $admin_apellido!='' && $admin_nombre!='' && $admin_login!='' && $admin_contrasena!='' && $admin_resp_secreta!='' && $pre_id!=0)
			{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				
				$filas=$modeloUsuarios->validarExistenciaCedula($admin_cedula);
				
				if(count($filas)>0)
				{
					///mensaje log de que el usuario ya existe	
					$log->error("Esta intentando agregar un administrador que ya existe"); 
					$mensaje= "El administrador ya existe, verifica cuidadosamente la informacion e intenta nuevamente";
				}
				else
				{
					//$pre_id=buscarIdPreguntaSecreta($pre_des); 
					$retorno = $modeloUsuarios->ingresarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena,$admin_resp_secreta,$pre_id);
					//guardarXml();
					$mensaje= "El administrador se creo de forma exitosa";
					$log->info("Se creó un nuevo usuario de forma exitosa"); 		
				}
				
				$this->view->show("mensaje.php", $data);
			}
			else
			{
				$preguntas = $modeloUsuarios->listarPreguntaSecreta();
				$data['preguntas']=$preguntas;
				
				
				if(trim($admin_cedula)=='')
					$mensaje['admin_cedula']='Debe ingresar la cedula del administrador';
				if(trim($admin_nombre)=='')
					$mensaje['admin_nombre']='Debe ingresar el nombre';
				if(trim($admin_apellido)=='')
					$mensaje['admin_apellido']='Debe ingresar el apellido';
				if(trim($admin_login)=='')
					$mensaje['admin_login']='Debe ingresar el login';
				if(trim($admin_contrasena)=='')
					$mensaje['admin_contrasena']='Debe ingresar la contraseña';
				if(trim($admin_resp_secreta)=='')
					$mensaje['admin_resp_secreta']='Debe ingresar la respuesta secreta';
				if(trim($pre_id)==0)
					$mensaje['pre_id']='Debe seleccionar una pregunta secreta';
					
				$data['mensaje']=$mensaje;
					
				$this->view->show("crear_usuario.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
	}
	
	
	public function desactivarUsuario() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
		
		if(array_key_exists('administrador',$_POST))
			$admin_cedula=$_POST['administrador'];
		else
			$admin_cedula=0;
	
		$data=array();

		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar un administrador"); 	
			
			$administradores=$modeloUsuarios->listarUsuariosActivos();
			
			$data['administradores']=$administradores;
			$data['admin_cedula']=$admin_cedula;
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		$this->view->show("desactivar_usuario.php", $data);
	}
	
	
	public function desactivarUsuario_2() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
		
		if(array_key_exists('administrador',$_POST))
			$admin_cedula=$_POST['administrador'];
		else
			$admin_cedula=0;
	
		$data=array();

		if($_POST['accion']=='buscar')
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar un administrador"); 	
			
			$administradores=$modeloUsuarios->listarUsuariosActivos();
			
			$data['administradores']=$administradores;

			$datos_admin=$modeloUsuarios->buscarUsuarioCedula($admin_cedula);
			$log->info("Se cargaron los datos del administrador seleccionado en la plantilla de desactivar usuarios"); 
				
			foreach($datos_admin as $admin)
			{
				$admin_nombre = $admin['admin_nombre'];
				$admin_apellido = $admin['admin_apellido'];
				$admin_login = $admin['admin_login'];
				$admin_status = $admin['admin_status'];
			}
				
			$data['admin_nombre'] = $admin_nombre;
			$data['admin_apellido'] = $admin_apellido;
			$data['admin_login'] = $admin_login;
			$data['admin_status'] = $admin_status;
			$data['admin_cedula'] = $admin_cedula;

			//Finalmente presentamos nuestra plantilla
			$this->view->show("desactivar_usuario.php", $data);
		}
		else
		{
			$admin_cedula=$_POST['admin_cedula'];
		
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
				
			$retorno=$modeloUsuarios->desactivarUsuario($admin_cedula); 
			$log->info("Desactivando al usuario: ".$admin_cedula);	
				
			$data['module']='usuario';
			$data['action']='update';
			$data['retorno']='retorno';
				
			//Finalmente presentamos nuestra plantilla
			$this->view->show("mensaje.php", $data);
		}
	}
	
	public function modificarUsuario() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
		
		if(array_key_exists('administrador',$_POST))
			$admin_cedula=$_POST['administrador'];
		else
			$admin_cedula=0;
	
		$data=array();
		$mensaje=array();

		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar un administrador"); 	
			
			$administradores=$modeloUsuarios->listarUsuariosActivos();
			
			$data['administradores']=$administradores;
			$data['admin_cedula']=$admin_cedula;
			$data['mensaje']=$mensaje;
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		$this->view->show("modificar_usuario.php", $data);
	}
	
	public function modificarUsuario_2() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
		
		if(array_key_exists('administrador',$_POST))
			$admin_cedula=$_POST['administrador'];
		else
			$admin_cedula=0;
	
		$data=array();
		$mensaje=array();

		if($_POST['accion']=='buscar')
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar un administrador"); 	
			
			$administradores=$modeloUsuarios->listarUsuariosActivos();
			
			$data['administradores']=$administradores;

			$datos_admin=$modeloUsuarios->buscarUsuarioCedula($admin_cedula);
			$log->info("Se cargaron los datos del administrador seleccionado en la plantilla de desactivar usuarios"); 
				
			foreach($datos_admin as $admin)
			{
				$admin_nombre = $admin['admin_nombre'];
				$admin_apellido = $admin['admin_apellido'];
				$admin_login = $admin['admin_login'];
				$admin_status = $admin['admin_status'];
			}
				
			$data['admin_nombre'] = $admin_nombre;
			$data['admin_apellido'] = $admin_apellido;
			$data['admin_login'] = $admin_login;
			$data['admin_status'] = $admin_status;
			$data['admin_cedula'] = $admin_cedula;
			
			$data['mensaje'] = $mensaje;

			//Finalmente presentamos nuestra plantilla
			$this->view->show("modificar_usuario.php", $data);
		}
		else
		{
			$admin_cedula=$_POST['admin_cedula'];
			$admin_apellido=$_POST['admin_apellido'];
			$admin_nombre=$_POST['admin_nombre'];
			$admin_login= $_POST['admin_login'];
			$admin_contrasena= $_POST['admin_contrasena'];
		
			if($admin_apellido!='' && $admin_nombre!='' && $admin_login!='' && $admin_contrasena!='')
			{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
					
				$retorno=$modeloUsuarios->modificarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena); 
				$log->info("Modificando datos del usuario: ".$admin_cedula." en la plantilla de modificacion de usuarios");	
					
				$data['module']='usuario';
				$data['action']='update';
				$data['retorno']='retorno';
					
				//Finalmente presentamos nuestra plantilla
				$this->view->show("mensaje.php", $data);
			}
			else
			{
				$administradores=$modeloUsuarios->listarUsuariosActivos();
			
				$data['administradores']=$administradores;
				$data['admin_cedula']=$admin_cedula;
				
								
				$admin_apellido=$_POST['admin_apellido'];
				$admin_nombre=$_POST['admin_nombre'];
				$admin_login= $_POST['admin_login'];
				$admin_contrasena= $_POST['admin_contrasena'];

				
				if(trim($admin_nombre)=='')
					$mensaje['admin_nombre']='Debe ingresar el nombre';
				if(trim($admin_apellido)=='')
					$mensaje['admin_apellido']='Debe ingresar el apellido';
				if(trim($admin_login)=='')
					$mensaje['admin_login']='Debe ingresar el login';
				if(trim($admin_contrasena)=='')
					$mensaje['admin_contrasena']='Debe ingresar la clave';
					
				$data['mensaje']=$mensaje;
				
				print_r($mensaje);
				
								$datos_admin=$modeloUsuarios->buscarUsuarioCedula($admin_cedula);
				
				foreach($datos_admin as $admin)
				{
					$admin_nombre = $admin['admin_nombre'];
					$admin_apellido = $admin['admin_apellido'];
					$admin_login = $admin['admin_login'];
					$admin_status = $admin['admin_status'];
				}
								
				$data['admin_nombre'] = $admin_nombre;
				$data['admin_apellido'] = $admin_apellido;
				$data['admin_login'] = $admin_login;
				$data['admin_status'] = $admin_status;

					
				$this->view->show("modificar_usuario.php", $data);
			}
		}
	}
	
	
	public function listarUsuarios() 
	{
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloUsuarios = new UsuariosModel();
	
		$data=array();

		Logger::configure('../../php/log4conf.xml');
		$log = Logger::getLogger('Sistema_de_Apuestas');
		$log->info("Ingresando a la plantilla de desactivar un administrador"); 	
			
		$administradores=$modeloUsuarios->listarUsuarios();
		
		$data['lista_usuarios']=$administradores;

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_usuarios.php", $data);		
	}
	
}
?>