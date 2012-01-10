<?php
class XmlController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	
	public function plantillaExportarXml()
	{		
		require '../../php/Logger.php';
		
		$data=array();
		
		$ruta_predeterminada='E:/';
		$rutas=array('E:/','F:/','G:/','H:/','C:/');
		
		foreach($rutas as $clave => $valor)
		{
			$ruta=$valor;
		
			if(is_dir($ruta)) 
			{
				if (opendir($ruta)) 
				{ 
					$dh = opendir($ruta);
					if(($file = readdir($dh)) !== false)
						$ruta_predeterminada=$ruta;
						break;
				}
			}
		}
		
		//print_r($rutas);
		//die();
		
		if(array_key_exists('direccion',$_POST))
			$ruta=$_POST['direccion'];
		else
			$ruta=$ruta_predeterminada;
			
		
		
		try
		{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Cargando la pagina de exportación de la data del sistema de apuestas en un archivo XML"); 	
				$data['ruta']=$ruta;
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("exportar_xml.php", $data);
	}
	
	
	public function ExportarXml()
	{		
		require '../../php/Logger.php';
		require 'models/CategoriasModel.php';	
		require 'models/EventosModel.php';
		require 'models/MaquinasModel.php';	
		require 'models/UsuariosModel.php';		
		require 'xml/GestionXML.php';		

		
		$modeloUsuarios = new UsuariosModel();		
		$modeloMaquinas = new MaquinasModel();				
		$modeloEventos = new EventosModel();
		$modeloCategorias = new CategoriasModel();
		$gestionXml = new GestionXML();
	
		$categorias=array();
		$eventos=array();
		$maquinas=array();
		$administradores=array();
		
		
		$ruta_predeterminada='E:/';
		$rutas=array('E:/','F:/','G:/','H:/','C:/');
		
		foreach($rutas as $clave => $valor)
		{
			$ruta=$valor;
		
			if(is_dir($ruta)) 
			{
				if (opendir($ruta)) 
				{ 
					$dh = opendir($ruta);
					if(($file = readdir($dh)) !== false)
						$ruta_predeterminada=$ruta;
						break;
				}
			}
		}
		
		
		$data=array();
		$accion=$_POST['accion'];
		
		if(array_key_exists('direccion',$_POST) && trim($_POST['direccion'])!='')
			$ruta=$_POST['direccion'].'/';
		else
			$ruta=$ruta_predeterminada;
			
			
		try
		{
			if($accion=='exportar')
			{
				//$gestionXml->ejemploXml();
				$eventos = $modeloEventos->buscarEventosActivos();
				$categorias = $modeloCategorias->listarCategorias();	
				$maquinas=$modeloMaquinas->listarMaquinas();
				$administradores=$modeloUsuarios->listarUsuariosActivos();
				$participantes=$modeloEventos->listarParticipantesEventosActivos();
				
				//print_r($eventos);
				
				
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Exportando la data del sistema de apuestas en un archivo XML"); 	
				$data['ruta']=$ruta;
				$gestionXml->guardarXml($categorias,$maquinas,$eventos,$participantes,$administradores,$ruta);
				die();
				//Finalmente presentamos nuestra plantilla
				$this->view->show("exportar_xml.php", $data);
			}
			else
			{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Cargando la pagina de exportación de la data del sistema de apuestas en un archivo XML"); 	
				$data['ruta']=$ruta;
				
				$this->view->show("exportar_xml.php", $data);
			}
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML";
		}
		
		
	}
	
	
	
}
?>