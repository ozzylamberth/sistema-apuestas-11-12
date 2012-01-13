<?php
/*
Clase controladora de eventos, que contiene las invocaciones a los metodos, escritura en el log e instanciaciones a las vistas, asi como las funciones
para el manejo de los evetos
*/

class EventosController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function listar()
	{
		//Incluye el modelo que corresponde
		require 'models/EventosModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			//Le pedimos al modelo todos los items
			$eventos = $modeloEventos->listadoTotal();
			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargo la lista de eventos en la plantilla de listar eventos"); 

			if(array_key_exists('eve',$_POST))
				$eve_id=$_POST['eve'];
			else
				$eve_id=0;

			//Pasamos a la vista toda la información que se desea representar
			$data['eventos'] = $eventos;
			$data['eve_id'] = $eve_id;
			$data['action'] = 'ganadores';
		
			if($eve_id>0)
			{
				$ganadores_eve=array();
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);	
				$log->info("Se cargaron los datos de un evento seleccionado en la plantilla de listar eventos"); 

				$gant_eve=$modeloEventos->buscarGanadoresEvento($eve_id);
				$log->info("Se cargaron los datos de los ganadores de un evento seleccionado en la plantilla de listar eventos"); 
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_gan'] = $eve_nro_gan;
						
				foreach($gant_eve as $clave=>$valor)
				{
					$gant_eve['par_nombre']=$valor['par_nombre'];  
						
					$ganadores_eve[]=$gant_eve;
				}
				
				$data['ganadores_eve'] = $ganadores_eve;
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
		//print_r($data);
		//die();
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_ganadores.php", $data);
	}
	// funcion creada para listar los eventos, todos los presentes en la BD
	public function listarEventos()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$eventos = $modeloEventos->listarEventosTodos();	
			$log->info("Se cargo la lista de eventos que seran mostrados en la plantilla de listar eventos para usuarios registrados"); 

			$data['lista_eve'] = $eventos;
			$data['action'] = 'eventos';
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_eventos.php", $data);
	}
	
	// Esta funcion lista los ganadores de los eventos y realiza la escritura en el LOG
	public function listarGanadoresEventos()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		$ganadores_evento=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		    // Se listan todos los eventos
			$eventos = $modeloEventos->listarEventosTodos();
			// Se escribe en el log lo que esta ocurriendo al momento
			$log->info("Se cargo la lista de eventos que seran mostrados en la plantilla de listar ganadores de eventos para usuarios registrados"); 
             
			 // Se recorre el listado de eventos
			foreach($eventos as $clave=>$valor)
			{
				$eve_id=$valor['eve_id'];
				$eve_nombre=$valor['eve_nombre'];
				$ganadores = $modeloEventos->buscarGanadoresEvento($eve_id);
				
				if(count($ganadores)>0)
				{
					$fila=array();	
					for($i=0;$i<count($ganadores);$i++)
					{
						$fila[$i]=$ganadores[$i]['par_nombre'];
					}
					$ganadores_evento[$eve_nombre]=$fila;
				}
			}
			
			$data['ganadores_evento'] = $ganadores_evento;
			$data['action'] = 'eventos';
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_ganadores_eventos.php", $data);
	}
	
	// funcion que lista los participantes por evento, contiene escritura en los LOG
	public function listarParticipantesEventos()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		$participantes_evento=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		     
			 // Se llama al metodo que muestra todos los eventos y se insertan en un array llamado eventos
			$eventos = $modeloEventos->listarEventosTodos();	
			$log->info("Se cargo la lista de eventos que seran mostrados en la plantilla de listar participantes de eventos para usuarios registrados"); 
             
			 // Se recorre el arreglo con todos los eventos
			foreach($eventos as $clave=>$valor)
			{
				$eve_id=$valor['eve_id'];
				$eve_nombre=$valor['eve_nombre'];
				$participantes = $modeloEventos->buscarParticipantesEvento($eve_id);
				
				if(count($participantes)>0)
				{
					$fila=array();	
					for($i=0;$i<count($participantes);$i++)
					{
						$fila[$i]=$participantes[$i]['par_nombre'];
					}
					$participantes_evento[$eve_nombre]=$fila;
				}
			}
			
			$data['participantes_evento'] = $participantes_evento;
			$data['action'] = 'eventos';
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_participantes_eventos.php", $data);
	}
	
	// Se llama a la funcio que lista las categorias para desplegarlas en la ventana de eventos, al momento de insertar alguno 
	public function agregarEvento()
	{
		//Incluye el modelo que corresponde
		require 'models/CategoriasModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloCategorias = new CategoriasModel();
	
		$mensaje=array();
		$categorias=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$categorias = $modeloCategorias->listarCategorias();	
			$log->info("Ingresando a la pagina de agregar eventos"); 

			$data['categorias'] = $categorias;
			$data['mensaje']=$mensaje;
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar la plantilla de agregar eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		$this->view->show("agregar_evento.php", $data);
	}
	
	// Funcion que toma los valores introducidos en la plantilla, luego llama a la vista de eventos2 y realiza las validaciones de campos en blanco
	public function agregarEvento_2()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		require 'models/CategoriasModel.php';		
		

		$modeloCategorias = new CategoriasModel();
		$modeloEventos = new EventosModel();
		
		$eve_categoria_id=$_POST['categoria'];
		$eve_desc=$_POST['desc_Evento'];
		$eve_fecha=$_POST['fecha_Evento'];
		$eve_tipo_ganador=$_POST['tipo_Ganador'];
		$eve_nro_par=$_POST['nro_Participantes'];
		
		$fecha1=time();
		$fecha1 -= (270 * 60);
		$fecha = date("Y-m-d", $fecha1 );
				
	
		$data=array();
		$mensaje=array();
		
		Logger::configure('../../php/log4conf.xml');
		$log = Logger::getLogger('Sistema_de_Apuestas');
			
		
		try
		{
			if($eve_categoria_id!=0 && trim($eve_desc)!='' && trim($eve_fecha)!='' && trim($eve_nro_par)!='' && $eve_fecha>=$fecha)
			{
				
				$participantes = $modeloEventos->listarParticipantes();

				$log->info("Ingresando a la pagina de agregar eventos parte 2"); 
				
				$data['eve_categoria_id']=$eve_categoria_id;
				$data['eve_desc']=$eve_desc;
				$data['eve_fecha']=$eve_fecha;
				$data['eve_tipo_ganador']=$eve_tipo_ganador;
				$data['eve_nro_par']=$eve_nro_par;
				
				$data['participantes']=$participantes;
				$data['mensaje']=$mensaje;
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("agregar_evento_2.php", $data);
			}
			else
			{
				$categorias = $modeloCategorias->listarCategorias();	
				$log->warn("El usuario ha intentado agregar eventos teniendo uno o mas campos en blanco");

				$data['categorias'] = $categorias;
			    // Se realizan las validaciones en blanco
				if(trim($eve_categoria_id)==0)
					$mensaje['eve_categoria_id']='Debe seleccionar una categoria';
				if(trim($eve_desc)=='')
					$mensaje['eve_desc']='Debe ingresar la descripcion';
				if(trim($eve_fecha)=='')
					$mensaje['eve_fecha']='Debe ingresar la fecha';
				if(trim($eve_nro_par)=='')
					$mensaje['eve_nro_par']='Debe ingresar el numero de participantes';
				if(trim($eve_fecha)!='' && $eve_fecha<$fecha)
					$mensaje['eve_fecha']='Debe ingresar una fecha mayor a la actual';
				
					
				$data['mensaje']=$mensaje;
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("agregar_evento.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar la plantilla de agregar eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	}
	
	// Esta funcion valida los campos en blanco y es la que recibe los valores insertados en las otras paginas de eventoa
	public function agregarEvento_3()
	{
		require 'models/EventosModel.php';		
		require 'models/UsuariosModel.php';				
		require '../../php/Logger.php';

		$modeloEventos = new EventosModel();
		$modeloUsuarios = new UsuariosModel();
		
		$data=array();
		$mensaje=array();
		$validacion=1;
		
		try
		{	
			$eve_categoria_id=$_POST['eve_categoria_id'];
			$eve_desc=$_POST['eve_desc'];
			$eve_fecha=$_POST['eve_fecha'];
			$eve_tipo_ganador=$_POST['eve_tipo_ganador'];
			$eve_nro_par=$_POST['eve_nro_par'];
				
			if(array_key_exists('tipo_Pago',$_POST))
				$eve_tipo_pago=$_POST['tipo_Pago'];
			else
				$eve_tipo_pago=2;
				
			if(array_key_exists('nro_Resultados',$_POST))
				$eve_nro_gan=$_POST['nro_Resultados'];
			else
				$eve_nro_gan=1;				
			
			for($j=1;$j<=$eve_nro_par;$j++)
			{
				if(array_key_exists('Participante_'.$j,$_POST))
				{
					if(trim($_POST['Participante_'.$j])=='')
					{
						$mensaje['Participante_'.$j]='Debe ingresar el nombre del participante '.$j;
						$validacion=0;
					}
				}
			}
			
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
				
			if($validacion==1)
			{
				session_start();
				$usuario= $_SESSION['usuario'];

				$admin = $modeloUsuarios->buscarCedulaAdmin($usuario);
				
				foreach($admin as $adm)
				{
					$admin_cedula = $adm['admin_cedula'];
				}
				
				$log->info("Guardando los datos completos del evento: ".$eve_desc);
				
				for($i=1;$i<=$eve_nro_par;$i++)
				{
					if(array_key_exists('Id_'.$i,$_POST))
					{
						$par['par_id']=$_POST['Id_'.$i];
						$par['par_nombre']=$_POST['Participante_'.$i];
						
						if(array_key_exists('tipo_Pago_'.$i,$_POST) && trim($_POST['tipo_Pago_'.$i])!='')
							$par['tipo_pago']=$_POST['tipo_Pago_'.$i];
						else
							$par['tipo_pago']=0;
							
						if(array_key_exists('tope_Apuesta_'.$i,$_POST) && trim($_POST['tope_Apuesta_'.$i])!='')
							$par['tope_apuesta']=$_POST['tope_Apuesta_'.$i];
						else
							$par['tope_apuesta']=0;
							
						$participantes[]=$par;
					}
				}
				 // Se inserta el evento y los participantes
				$retorno= $modeloEventos->insertarEvento($admin_cedula,$eve_tipo_pago,$eve_desc, $eve_fecha, $eve_nro_par,$eve_categoria_id,$eve_nro_gan,$participantes);			
				$eve_id= $modeloEventos->obtenerIdEvento();
				$retorno1=$modeloEventos->ingresarParticipantesEvento($eve_id,$participantes);
				
				$data['module']='evento';
				$data['action']='insert';
				$data['retorno']='retorno';
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("mensaje.php", $data);
			}
			else
			{
				$participantes = $modeloEventos->listarParticipantes();
				
				$data['participantes']=$participantes;
				$data['mensaje']=$mensaje;
				
				$log->warn("Se ha intentado guardar datos del evento (parte 2) con uno o mas campos en blanco");
				
				//print_r($_POST);
				
				$eve_categoria_id=$_POST['eve_categoria_id'];
				$eve_desc=$_POST['eve_desc'];
				$eve_fecha=$_POST['eve_fecha'];
				$eve_tipo_ganador=$_POST['eve_tipo_ganador'];
				$eve_nro_par=$_POST['eve_nro_par'];
				
				$data['eve_categoria_id']=$eve_categoria_id;
				$data['eve_desc']=$eve_desc;
				$data['eve_fecha']=$eve_fecha;
				$data['eve_tipo_ganador']=$eve_tipo_ganador;
				$data['eve_nro_par']=$eve_nro_par;
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("agregar_evento_2.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
	}
	
	
	// Funcion que invoca a la generacion de resultados de un evento
	public function generarResultados()
	{
		//Incluye el modelo que corresponde
		require 'models/EventosModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			//Le pedimos al modelo todos los items
			$eventos = $modeloEventos->listarEventosSinResultados();
			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Accediendo a la pagina de ingresar resultados de un evento"); 

			if(array_key_exists('evento',$_POST))
				$eve_id=$_POST['evento'];
			else
				$eve_id=0;

			//Pasamos a la vista toda la información que se desea representar
			$data['eventos'] = $eventos;
			$data['eve_id'] = $eve_id;
		
			if($eve_id>0)
			{
				$ganadores_eve=array();
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);	
				$log->info("Se cargaron los datos de un evento seleccionado en la plantilla de listar eventos"); 

				$participantes_eve=$modeloEventos->buscarParticipantesEvento($eve_id);
				$log->info("Se cargaron los datos de los ganadores de un evento seleccionado en la plantilla de listar eventos"); 
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_gan'] = $eve_nro_gan;
				
				$data['participantes_eve'] = $participantes_eve;
		
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar generar resultados"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("generar_resultados.php", $data);
	}
	
	// Funcion que inserta los ganadores de los eventos, es decir los participantes
	public function generarResultados_2()
	{
		require 'models/EventosModel.php';		
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
		$modeloUsuarios = new UsuariosModel();
		
		$data=array();
		
		Logger::configure('../../php/log4conf.xml');
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		try
		{
		
			if($_POST['accion']=='buscar')
			{
				$eve_id=$_POST['evento'];
				$eventos = $modeloEventos->listarEventosSinResultados();
				
				$data['eventos'] = $eventos;
				$data['eve_id'] = $eve_id;
				
				$ganadores_eve=array();
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);	
				$log->info("Se cargaron los datos de un evento seleccionado en la plantilla de listar eventos"); 

				$participantes_eve=$modeloEventos->buscarParticipantesEvento($eve_id);
				$log->info("Se cargaron los datos de los ganadores de un evento seleccionado en la plantilla de listar eventos"); 
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_gan'] = $eve_nro_gan;
				
				$data['participantes_eve'] = $participantes_eve;

				//Finalmente presentamos nuestra plantilla
				$this->view->show("generar_resultados.php", $data);
			}
			else
			{
				$eve_id=$_POST['eve_id'];
				$eve_nro_gan=$_POST['eve_nro_gan'];
				
				$res_desc=$_POST['descripcion_eve'];
			
				session_start();
				$usuario= $_SESSION['usuario'];
			
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				
				$log->info("Guardando los datos completos del resultado del evento: ".$eve_id);
				$retorno= $modeloEventos->insertarResultado($res_desc) ;			
				$res_id= $modeloEventos->obtenerIdResultado();
				
				for($i=1;$i<=$eve_nro_gan;$i++)
				{
					if(array_key_exists('Id_'.$i,$_POST))
					{
						$par['res_id']=$_POST['Id_'.$i];
						$par['res_nombre']=$_POST['Participante_'.$i];
						
						$retorno1=$modeloEventos->insertarGanadoresEvento($res_id,$eve_id,$par['res_id']);
							
						$participantes[]=$par;
					}
				}
				
				$retorno= $modeloEventos->desactivarEvento($eve_id) ;	
				
				$data['module']='resultado';
				$data['action']='insert';
				$data['retorno']='retorno';
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("mensaje.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar resultados de un evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
	}
	
	// Funcion que lista los eventos que se pueden eliminar , contiene la escritura en el log
	public function eliminarEvento()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$eventos = $modeloEventos->listarEventosSinResultados();

			if(array_key_exists('eve',$_POST))
				$eve_id=$_POST['eve'];
			else
				$eve_id=0;

			//Pasamos a la vista toda la información que se desea representar
			$data['eventos'] = $eventos;
			$data['eve_id'] = $eve_id;
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("eliminar_evento.php", $data);
	}
	
	// Funcion que invoca a las otras funciones presentes en el modelo que eliminan los eventos
	public function eliminarEvento_2()
	{
		require 'models/EventosModel.php';		
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
		$modeloUsuarios = new UsuariosModel();
		
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			if($_POST['accion']=='buscar')
			{
				$eve_id=$_POST['evento'];
				$eventos = $modeloEventos->listarEventosSinResultados();
				
				$data['eventos'] = $eventos;
				$data['eve_id'] = $eve_id;
				
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);	
				$log->info("Se cargaron los datos de un evento seleccionado en la plantilla de listar eventos"); 

				$participantes_eve=$modeloEventos->buscarParticipantesEvento($eve_id);
				$log->info("Se cargaron los datos de los ganadores de un evento seleccionado en la plantilla de listar eventos"); 
				
				// Se recorre el arreglo de los datos de un evento
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
					$eve_nro_part = $eve['eve_nro_part'];
					$eve_tipo_pago = $eve['eve_tipo_pago'];
					$eve_status = $eve['eve_status'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_gan'] = $eve_nro_gan;
				$data['eve_nro_part'] = $eve_nro_part;
				$data['eve_tipo_pago'] = $eve_tipo_pago;
				$data['eve_status'] = $eve_status;

				//Finalmente presentamos nuestra plantilla
				$this->view->show("eliminar_evento.php", $data);
			}
			else
			{
				$eve_id=$_POST['eve_id'];
			
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				
				// Se realiza la escritura en el LOG
				$log->info("Eliminando los participantes del evento: ".$eve_id);
				$retorno=$modeloEventos->eliminarParticipantesEvento($eve_id); 
				$log->info("Eliminando los participantes sin eventos asociados ");
				$retorno2=$modeloEventos->eliminarParticipantes($eve_id); 
				$log->info("Eliminando el evento: ".$eve_id);
				$retorno1=$modeloEventos->eliminarEvento($eve_id);	
				
				$data['module']='evento';
				$data['action']='delete';
				$data['retorno']='retorno';
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("mensaje.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	}
	
	// Funcion que modifica un evento, es la que llenara el combo con los eventos activos, es decir los que se pueden modificar
	public function modificarEvento()
	{
		require 'models/EventosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
	
		$eventos=array();
		$data=array();
		$mensaje=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$eventos = $modeloEventos->buscarEventosActivos();

			if(array_key_exists('eve',$_POST))
				$eve_id=$_POST['eve'];
			else
				$eve_id=0;

			$data['eventos'] = $eventos;
			$data['eve_id'] = $eve_id;
			$data['mensaje'] = $mensaje;
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("modificar_evento.php", $data);
	}
	
	
	// Funcion que recibe los parametros nuevos y llama en el modelo a las funciones que modifican
	public function modificarEvento_2()
	{
		require 'models/EventosModel.php';		
		require 'models/UsuariosModel.php';		
		require '../../php/Logger.php';
		
		$modeloEventos = new EventosModel();
		$modeloUsuarios = new UsuariosModel();
		
		$data=array();
		$mensaje=array();

		Logger::configure('../../php/log4conf.xml');
		$log = Logger::getLogger('Sistema_de_Apuestas');


		try
		{		
			if($_POST['accion']=='buscar')
			{
				$eve_id=$_POST['evento'];
				$eventos = $modeloEventos->buscarEventosActivos();
				
				$data['eventos'] = $eventos;
				$data['eve_id'] = $eve_id;
				$data['mensaje'] = $mensaje;
				
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);	
				$log->info("Ingresando a la plantilla de modificar un evento seleccionado"); 
				
				foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_gan = $eve['eve_nro_gan'];
					$eve_fecha = $eve['eve_fecha'];
					$eve_nro_part = $eve['eve_nro_part'];
					$eve_tipo_pago = $eve['eve_tipo_pago'];
					$eve_status = $eve['eve_status'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_gan'] = $eve_nro_gan;
				$data['eve_nro_part'] = $eve_nro_part;
				$data['eve_tipo_pago'] = $eve_tipo_pago;
				$data['eve_status'] = $eve_status;

				//Finalmente presentamos nuestra plantilla
				$this->view->show("modificar_evento.php", $data);
			}
			else
			{
				$eve_id=$_POST['eve_id'];
				$eve_nombre=$_POST['eve_nombre'];
				$eve_fecha=$_POST['eve_fecha'];
				
				//echo "<br>";
				
				$fecha1=time();
				$fecha1 -= (270 * 60);
				$fecha = date("Y-m-d", $fecha1 );
				
				if(trim($eve_nombre)!='' && trim($eve_fecha)!='' && $eve_fecha >=$fecha)
				{
					Logger::configure('../../php/log4conf.xml');
					$log = Logger::getLogger('Sistema_de_Apuestas');
				
					$log->info("Modificando los datos del evento: ".$eve_id);
					$retorno1=$modeloEventos->modificarEvento($eve_id, $eve_nombre, $eve_fecha);	
				
					$data['module']='evento';
					$data['action']='delete';
					$data['retorno']='retorno';
				
					//Finalmente presentamos nuestra plantilla
					$this->view->show("mensaje.php", $data);
				}
				else
				{
					
					$eventos = $modeloEventos->buscarEventosActivos();
				
					$data['eventos'] = $eventos;
					$data['eve_id'] = $eve_id;
				
					$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);					
					$log->warn("Se ha intentado modificar un evento y se dejaron campos en blanco"); 
				
					// Se realizan las validaciones de campos vacios
					if(trim($eve_nombre)=='')
						$mensaje['eve_nombre']='Debe ingresar la descripcion';
					if(trim($eve_fecha)=='')
						$mensaje['eve_fecha']='Debe ingresar la fecha';
					if(trim($eve_fecha)!='' && $eve_fecha<$fecha)
						$mensaje['eve_fecha']='Debe ingresar una fecha mayor a la actual';
					
						
					$data['mensaje']=$mensaje;
					
					foreach($datos_eve as $eve)
					{
						$eve_nombre = $eve['eve_nombre'];
						$eve_nro_gan = $eve['eve_nro_gan'];
						$eve_fecha = $eve['eve_fecha'];
						$eve_nro_part = $eve['eve_nro_part'];
						$eve_tipo_pago = $eve['eve_tipo_pago'];
						$eve_status = $eve['eve_status'];
					}
					
					$data['eve_nombre'] = $eve_nombre;
					$data['eve_fecha'] = $eve_fecha;
					$data['eve_nro_gan'] = $eve_nro_gan;
					$data['eve_nro_part'] = $eve_nro_part;
					$data['eve_tipo_pago'] = $eve_tipo_pago;
					$data['eve_status'] = $eve_status;
				
					
					//Finalmente presentamos nuestra plantilla
					$this->view->show("modificar_evento.php", $data);
				}
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	}
	
	// Esta funcion llena el combobox de la vista con los eventos proximos 
	public function proximosEventos()
	{
		//Incluye el modelo que corresponde
		require 'models/EventosModel.php';
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloEventos = new EventosModel();
	
		if(array_key_exists('eve',$_POST))
			$eve_id=$_POST['eve'];
		else
			$eve_id=0;

		$eventos=array();
		$data=array();

		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			//Le pedimos al modelo todos los items
			$eventos = $modeloEventos->buscarEventosActivos();
			$log->info("Se cargaron los eventos activos en el combo de la plantilla de proximos eventos"); 
			
			$data['eve_id'] = $eve_id;
			$data['eventos'] = $eventos;
			$data['action'] = 'eventos';
		
			
			if($eve_id>0)
			{
				$participantes_eve=array();
				$datos_eve=$modeloEventos->buscarEventoPorId($eve_id);
				$log->info("Se cargaron los datos de un evento seleccionado en la plantilla de proximos eventos"); 
				
				$part_eve=$modeloEventos->buscarParticipantesEvento($eve_id);
				$log->info("Se cargaron los datos de los participantes de un evento seleccionado en la plantilla de proximos eventos"); 
				
				// Se recorre el arreglo que tiene los eventos
			   foreach($datos_eve as $eve)
				{
					$eve_nombre = $eve['eve_nombre'];
					$eve_nro_part = $eve['eve_nro_part'];
					$eve_fecha = $eve['eve_fecha'];
					$eve_tipo_pago = $eve['eve_tipo_pago'];
				}
				
				$data['eve_nombre'] = $eve_nombre;
				$data['eve_fecha'] = $eve_fecha;
				$data['eve_nro_part'] = $eve_nro_part;
				$data['eve_tipo_pago'] = $eve_tipo_pago;
		
				foreach($part_eve as $clave=>$valor)
				{
					$parts_eve['par_nombre']=$valor['par_nombre'];  
		 
						$parts_eve['pe_tipo_pago']=$eve['eve_tipo_pago'];  
						
					$participantes_eve[]=$parts_eve;
				}
				
				$data['participantes_eve'] = $participantes_eve;
		
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("proximos_eventos.php", $data);
	}
}
?>