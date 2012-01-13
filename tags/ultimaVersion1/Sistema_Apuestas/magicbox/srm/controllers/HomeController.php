<?php
/*
Controlador de la carga de la  aplicacion posee los metodos para inicias sesion, cerrarla, recuperaciones de claves y lo relacionado al 
login del administrador en el sistema 
*/

class HomeController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function index()
	{		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		$data=array();
		
		try
		{
			// Tell log4php to use our configuration file.
			Logger::configure('../../php/log4conf.xml');
			// Fetch a logger, it will inherit settings from the root logger
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Cargando la pagina principal del sistema de apuestas SOGAR"); 		
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina principal"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina principal";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("index.php", $data);
	}
	
	// funcion que  realiza la impresion en el log de la carga de la plantilla de inicio 
	public function iniciarSesion()
	{		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		$data=array();
		
		try
		{
			// Tell log4php to use our configuration file.
			Logger::configure('../../php/log4conf.xml');
			// Fetch a logger, it will inherit settings from the root logger
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Se esta mostrando la plantilla de inicio de sesion en el sistema de apuestas SOGAR"); 
			
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina principal"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina principal";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("iniciar_sesion.php", $data);
	}
	
	// funcion que muestra la carga de la plantilla luego que el administrador cierra sesion
	public function cerrarSesion()
	{		
		require '../../php/Logger.php';
		
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			// hay que iniciar la sesion para imprimir el nombre del administrador en el mensaje desplegado en la plantilla
			session_start();
			$usuario=$_SESSION["usuario"];
			$log->info("El usuario: ".$usuario." esta cerrando sesion en el sistema de apuestas SOGAR"); 		

		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina principal"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina principal";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("cerrar_sesion.php", $data);
	}
	
	// Metodo invocado al cerrar sesion, posee escritura en el LOG y destruye la sesion
	public function cerrarSesion_2()
	{		
		require '../../php/Logger.php';
		
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			// Se inicia la sesion y luego de la impresion del mensaje en el LOG se destruye
			session_start();
			$usuario=$_SESSION["usuario"];
			$log->info("El usuario: ".$usuario." ha cerrado sesion en el sistema de apuestas SOGAR"); 		
			session_destroy();
			
			header("location:index.php");
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cerrar la sesion en el sistema"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina principal";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("index.php", $data);
	}
	
	// Funcion que esta encargada de mostrar la plantilla para recuperar la clave
	public function recuperarClave()
	{		
		//Incluye el modelo que corresponde
		require 'models/UsuariosModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloEventos = new UsuariosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Recuperando clave en el sistema de apuestas SOGAR"); 

			//Le pedimos al modelo todos los items
			$pregs = $modeloEventos->listarPreguntaSecreta();	
			$log->info("Se cargo la lista de preguntas secretas en la plantilla de recuperar clave en el sistema"); 
			
			//Pasamos a la vista toda la información que se desea representar
			$data['pregs'] = $pregs;
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar recuperar la clave en el sistema"); 		
				$mensaje= "Ocurrio un error al intentar recuperar la clave en el sistema";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("recuperar_clave.php", $data);
	}
	
	// funcion que invoca a la plantilla de guardar nueva clave
	public function guardarNuevaClave()
	{
		//Incluye el modelo que corresponde
		require 'models/UsuariosModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloUsuarios = new UsuariosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			$mensaje=array();
			$cedula=$_POST['cedula'];
			$pregunta_secreta=$_POST['preguntaSecreta'];
			$respuesta_secreta=$_POST['respuestaSecreta'];

			// validacion de campos vacios
			if($cedula=="")
				$mensaje["cedula"]="Debe ingresar la cedula";
			if($pregunta_secreta=="")
				$mensaje["pregunta"]="Debe seleccionar una pregunta secreta";
			if($respuesta_secreta=="")
				$mensaje["respuesta"]="Debe ingresar una respuesta secreta";
			

			//Pasamos a la vista toda la información que se desea representar
			$data['mensaje'] = $mensaje;
			
		
			if($cedula!="" && $pregunta_secreta>0 && $respuesta_secreta!="")
			{	
				$datos_usuario=$modeloUsuarios->recuperarClaveUsuario($cedula,$pregunta_secreta,$respuesta_secreta);
				$pregunta_desc=$modeloUsuarios->obtenerPreguntaSecreta($pregunta_secreta);
				
				// log de informacion de lo que se está realizando en la plantilla
				$log->info("Recuperando clave de usuario en la plantilla de recuperar clave"); 
				
				// validacion de los datos
				if(count($datos_usuario)>0)
				{
					$data['cedula'] = $cedula;
					$data['respuesta_secreta'] = $respuesta_secreta;
					
					foreach($pregunta_desc as $clave=>$valor)
					{
						$preg_desc=$valor['pre_des'];  
					} 
					$data['pregunta_secreta'] = $preg_desc;
					
					foreach($datos_usuario as $clave=>$valor)
					{
						$clave=$valor['admin_clave'];  
					} 
					$data['clave'] = $clave;
				}	
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar la nueva clave del administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
		//print_r($data);
		//die();
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("mostrar_clave.php", $data);
	}
	
	// En esta funcion se instancia al modelo y permite la autenticacion del usuario
	public function autenticarse()
	{
		//Incluye el modelo que corresponde
		require 'models/UsuariosModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloUsuarios = new UsuariosModel();
	
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			$mensaje=array();
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];

            // validacion de  campos vacios
			if($usuario=="")
				$mensaje["usuario"]="Debe ingresar el usuario";
			if($usuario=="")
				$mensaje["clave"]="Debe ingresar la clave";

			//Pasamos a la vista toda la información que se desea representar
			$data['mensaje'] = $mensaje;
			
			
			if($usuario!="" && $clave!="")
			{	
				$filas= $modeloUsuarios->validarExistencia($usuario,$clave);
				if (count($filas>0))
				{			
						session_start();
						$_SESSION["usuario"]= "$usuario";
						$_SESSION["clave"]= "$clave";

						$data['usuario']=$usuario;
						$log->info("El usuario: ".$usuario." esta inciando sesion en el sistema de apuestas SOGAR"); 
						
				}
				else	// Escritura en el log de la existencia o no del usuario							
					$log->error("Usuario No Existe"); 
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar la nueva clave del administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("aplicacion.php", $data);
	}
	
	// Funcion que permite la instanciacion del menu operativo
	public function menuOperativo()
	{		
		//incluye el gestor de logs
		require '../../php/Logger.php';
	
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			session_start();
			$usuario=$_SESSION['usuario'];
			$data['usuario']=$usuario;
			
			$log->info("El usuario ".$usuario." ha iniciado sesion en el sistema de apuestas"); 	
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar ingresar al sistema"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		//Finalmente presentamos nuestra plantilla
		$this->view->show("menuOperativo.php", $data);
	}
	
	// Funcion que instancia la pag home, a la que se direccionan cada una de las pantallas
	public function home()
	{		
		//incluye el gestor de logs
		require '../../php/Logger.php';
	
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			session_start();
			$usuario=$_SESSION['usuario'];
			$data['usuario']=$usuario;
			
			$log->info("El usuario ".$usuario." ha iniciado sesion en el sistema de apuestas"); 	
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar ingresar al sistema"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	
		//Finalmente presentamos nuestra plantilla
		$this->view->show("home.php", $data);
	}
	
}
?>