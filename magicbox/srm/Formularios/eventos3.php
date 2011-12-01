<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?PHP

session_start();
$usuario= $_SESSION['usuario'];

require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

include_once ("../DataConexion/conexion.php");

//print_r($_POST);


 $desc_Evento= $_POST["desc_Evento"];
 $fecha_Evento= $_POST["fecha_Evento"];
 $tipo_Ganador= $_POST['tipo_Ganador'];
 $nro_Participantes= $_POST["nro_Participantes"];
 $cat_Id= $_POST["cat_Id"];
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

	$select_Admin= sql("select admin_cedula from administrador where admin_login LIKE '$usuario'");
	 $filas=oci_fetch_array($select_Admin,OCI_BOTH);
	 $admin_cedula= $filas['ADMIN_CEDULA'];

	
	
	if ($tipo_Ganador==='un_Ganador') {
	$insert_Eve= sql("INSERT INTO EVENTO (eve_id ,eve_nombre, eve_status,eve_fecha,eve_nro_part ,eve_nro_gan ,eve_tipo_pago ,eve_fk_id_admin, eve_fk_id_categoria) VALUES		                                                      								(AUTO_INC_EVENTO.NEXTVAL,'$desc_Evento','Activo',TO_DATE('$fecha_Evento'),'$nro_Participantes',1,'$tipo_Pago','$admin_cedula','$cat_Id')");
		
		
		
		
	
																																																																														}
	//SELECCCT DEL ULTIMO Q INSERTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
	
$nro_Part=1;
while ($nro_Part <=  $nro_Participantes){
	
	 //TOMAR LOS PARTCIPANTEEEESSS
	 		$par_id=$_POST['Id_'.$nro_Part];
			if(trim($par_id)=='')
			{
				//insert into participante values autoincremen
				//ingresar nuevo participante y luego consulto para saber el id (EL ULTIMO QUE INGRESE)
				
				//llenar la tabla intermedia con el id del participante y el id del evento (ULTIMOS)
			}
			else
			{
				//insert into con par_Id
				//llenar la tabla intermedia con el id del participante y el id del evento
			}
            $Participante= $_POST['Participante_'.$nro_Part];
			
echo $Participante;
$nro_Part++;
}




if ($tipo_Ganador==='tabla_Resultados'){ 

 
 
 $nro_Part=1;
while ($nro_Part <=  $nro_Participantes){
	
	 		$par_id=$_POST['Id_'.$nro_Part];
		    $tipo_Pago2=$_POST['tipo_Pago_'.$nro_Part]; 
            $tope_Apuesta=$_POST['tope_Apuesta_'.$nro_Part]; 
			if(trim($par_id)=='')
			{
				//insert into participante values autoincremen
				//ingresar nuevo participante y luego consulto para saber el id (EL ULTIMO QUE INGRESE)
				
				//llenar la tabla intermedia con el id del participante y el id del evento (ULTIMOS)
			}
			else
			{	
				//llenar la tabla intermedia con el id del participante y el id del evento y tope_apuesta = $tope_apuesta
			}
            $Participante= $_POST['Participante_'.$nro_Part];
			
//echo $Participante;
$nro_Part++;
}
 
 //TOMAS LOS PARTICIPANTESSSS
}





?>

</body>
</html>