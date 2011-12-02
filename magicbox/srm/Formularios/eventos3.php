<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.png);
}
-->
</style></head>

<body>

<?PHP

session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/guardarXmlEvento.php");
include_once ("../DataConexion/guardarXmlParticipante.php");

require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

include_once ("../DataConexion/conexion.php");



// recibe los valores de evento2.php, para en esta pagina hacer las inserciones de la data que se ha ido solicitando
 $desc_Evento= $_POST["desc_Evento"];
 $fecha_Evento= $_POST["fecha_Evento"];
 $tipo_Ganador= $_POST['tipo_Ganador'];
 $nro_Participantes= $_POST["nro_Participantes"];
 $cat_Id= $_POST["cat_Id"];


	 //seleccionar la cedula del administrador para luego insertarla como clave foranea en el evento
	 $select_Admin= sql("select admin_cedula from administrador where admin_login LIKE '$usuario'");
	 $filas=oci_fetch_array($select_Admin,OCI_BOTH);
	 $admin_cedula= $filas['ADMIN_CEDULA'];

// Hacer la insercion de los datos que se han solicitado en evento.php y evento2.php
if ($tipo_Ganador==='un_Ganador') 
{
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
					
    	// Si el tipo de ganador es 1, se hace el insert con 1 como valor predefinido.	
	   $insert_Eve= sql("INSERT INTO EVENTO (eve_id ,eve_nombre, eve_status,eve_fecha,eve_nro_part ,eve_nro_gan ,eve_tipo_pago ,eve_fk_id_admin, eve_fk_id_categoria) VALUES		                                                      								(AUTO_INC_EVENTO.NEXTVAL,'$desc_Evento','Activo',TO_DATE('$fecha_Evento','YYYY-MM-DD'),'$nro_Participantes',1,'$tipo_Pago','$admin_cedula','$cat_Id')");
	
	   // se selecciona el ultimo evento creado
      $select_Id_Eve= sql("SELECT MAX(EVE_ID) AS EVE_ID FROM EVENTO");
	  $filas=oci_fetch_array($select_Id_Eve,OCI_BOTH);
	  $eve_Id= $filas["EVE_ID"];
																																																																												
	
	
       $nro_Part=1;
       while ($nro_Part <=  $nro_Participantes){
	
	           /* se toman los participantes del formulario pasado, al estar impresos los TextField dentro de un while, resulta necesario
	           colocarlos con asi Participante_1, Participante_2 y asi sucesivamente */
	 
        	$par_id=$_POST['Id_'.$nro_Part];
	        $par_nombre=$_POST['Participante_'.$nro_Part];
	
	        if(trim($par_id)=='')
	        {
	              // se insertan los participantes que no tienen id, lo cual refleja que no estan incluidos en la Base de datos y        no se                  incluyeron del combobox que los mostraba todos.			
		           $insert_Part= sql("INSERT INTO PARTICIPANTE (PAR_ID, PAR_NOMBRE) VALUES (AUTO_INC_participante.NEXTVAL,'$par_nombre')");
				
	             //se selecciona el ultimo participante creado
		         // se selecciona el ultimo evento creado
		         $select_Id_Par= sql("SELECT MAX(PAR_ID) AS PAR_ID FROM PARTICIPANTE");
	             $filasP	=oci_fetch_array($select_Id_Par,OCI_BOTH);
	             $par_Id= $filasP["PAR_ID"]; 
												
		         // insercion en la tabla PAR_EVE con el ultimo id del participante y evento
	             $insertpe= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_Id,0,0)");
		
             }
            else
             {
				// si el participante ya existe lo inserto en par_eve SOLAMENTE
		
			    $insertpee= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_id,0,0)");
			
			
			
              }
               
				$nro_Part++;
}

}


if ($tipo_Ganador==='tabla_Resultados'){ 
 $nro_Resultados= $_POST["nro_Resultados"];

      // Si el tipo de ganador es con tabla de resultados , se hace el insert con 1 como valor predefinido.	
	   $insert_Eve= sql("INSERT INTO EVENTO (eve_id ,eve_nombre, eve_status,eve_fecha,eve_nro_part ,eve_nro_gan ,eve_tipo_pago ,eve_fk_id_admin, eve_fk_id_categoria) VALUES		                                                      								(AUTO_INC_EVENTO.NEXTVAL,'$desc_Evento','Activo',TO_DATE('$fecha_Evento','YYYY-MM-DD'),'$nro_Participantes','$nro_Resultados',2,'$admin_cedula','$cat_Id')");
	
	   // se selecciona el ultimo evento creado
      $select_Id_Eve= sql("SELECT MAX(EVE_ID) AS EVE_ID FROM EVENTO");
	  $filas=oci_fetch_array($select_Id_Eve,OCI_BOTH);
	  $eve_Id= $filas["EVE_ID"];

      $nro_Part=1;
      while ($nro_Part <=  $nro_Participantes){
	
	 		$par_id=$_POST['Id_'.$nro_Part];
			$tope_Apuesta=$_POST['tope_Apuesta_'.$nro_Part]; 
			$par_nombre=$_POST['Participante_'.$nro_Part];
		    $tipo_Pago2=$_POST['tipo_Pago_'.$nro_Part]; 
			
		
			
			switch ($tipo_Pago2)
					{
						case 0: break;
						case 1: $tipo_Pago2=2; break; 
						case 2: $tipo_Pago2=1; break;
						case 3: $tipo_Pago2=3; break;
						case 4: $tipo_Pago2=4; break;
						case 5: $tipo_Pago2=5; break;
						case 6: $tipo_Pago2=6; break;
						case 7: $tipo_Pago2=7; break;
						case 8: $tipo_Pago2=8; break;
						case 9: $tipo_Pago2=9; break;
						case 10: $tipo_Pago2=10; break;
					}

			
			
           
	if(trim($par_id)=='')
	{
				 // se insertan los participantes que no tienen id, lo cual refleja que no estan incluidos en la Base de datos y        no se                  incluyeron del combobox que los mostraba todos.			
		           
				   $insert_Part= sql("INSERT INTO PARTICIPANTE (PAR_ID, PAR_NOMBRE) VALUES (AUTO_INC_participante.NEXTVAL,'$par_nombre')");
				   
				
				    $select_Id_Part= sql("SELECT MAX(PAR_ID) AS PAR_ID FROM PARTICIPANTE");
	                $filasP	=oci_fetch_array($select_Id_Part,OCI_BOTH);
	                $par_Id= $filasP["PAR_ID"]; 
				
				//SI el participante no es especial no se llenaron los campos, se le asigna 0 a esos campos para poder insertarlos
				
				
	    		if ($tope_Apuesta == '')
				{
				    $insertpe= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_Id,$tipo_Pago2,0)");
				}
				    // insercion en la tabla PAR_EVE con el ultimo id del participante y evento
	            else
				{
				 //llenar la tabla intermedia con el id del participante y el id del evento y tope_apuesta = $tope_apuesta
					$insertpe2= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_Id,$tipo_Pago2,$tope_Apuesta)");
				}
				
				
				
}
else
{	
				
            	if ($tope_Apuesta == '')
				{
		             $insertpe= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_id,$tipo_Pago2,0)");
				}
				    // insercion en la tabla PAR_EVE con el ultimo id del participante y evento
	            else
				{
				 //llenar la tabla intermedia con el id del participante y el id del evento y tope_apuesta = $tope_apuesta
					$insertpe2= sql("INSERT INTO PAR_EVE (pe_fk_eve_id, pe_fk_par_id, pe_tipo_pago,  pe_top_apuesta ) VALUES ($eve_Id,$par_id,$tipo_Pago2,$tope_Apuesta)");
				
				
			     }
           

}
$nro_Part++; 
 //TOMAS LOS PARTICIPANTESSSS
}

}


guardarXmlEvento();
//guardarXmlParticipante();
?>



<legend></legend>
	  
	  
  <!--        AQUI  LO QUE DEBERIA DE IR EN EL INSERT A LA BD     -->	
	  
		  
	


	


<table align="center">
	<tr>
	
 		<!--META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"--> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace</p>
			<p align="center" class="Estilo2"><a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
</body>
</html>