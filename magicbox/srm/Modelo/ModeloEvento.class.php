<?php 

class ModeloEvento
{

include_once ("../DataConexion/conexion2.php");

	public function buscarEventosActivos()
	{
		$filas=array();
		$selec_nom_eve= Conexion::sql("select eve_id, eve_nombre from evento WHERE eve_status LIKE 'Activo'");
		
		while($row=oci_fetch_array($selec_nom_eve,OCI_BOTH))
		{
			$fila['id']=$row['EVE_ID'];
			$fila['nombre']=$row['EVE_NOMBRE'];
			$filas[]=$fila;
		}
		//print_r($filas);
	    		
		return $filas;
			
	}
	
	public function buscarEventoPorNombre($eve_nombre)
	{
		$selec_id= sql( "SELECT EVE_ID FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	   	$id= oci_fetch_array($selec_id,OCI_BOTH);
	   	$eve_id= $id['EVE_ID'];
  
		return $eve_id;
	}
	
	public function buscarEventoPorId($eve_id)
	{
		$filas=array();
		$selec_Id_Eve= sql("SELECT EVE_NOMBRE, EVE_NRO_GAN, EVE_FECHA, EVE_TIPO_PAGO FROM EVENTO WHERE EVE_ID= '$eve_id'");
	  
	  	while($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   	{	
			$fila['eve_nombre'] = $roweve2['EVE_NOMBRE']; 
	        $fila['eve_nro_gan'] = $roweve2['EVE_NRO_GAN'];
			$fila['eve_fecha'] = $roweve2['EVE_FECHA'];
			$fila['eve_tipo_pago'] = $roweve2['EVE_TIPO_PAGO'];
		  	$filas[]=$fila;
       	}
		
		return $filas;
	  
	}

// se busca el id de la pregunta secreta para posteriormente insertarla en el administrador
	public function buscarParticipantesEvento($eve_id)
	{
        $filas=array();
	 	$query=sql("SELECT P.PAR_NOMBRE, PE.PE_TOP_APUESTA, PE.PE_TIPO_PAGO FROM EVENTO E, PAR_EVE PE, PARTICIPANTE P WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND PE.PE_FK_EVE_ID = E.EVE_ID AND E.EVE_ID= '$eve_id'");
	 
	 
	  While($row=oci_fetch_array($query,OCI_BOTH))
		   {
               	$fila['par_nombre'] = $row['PAR_NOMBRE']; 
		       	$fila['pe_top_apuesta'] = $row['PE_TOP_APUESTA']; 
			 	$fila['pe_tipo_pago'] = $row['PE_TIPO_PAGO'];
				$filas[]=$fila;
		   }
		
		return $filas;
	}
	
	
}














?>