<?php
class MaquinasController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function agregarMaquina()
	{
		//require 'models/MaquinasModel.php';		
		require '../../php/Logger.php';
		
		//$modeloMaquinas = new MaquinasModel();
	
		$data=array();
		$mensaje=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			$log->info("Cargando la pagina de agregar maquinas de apuesta en el sistema"); 
			$data['mensaje']=$mensaje;
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("agregar_maquina_mapa.php", $data);
	}
	
	public function listarMaquinas()
	{
		require 'models/MaquinasModel.php';		
		require '../../php/Logger.php';
		
		$modeloMaquinas = new MaquinasModel();
	
		$data=array();
		
		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			
			$maquinas=$modeloMaquinas->listarMaquinas();
			$data['maquinas']=$maquinas;
			
			$log->info("Cargando la pagina de listar maquinas de apuesta en el sistema"); 
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar cargar los eventos"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		//Finalmente presentamos nuestra plantilla
		$this->view->show("mostrar_maquinas.php", $data);
	}
	
	public function agregarMaquina_2()
	{
		require 'models/MaquinasModel.php';		
		require '../../php/Logger.php';
		
		$modeloMaquinas = new MaquinasModel();
		
		$coordenadas =$_POST['ejemplo'];
		$maq_marca =$_POST['maq_marca'];
		$maq_modelo =$_POST['maq_modelo'];
		$maq_memoria =$_POST['maq_memoria'];
		$maq_procesador =$_POST['maq_procesador'];
		$maq_medidas =$_POST['maq_medidas'];
		$maq_tarj_mem =$_POST['maq_tarj_mem'];
		$maq_cap_disco =$_POST['maq_cap_disco'];
	
		$data=array();
		$mensaje=array();
		
		try
		{
			if(trim($maq_marca)!='' && trim($maq_modelo)!='' && trim($maq_memoria)!='' && trim($maq_procesador)!='' && trim($maq_medidas)!='' && trim($maq_tarj_mem)!='' && trim($maq_cap_disco)!='')
			{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				
				$cont=strlen($coordenadas)-2;
				$coord=substr($coordenadas,1,$cont);
				list($latitud,$longitud)=explode(',',$coord);
				$latitud= number_format($latitud,12); 
				$longitud= number_format($longitud,12); 
				
				
				$modeloMaquinas->ingresarMaquina($latitud,$longitud,$maq_marca,$maq_modelo,$maq_memoria,$maq_procesador,$maq_medidas,$maq_tarj_mem,$maq_cap_disco);
					
				$mensaje= "La Maquina se creo de forma exitosa";
				$log->info("Se ha guardado una nueva maquina de forma exitosa"); 

				//Finalmente presentamos nuestra plantilla
				$this->view->show("mensaje.php", $data);
			}
			else
			{
				if(trim($maq_marca)=='')
					$mensaje['maq_marca']='Debe ingresar la marca';
				if(trim($maq_modelo)=='')
					$mensaje['maq_modelo']='Debe ingresar el modelo';
				if(trim($maq_memoria)=='')
					$mensaje['maq_memoria']='Debe ingresar la capacidad de memoria';
				if(trim($maq_procesador)=='')
					$mensaje['maq_procesador']='Debe ingresar el procesador';
				if(trim($maq_medidas)=='')
					$mensaje['maq_medidas']='Debe ingresar las medidas';
				if(trim($maq_tarj_mem)=='')
					$mensaje['maq_tarj_mem']='Debe ingresar la tarjeta de memoria';
				if(trim($maq_cap_disco)=='')
					$mensaje['maq_cap_disco']='Debe ingresar la capacidad de disco';
					
				$data['mensaje']=$mensaje;
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("agregar_maquina_mapa.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar una maquina nueva"); 		
				$mensaje= "Ocurrio un error de conexion";
		}

		
	}
	
	
		public function desactivarMaquina() 
	{
		require 'models/MaquinasModel.php';		
		require '../../php/Logger.php';
		
		$modeloMaquinas = new MaquinasModel();
		
		if(array_key_exists('maquinas',$_POST))
			$maq_id=$_POST['maquinas'];
		else
			$maq_id=0;
	
		$data=array();

		try
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar una maquina"); 	
			
			$maquinas=$modeloMaquinas->listarMaquinasActivas();
			
			$data['maquinas']=$maquinas;
			$data['maq_id']=$maq_id;
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al intentar guardar un nuevo administrador"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
		$this->view->show("desactivar_maquina.php", $data);
	}
	
	
	public function desactivarMaquina_2() 
	{
		require 'models/MaquinasModel.php';		
		require '../../php/Logger.php';
		
		$modeloMaquinas = new MaquinasModel();
		
		if(array_key_exists('maquinas',$_POST))
			$maq_id=$_POST['maquinas'];
		else
			$maq_id=0;
	
		$data=array();

		if($_POST['accion']=='buscar')
		{
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
			$log->info("Ingresando a la plantilla de desactivar una maquina"); 	
			
			$maquinas=$modeloMaquinas->listarMaquinasActivas();
			
			$data['maquinas']=$maquinas;

			$datos_maq=$modeloMaquinas->obtenerDatosMaquinaId($maq_id);
			$log->info("Se cargaron los datos de la maquina seleccionada en la plantilla de desactivar usuarios"); 
			
			foreach($datos_maq as $maq)
			{
				$maq_marca = $maq['maq_marca'];
				$maq_modelo = $maq['maq_modelo'];
				$maq_memoria = $maq['maq_memoria'];
				$maq_procesador = $maq['maq_procesador'];
				$maq_cap_disco = $maq['maq_cap_disco'];
				$maq_tarj_mem = $maq['maq_tarj_mem'];
				$maq_medidas = $maq['maq_medidas'];
				
			}
				
			$data['maq_id'] = $maq_id;
			$data['maq_marca'] = $maq_marca;
			$data['maq_modelo'] = $maq_modelo;
			$data['maq_memoria'] = $maq_memoria;
			$data['maq_procesador'] = $maq_procesador;
			$data['maq_cap_disco'] = $maq_cap_disco;
			$data['maq_tarj_mem'] = $maq_tarj_mem;
			$data['maq_medidas'] = $maq_medidas;

			//Finalmente presentamos nuestra plantilla
			$this->view->show("desactivar_maquina.php", $data);
		}
		else
		{
			$maq_id=$_POST['maq_id'];
		
			Logger::configure('../../php/log4conf.xml');
			$log = Logger::getLogger('Sistema_de_Apuestas');
				
			$retorno=$modeloMaquinas->desactivarMaquina($maq_id); 
			$log->info("Desactivando a la maquina: ".$maq_id);	
				
			$data['module']='maquinas';
			$data['action']='update';
			$data['retorno']='retorno';
				
			//Finalmente presentamos nuestra plantilla
			$this->view->show("mensaje.php", $data);
		}
	}

}
?>