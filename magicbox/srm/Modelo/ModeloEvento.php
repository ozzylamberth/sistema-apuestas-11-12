<?php 


include_once ("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlEvento.php");

	     function buscarEventos()
	{
		$filas=array();
		$selec_Eve1= sql("select EVE_ID, EVE_NOMBRE, EVE_STATUS, EVE_NRO_PART, EVE_NRO_GAN, EVE_TIPO_PAGO, EVE_FECHA from evento");

    While($rowev1=oci_fetch_array($selec_Eve1,OCI_BOTH)){	
     $fila['eve_id'] = $rowev1['EVE_ID'];
	 $fila['eve_nombre'] = $rowev1['EVE_NOMBRE'];
	 $fila['eve_status']  = $rowev1['EVE_STATUS'];
	 $fila['eve_nro_part'] = $rowev1['EVE_NRO_PART'];
     $fila['eve_nro_gan'] = $rowev1['EVE_NRO_GAN'];
	 $fila['eve_tipo_pago'] = $rowev1['EVE_TIPO_PAGO'];
	 $fila['eve_fecha'] = $rowev1['EVE_FECHA'];
	 
	 $filas[]= $fila;
  
     }
		//print_r($filas);
	    		
		return $filas;
			
	}
	
	function buscarEventosActivos()
	{
		$filas=array();
		$selec_nom_eve= sql("select * from evento WHERE eve_status LIKE 'Activo'");
		
		while($row=oci_fetch_array($selec_nom_eve,OCI_BOTH))
		{
			$fila['id']=$row['EVE_ID'];
			$fila['nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$filas[]=$fila;
		}
		//print_r($filas);
	    		
		return $filas;
			
	}
	// Esta funcion es llamada desde listar ganadores de un evento para que en el combo muestre los inactivos
	
	function buscarEventosInactivos()
	{
		$filas=array();
		$selec_nom_eve= sql("select * from evento WHERE eve_status LIKE 'Inactivo'");
		
		while($row=oci_fetch_array($selec_nom_eve,OCI_BOTH))
		{
			$fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$filas[]=$fila;
		}
		//print_r($filas);
	    		
		return $filas;
			
	}
	
	
	
	
	function buscarEventoPorNombre($eve_nombre)
	{
		$selec_id= sql( "SELECT EVE_ID FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	   	$id= oci_fetch_array($selec_id,OCI_BOTH);
	   	$eve_id= $id['EVE_ID'];
  
		return $eve_id;
	}
	
	function buscarEventoPorId($eve_id)
	{
		$filas=array();
		$selec_Id_Eve= sql("SELECT EVE_NOMBRE, EVE_NRO_GAN, EVE_FECHA, EVE_TIPO_PAGO, EVE_NRO_PART, EVE_STATUS FROM EVENTO WHERE EVE_ID= '$eve_id'");
	  
	  	while($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   	{	
			$fila['eve_nombre'] = $roweve2['EVE_NOMBRE']; 
	        $fila['eve_nro_gan'] = $roweve2['EVE_NRO_GAN'];
			$fila['eve_fecha'] = $roweve2['EVE_FECHA'];
			$fila['eve_tipo_pago'] = $roweve2['EVE_TIPO_PAGO'];
			$fila['eve_nro_part'] = $roweve2['EVE_NRO_PART'];
			$fila['eve_status']= $roweve2['EVE_STATUS'];
		  	$filas[]=$fila;
       	}
		
		return $filas;
	  
	}

// se busca el id de la pregunta secreta para posteriormente insertarla en el administrador
	function buscarParticipantesEvento($eve_id)
	{
        $filas=array();
	 	$query=sql("SELECT P.PAR_NOMBRE, PE.PE_TOP_APUESTA, PE.PE_TIPO_PAGO FROM EVENTO E, PAR_EVE PE, PARTICIPANTE P WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND PE.PE_FK_EVE_ID = E.EVE_ID AND E.EVE_ID= '$eve_id'");
	 
	 
	  while($row=oci_fetch_array($query,OCI_BOTH))
		   {
               	$fila['par_nombre'] = $row['PAR_NOMBRE']; 
		       	$fila['pe_top_apuesta'] = $row['PE_TOP_APUESTA']; 
			 	$fila['pe_tipo_pago'] = $row['PE_TIPO_PAGO'];
				$filas[]=$fila;
		   }
		
		return $filas;
	}
	
	
			 function buscarganadoresEvento($eve_id)
		 {
			 
		$selec_Id_Par= sql("SELECT P.PAR_NOMBRE FROM RES_PAR RP, EVENTO E, PARTICIPANTE P WHERE RP.RP_FK_PAR_ID=P.PAR_ID AND RP.RP_FK_EVE_ID=E.EVE_ID AND E.EVE_ID=".$eve_id);	 
			
			while($row=oci_fetch_array($selec_Id_Par,OCI_BOTH))
		{
			$fila['par_nombre']=$row['PAR_NOMBRE'];
			// Se hace un arreglo porque pueden ser varios ganadores 
			
			$filas[]=$fila;
		} 
			 return $filas;
		 }
	
	
	
	
   function eliminarEvento($eve_id)
   {
    $eliminar_Eve = sql ("DELETE FROM evento WHERE eve_id= ".$eve_id);
	guardarXmlEvento();

   }


    // FUNCION QUE ES LLAMADA DESDE LA PÁGINA LISTAR EVENTOS
   function mostraEventos()
   {
   		$queryListaEve = sql("SELECT * FROM evento");
		
           While($row=oci_fetch_array($queryListaEve,OCI_BOTH))
		   {
               $fila['eve_nombre'] = $row['EVE_NOMBRE']; 
			   $fila['eve_status'] = $row['EVE_STATUS']; 
			   $fila['eve_fecha'] = $row['EVE_FECHA']; 
			   $fila['eve_nro_part'] = $row['EVE_NRO_PART']; 
			   $fila['eve_nro_gan'] = $row['EVE_NRO_GAN'];
			   $fila['eve_tipo_pago'] = $row['EVE_TIPO_PAGO'];
			   $filas[]=$fila;
		   }
         return $filas;
   }
   
   
   function actualizarEvento ($eve_id,$eve_nombre,$fecha_Evento,$eve_nro_part,$eve_nro_gan)
   {
   $actualiza_Eve = sql("UPDATE evento SET eve_nombre='$eve_nombre', eve_fecha = TO_DATE('$fecha_Evento', 'YYYY-MM-DD') WHERE eve_id= ".$eve_id);		
		guardarXmlEvento();

   }
   
   // UNCION QUE BUSCA LOS PROXIMOS EVENTOS PARA LISTALOS EN proximos_eventos.php
   	function buscarEventosProximos()
	{
		// Saco la fecha del día para saber cuales son los evetos futuros
		    $fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );
			
			
		$filas=array();
		$selec_nom_eve= sql("select eve_id, eve_nombre, eve_fecha, eve_nro_gan, eve_tipo_pago from evento WHERE eve_fecha > to_date('$fecha', 'yyyy/mm/dd')");
		
		while($row=oci_fetch_array($selec_nom_eve,OCI_BOTH))
		{
			$fila['id']=$row['EVE_ID'];
			$fila['nombre']=$row['EVE_NOMBRE'];
			$fila['fecha']=$row['EVE_FECHA'];
			$fila['ganadores']=$row['EVE_NRO_GAN'];
			$fila['pago']=$row['EVE_TIPO_PAGO'];
			
			
			$filas[]=$fila;
		}
		//print_r($filas);
	    		
		return $filas;
			
	}
		
		
	//////////////////////////////////////////	
	//////////////////////////////////////////
	//////////////////////////////////////////
	//////////////////////////////////////////
	// modif
	////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////
	
	function participantes()
	{
		
	$selec_Parnom = sql("select par_nombre, par_id from participante");
	 
	 			
		    while($row=oci_fetch_array($selec_Parnom,OCI_BOTH))
		     {
			$fila['par_nombre']=$row['PAR_NOMBRE'];
			// Se hace un arreglo porque pueden ser varios ganadores 
			
			$filas[]=$fila;
		     } 
			 return $filas;
		 	
		
		
		
	}
    //seleccionar la cedula del administrador para luego insertarla como clave foranea en el evento
	function administradorEvento($usuario)
	{

		 $select_Admin= sql("select admin_cedula from administrador where admin_login LIKE '$usuario'");
		 $filas=oci_fetch_array($select_Admin,OCI_BOTH);
		 $admin_cedula= $filas['ADMIN_CEDULA'];
		 
		
		 return $admin_cedula;
	}

    function insertarEvento ($admin_cedula,$tipo_Pago,$desc_Evento, $fecha_Evento, $nro_Participantes,$cat_Id)
	{
			// Si el tipo de ganador es 1, se hace el insert con 1 como valor predefinido.
$insert_Eve= sql("INSERT INTO EVENTO (eve_id ,eve_nombre, eve_status,eve_fecha,eve_nro_part ,eve_nro_gan ,eve_tipo_pago ,eve_fk_id_admin, eve_fk_id_categoria) VALUES (AUTO_INC_EVENTO.NEXTVAL,'$desc_Evento','Activo',TO_DATE('$fecha_Evento','YYYY-MM-DD'),'$nro_Participantes',1,'$tipo_Pago','$admin_cedula','$cat_Id')");		                                                    
			
			   // se selecciona el ultimo evento creado
			  $select_Id_Eve= sql("SELECT MAX(EVE_ID) AS EVE_ID FROM EVENTO");
			  $filas=oci_fetch_array($select_Id_Eve,OCI_BOTH);
			  $eve_Id= $filas["EVE_ID"];
																																																																														
			
			
			   $nro_Part=1;
			   while ($nro_Part <=  $nro_Participantes)
			   {
			
					   /* se toman los participantes del formulario pasado, al estar impresos los TextField dentro de un while, resulta necesario
					   colocarlos con asi Participante_1, Participante_2 y asi sucesivamente */
			 
					 $par_id=$_POST['Id_'.$nro_Part];
					$par_nombre=$_POST['Participante_'.$nro_Part];
			
					if(trim($par_id)=='')
					{
						  // se insertan los participantes que no tienen id, lo cual refleja que no estan incluidos en la Base de datos y        no se                  incluyeron                           del combobox que los mostraba todos.			
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
guardarXmlEvento();
	}
	
	 function insertarEvento2 ($admin_cedula,$tipo_Pago,$desc_Evento, $fecha_Evento, $nro_Participantes,$cat_Id)
	{
	
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
guardarXmlEvento();
}




?>
	
	}
	
	
	

?>