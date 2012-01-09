<?php
class CategoriasController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function agregarCategoria()
	{
		//Incluye el modelo que corresponde
		//require 'models/CategoriasModel.php';		
		
		//incluye el gestor de logs
		require '../../php/Logger.php';
		
		//Creamos una instancia de nuestro "modelo"
		//$modeloCategorias = new CategoriasModel();
	
		//$categorias=array();
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
			if(trim($nombre)!='')
			{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
			
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
				
				$this->view->show("agregar_categoria.php", $data);
			}
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una nueva categoria"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		
	}
	
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
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
		
			$categorias = $modeloCategorias->listarCategorias();	
			$log->info("Ingresando a la pagina de modificar categorias");
			
			$data['categorias']=$categorias;
			$data['cat_id']=$cat_id;
			$data['mensaje']=$mensaje;
		
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		$this->view->show("modificar_categoria.php", $data);
	}
	
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
			
				if(trim($cat_nombre)!='')
				{
				
					Logger::configure('../../php/log4conf.xml');
					$log = Logger::getLogger('Sistema_de_Apuestas');
					
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
					
					$data['cat_nombre'] = $cat_nombre;
					$data['mensaje']="Debe ingresar el nombre de la categoria";
					
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