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
		$selec_Id_Eve= sql("SELECT EVE_NOMBRE, EVE_NRO_GAN, EVE_FECHA, EVE_TIPO_PAGO, EVE_NRO_PART FROM EVENTO WHERE EVE_ID= '$eve_id'");
	  
	  	while($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   	{	
			$fila['eve_nombre'] = $roweve2['EVE_NOMBRE']; 
	        $fila['eve_nro_gan'] = $roweve2['EVE_NRO_GAN'];
			$fila['eve_fecha'] = $roweve2['EVE_FECHA'];
			$fila['eve_tipo_pago'] = $roweve2['EVE_TIPO_PAGO'];
			$fila['eve_nro_part'] = $roweve2['EVE_NRO_PART'];
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
   $actualiza_Eve = sql("UPDATE evento SET eve_nombre='$eve_nombre', eve_fecha = TO_DATE('$fecha_Evento', 'YYYY-MM-DD'), eve_nro_part ='$eve_nro_part', eve_nro_gan ='$eve_nro_gan' WHERE eve_id= ".$eve_id);		
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
		
		
		

		




?>