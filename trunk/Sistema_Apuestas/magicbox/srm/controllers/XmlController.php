<?php
/*Controlador del XML, genera el archivo en una ruta predeterminada y al oprimir exportar en la interfaz, se hace la descarga local enb cada 
una de las maquinas, se dejo comentado el codigo que detectaba el pendrive para la descarga en el mismo directamente*/


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
		$exportado=0;
		// ruta donde se guardara localmente el archivo para luego exportarlo
		$ruta_predeterminada='C:/wamp/www/Sistema_Apuestas/magicbox/srm/upload/';
		//$rutas=array('E:/','F:/','G:/','H:/','C:/');
		
		/*
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
			
		*/
		
		$ruta=$ruta_predeterminada;
		
		try
		{
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Cargando la pagina de exportación de la data del sistema de apuestas en un archivo XML"); 	
				$data['ruta']=$ruta;
				$data['generado']=$exportado;
		}
		catch(Exception $e)
		{
				$log->error("Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML"); 		
				$mensaje= "Ocurrio un error al intentar cargar la pagina de exportacion a un archivo XML";
		}
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("exportar_xml.php", $data);
	}
	
	// Funcion que exporta el XML en la ruta predeterminada
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
		
		
		
		$ruta_predeterminada='C:/wamp/www/Sistema_Apuestas/magicbox/srm/upload/';

		/*
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
		*/
		
		$data=array();
		$accion=$_POST['accion'];
		
		if(array_key_exists('direccion',$_POST) && trim($_POST['direccion'])!='')
			$ruta=$_POST['direccion'];
		else
			$ruta=$ruta_predeterminada;
			
			
		try
		{
			// al oprimir exportar se genera el archivo de manera remota en la pag de los clientes por asi decirlo
			if($accion=='exportar')
			{
				//$gestionXml->ejemploXml();
				$eventos = $modeloEventos->buscarEventosActivos();
				$categorias = $modeloCategorias->listarCategorias();	
				$maquinas=$modeloMaquinas->listarMaquinas();
				$administradores=$modeloUsuarios->listarUsuariosActivos();
				$participantes=$modeloEventos->listarParticipantesEventosActivos();
				$exportado=1;
				//print_r($eventos);
				
				// Escritura en el LOG
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Exportando la data del sistema de apuestas en un archivo XML"); 	
				$data['ruta']=$ruta;
				$data['generado']=$exportado;
				$gestionXml->guardarXml($categorias,$maquinas,$eventos,$participantes,$administradores,$ruta);
				
				//Finalmente presentamos nuestra plantilla
				$this->view->show("exportar_xml.php", $data);
			}
			else
			{
				// exportacion dek archivo
				$exportado=0;
				Logger::configure('../../php/log4conf.xml');
				$log = Logger::getLogger('Sistema_de_Apuestas');
				$log->info("Descargando el archivo XML generado en el sistema"); 
				$nombre='db_Sistema_Apuestas.xml';

				$enlace = $ruta."/".$nombre; 
				
				header ("Content-Disposition: attachment; filename=".$nombre." "); 
				
				header ("Content-Type: text/xml");
				
				header ("Content-Length: ".filesize($enlace));
				
				readfile($enlace);				
				
				die();
				$data['ruta']=$ruta;
				$data['generado']=$exportado;
				$this->view->show("mensaje_xml.php", $data);
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