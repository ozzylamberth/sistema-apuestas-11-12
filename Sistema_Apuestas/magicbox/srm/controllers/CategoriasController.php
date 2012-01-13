<?php
/*Controlador de categorias contiene los mensajes del log y las invocaciones a cada uno 
de los metodos relacionados con las categorias pertenecientes a la palicacion
*/


class CategoriasController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function agregarCategoria()
	{
			
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			//Le pedimos al modelo todos los items
			//$eventos = $modeloCategorias->listadoTotal();
			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Ingresando a la pagina de agregar categorias"); 
			$data['mensaje']="";
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		$this->view->show("agregar_categoria.php", $data);
	}
	
	// este funcion invoca al metodo que inserta las categorias, tiene un catch que valida si hay un error en la conexion a BD
	
	public function guardarCategoria() ////OJO: pendienteee... falta crear mensaje.php
	{
		//Incluye el modelo que corresponde
		require 'models/CategoriasModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modeloCategorias = new CategoriasModel();
	
		$nombre=$_POST['cat_nombre'];
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
				
			if(trim($nombre)!='')
			{
			
				//Le pedimos al modelo todos los items
				$retorno = $modeloCategorias->ingresarCategoria($nombre);
				///mensaje log de que se cargaron los eventos en el combobox	
				$log->info("Se ha guardado una nueva categoria en la base de datos"); 
				
				$data['mensaje']="";
				
				$this->view->show("mensaje.php", $data);
			}
			else
			{
				$data['mensaje']="Debe ingresar el nombre de la categoria";
				$log->warn("Se ha intentado guardar una nueva categoria con el campo de nombre en blanco"); 
				
				$this->view->show("agregar_categoria.php", $data);
			}
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una nueva categoria"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
	}
	// Esta funcion invoca al metodo que elimina una categoria de la Base de datos, imprime en el log 
	public function eliminarCategoria()
	{
		require 'models/CategoriasModel.php';		
		require '../../php/Logger.php';
		
		$modeloCategorias = new CategoriasModel();
		
		if(array_key_exists('categoria',$_POST))
			$cat_id=$_POST['categoria'];
		else
			$cat_id=0;
	
		$categorias=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$categorias = $modeloCategorias->buscarCategoriasSinEventos();	
			$log->info("Ingresando a la pagina de eliminar categorias");
			
			if($cat_id>0)
			{
				$datos_categoria=$modeloEventos->buscarCategoriaPorId($cat_id);	

				$participantes_eve=$modeloEventos->buscarParticipantesEvento($eve_id);
				$log->info("Se cargaron los datos de la categoria seleccionada en la plantilla de eliminar categorias"); 
				
				foreach($datos_categoria as $ca)
				{
					$cat_nombre = $ca['cat_nombre'];
					$cat_id = $ca['cat_id'];
				}
				
				$data['cat_nombre'] = $cat_nombre;		
			}

			$data['categorias']=$categorias;
			$data['cat_id']=$cat_id;
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		$this->view->show("eliminar_categoria.php", $data);
	}
	
	// Esta funcion elimina categorias que no tiene eventos asociados
	public function eliminarCategoria_2()
	{
		require 'models/CategoriasModel.php';		
		require '../../php/Logger.php';
		
		$modeloCategorias = new CategoriasModel();
		
		$cat_id=$_POST['categoria'];
	
		$categorias=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			if($_POST['accion']=='buscar')
			{
				$categorias = $modeloCategorias->buscarCategoriasSinEventos();	
				$datos_categoria=$modeloCategorias->buscarCategoriaPorId($cat_id);	

				$log->info("Se cargaron los datos de la categoria seleccionada en la plantilla de eliminar categorias"); 
				
				foreach($datos_categoria as $ca)
				{
					$cat_nombre = $ca['cat_nombre'];
					$cat_id = $ca['cat_id'];
				}
				
				$data['cat_nombre'] = $cat_nombre;		
				$data['categorias']=$categorias;
				$data['cat_id']=$cat_id;

				//Finalmente presentamos nuestra plantilla
				$this->view->show("eliminar_categoria.php", $data);
			}
			else
			{
				$cat_id=$_POST['cat_id'];
			
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				
				$log->info("Eliminando la categoria: ".$cat_id);
				$datos_categoria=$modeloCategorias->eliminarCategoria($cat_id);	
				
				$data['module']='resultado';
				$data['action']='insert';
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
	
	// Esta funcion modifica una categoria, imprime en el log e instancia a la vista es decir a la interfaz grafica de la pagina
	public function modificarCategoria()
	{
		require 'models/CategoriasModel.php';		
		require '../../php/Logger.php';
		
		$modeloCategorias = new CategoriasModel();
		
		if(array_key_exists('categoria',$_POST))
			$cat_id=$_POST['categoria'];
		else
			$cat_id=0;
	
		$categorias=array();
		$data=array();
		$mensaje=array();
		
		Logger::configure('../../php/log4conf.xml');
		$log = Logger::getLogger('Sistema_de_Apuestas');
		
		try
		{		
			$categorias = $modeloCategorias->listarCategorias();	
			$log->info("Ingresando a la pagina de modificar categorias");
			
			$data['categorias']=$categorias;
			$data['cat_id']=$cat_id;
			$data['mensaje']=$mensaje;
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar las categorias"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		$this->view->show("modificar_categoria.php", $data);
	}
	
	// Esta funcion modifica una categoria, posee escritura en el log al presentar fallos, instancia a la  vista y hace las validaciones de los campos en blanco
	public function modificarCategoria_2()
	{
		require 'models/CategoriasModel.php';		
		require '../../php/Logger.php';
		
		$modeloCategorias = new CategoriasModel();
		
		$cat_id=$_POST['categoria'];
	
		$categorias=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			if($_POST['accion']=='buscar')
			{
				$categorias = $modeloCategorias->listarCategorias();	
				$datos_categoria=$modeloCategorias->buscarCategoriaPorId($cat_id);	

				$log->info("Se cargaron los datos de la categoria seleccionada en la plantilla de eliminar categorias"); 
				
				foreach($datos_categoria as $ca)
				{
					$cat_nombre = $ca['cat_nombre'];
					$cat_id = $ca['cat_id'];
				}
				
				$data['cat_nombre'] = $cat_nombre;		
				$data['categorias']=$categorias;
				$data['cat_id']=$cat_id;
				$data['mensaje']="";

				//Finalmente presentamos nuestra plantilla
				$this->view->show("modificar_categoria.php", $data);
			}
			else
			{
				$cat_id=$_POST['cat_id'];
				$cat_nombre=$_POST['cat_nombre'];
			
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
			
				if(trim($cat_nombre)!='')
				{
					$log->info("Modificando la categoria: ".$cat_id);
					$datos_categoria=$modeloCategorias->modificarCategoria($cat_id,$cat_nombre);	
					
					$data['module']='resultado';
					$data['action']='insert';
					$data['retorno']='retorno';
					
					//Finalmente presentamos nuestra plantilla
					$this->view->show("mensaje.php", $data);
				}
				else
				{
					$categorias = $modeloCategorias->listarCategorias();	
					$datos_categoria=$modeloCategorias->buscarCategoriaPorId($cat_id);	
					
					$data['categorias']=$categorias;
					$data['cat_id']=$cat_id;
					
					foreach($datos_categoria as $ca)
					{
						$cat_nombre = $ca['cat_nombre'];
					}
					// validaciones de cuando el usuario no introduce el nombre de la categoria
					$data['cat_nombre'] = $cat_nombre;
					$data['mensaje']="Debe ingresar el nombre de la categoria";
					$log->warn("Se ha intentado modificar categoria colocando campos en blanco");
					
					$this->view->show("modificar_categoria.php", $data);
				}
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo evento"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
	}
	
	// Esta funcion lista las categorias existentes
	public function listarCategorias()
	{
		require 'models/CategoriasModel.php';		
		require '../../php/Logger.php';
		
		$modeloCategorias = new CategoriasModel();
	
		$categorias=array();
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$categorias = $modeloCategorias->listarCategorias();
			$log->info("Cargando todas las categorias que seran mostradas en la plantilla de listar categorias"); 

			$data['categorias'] = $categorias;
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar_categorias.php", $data);
	}
	
	
}
?>