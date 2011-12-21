<?php 


require '../../../php/Logger.php';

include_once ("../Modelo/ModeloEvento.php");
include_once ("../DataConexion/guardarXmlEvento.php");
include_once ("../DataConexion/guardarXmlParticipante.php");


session_start();
$usuario= $_SESSION['usuario'];

		// Tell log4php to use our configuration file.
		Logger::configure('../../../php/log4conf.xml');
		// Fetch a logger, it will inherit settings from the root logger
		$log = Logger::getLogger('Sistema_de_Apuestas');
		$desc_Evento= $_POST["desc_Evento"];
        $fecha_Evento= $_POST["fecha_Evento"];
        $tipo_Ganador= $_POST['tipo_Ganador'];
        $nro_Participantes= $_POST["nro_Participantes"];
        $cat_id= $_POST['cat_id'];
		
	 
		
		/* 
		 $cat_Nombre= $_POST["cat_nombre"];
		 $desc_Evento= $_POST["desc_Evento"];
		 $fecha_Evento= $_POST["fecha_Evento"];
		 $fecha= $_POST['Fecha']; */
		 if(isset($_POST['tipo_Ganador'])) $tipo_Ganador= $_POST['tipo_Ganador'];
		   $nro_Participantes= $_POST["nro_Participantes"];			
		
		 $tipo_Pago = $_POST['tipo_Pago'];

					switch ($tipo_Pago)
					{
						case 0: break;
						case 1: $tipo_Pago=1; break;
						case 2: $tipo_Pago=2; break;
						case 3: $tipo_Pago=3; break;
						case 4: $tipo_Pago=4; break;
						case 5: $tipo_Pago=5; break;
						case 6: $tipo_Pago=6; break;
						case 7: $tipo_Pago=7; break;
						case 8: $tipo_Pago=8; break;
						case 9: $tipo_Pago=9; break;
						case 10: $tipo_Pago=10; break;
					}
		
		
		try
		{
			
			$usuario = 'ADMIN';
			$admin_cedula= administradorEvento($usuario);
			
			// Cargar el combo de los participantes de un evento dependiendo del formulario que se despliegue en la pag de eventos
			if ($tipo_Ganador==='un_Ganador')
			{
				
					//echo $admin_cedula,$tipo_Pago,$desc_Evento, $fecha_Evento, $nro_Participantes,$cat_Id;
					//echo 'holaaaaaaaaaaaaa';
					$insertar_evento= insertarevento ($admin_cedula,$tipo_Pago,$desc_Evento, $fecha_Evento, $nro_Participantes,$cat_id);
					
				
			}
			// Cargar el combo de los participantes de un evento dependiendo del formulario que se despliegue en la pag de eventos
			if ($tipo_Ganador==='tabla_Resultados')
			{
				 $insertar_evento= insertarevento2 ($admin_cedula,$tipo_Pago,$desc_Evento, $fecha_Evento, $nro_Participantes,$cat_id);
					
				
				
			}
				

			///mensaje log de que se cargaron los eventos en el combobox	
			$log->info("Se cargó la lista de participantes en la Creacion de un Evento"); 
			
			
		}
		catch(Exception $e)
		{
				$log->error("Hubo un error de conexion al guardar los datos de un evento en la base de datoss"); 		
				$mensaje= "Ocurrio un error de conexion";
		}
		
	
		require "../Formularios/eventos3.php";
?>