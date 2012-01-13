<?php
/*Modelo de eventos, contiene la insercion, el listado, la eliminacion y modificacion de los eventos
que se manejan */

class EventosModel
{
	protected $db;
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	
	// Funcion que lista los eventos inactivos
	public function listadoTotal()
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from evento WHERE eve_status LIKE 'Inactivo'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$eventos[]=$fila;	
			}
			
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que busca los eventos activos
	public function buscarEventosActivos()
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from evento WHERE eve_status LIKE 'Activo'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$fila['eve_tipo_pago']=$row['EVE_TIPO_PAGO'];
			$fila['eve_status']=$row['EVE_STATUS'];
			$fila['eve_cat_id']=$row['EVE_FK_ID_CATEGORIA'];
			$fila['eve_admin_cedula']=$row['EVE_FK_ID_ADMIN'];			
			$eventos[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que lista todos los eventos
	public function listarEventosTodos() 
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from evento");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$fila['eve_tipo_pago']=$row['EVE_TIPO_PAGO'];
			$fila['eve_status']=$row['EVE_STATUS'];
			$eventos[]=$fila;	
			}
			
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que lista los eventos sin resultados
	public function listarEventosSinResultados()
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from evento e left outer join res_par rp on (rp.RP_FK_EVE_ID=e.EVE_ID) where RP_FK_EVE_ID is null");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_fecha']=$row['EVE_FECHA'];
			$fila['eve_nro_part']=$row['EVE_NRO_PART'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$fila['eve_tipo_pago']=$row['EVE_TIPO_PAGO'];
			$fila['eve_status']=$row['EVE_STATUS'];
			$eventos[]=$fila;	
			}
			
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	public function listarEventosResultados()  // esta funcion lista los eventos donde la cantidad de resultados ingresados es menor que la de ganadores
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select e.eve_id, e.eve_nombre, e.eve_nro_gan, count(rp_fk_res_id) as nro_resultados
											from evento e left outer join res_par rp on (rp.RP_FK_EVE_ID=e.EVE_ID)
											group by e.eve_id, e.eve_nombre, e.eve_nro_gan
											having count(rp_fk_res_id) < e.eve_nro_gan");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['eve_id']=$row['EVE_ID'];
			$fila['eve_nombre']=$row['EVE_NOMBRE'];
			$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
			$fila['eve_nro_resultados']=$row['NRO_RESULTADOS'];
			$eventos[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que lista los datos de  un evento
	public function datosEvento($id)
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from evento WHERE eve_status LIKE 'Inactivo'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['eve_id']=$row['EVE_ID'];
				$fila['eve_nombre']=$row['EVE_NOMBRE'];
				$fila['eve_fecha']=$row['EVE_FECHA'];
				$fila['eve_nro_part']=$row['EVE_NRO_PART'];
				$fila['eve_nro_gan']=$row['EVE_NRO_GAN'];
				$eventos[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que obtiene el ultimo id insertado
	public function obtenerIdEvento()
	{
		$eve_id=0;
		try{
			$consulta = $this->db->prepare("SELECT max(EVE_ID) as EVE_ID from evento");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$eve_id=$row['EVE_ID'];	
			}
		}
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eve_id;		
	}
	
	
	// funcion que inserta eventos
	public function insertarEvento($admin_cedula,$eve_tipo_pago,$eve_desc, $eve_fecha, $eve_nro_par,$eve_categoria_id,$eve_nro_gan,$participantes) 
	{
		$categorias=array();
		try{
		echo	$consulta="INSERT INTO evento (EVE_ID,EVE_NOMBRE,EVE_STATUS,EVE_FECHA,EVE_NRO_PART,EVE_NRO_GAN,EVE_TIPO_PAGO,EVE_FK_ID_ADMIN,EVE_FK_ID_CATEGORIA) VALUES (AUTO_INC_evento.NEXTVAL,'".$eve_desc."','Activo',to_date('".$eve_fecha."','YYYY-MM-DD'),".$eve_nro_par.",".$eve_nro_gan.",".$eve_tipo_pago.",".$admin_cedula.",".$eve_categoria_id.")";
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que elimina eventos
	public function eliminarEvento($eve_id) 
	{
		try{
			$consulta="delete from evento where EVE_ID=".$eve_id;
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que elimina participantes de un evento
	public function eliminarParticipantesEvento($eve_id) 
	{
		$categorias=array();
		try{
			$consulta="delete from par_eve where PE_FK_EVE_ID=".$eve_id;
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que elimina participantes
	public function eliminarParticipantes($eve_id) 
	{
		$categorias=array();
		try{
			$consulta="delete from participante where par_id in
(select par_id from participante left outer join par_eve on (pe_fk_par_id=par_id) where pe_fk_eve_id is null)";
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que modifica eventos
	public function modificarEvento($eve_id, $eve_nombre, $eve_fecha) 
	{
		$categorias=array();
		try{
			$consulta="update evento set EVE_NOMBRE='".$eve_nombre."',EVE_FECHA=to_date('".$eve_fecha."','YYYY-MM-DD') where EVE_ID=".$eve_id;
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que desactiva eventos
	public function desactivarEvento($eve_id) 
	{
		$categorias=array();
		try{
			$consulta="update evento set EVE_STATUS='Inactivo' where EVE_ID=".$eve_id;
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que busca eventos por id
	public function buscarEventoPorId($eve_id)
	{
		$filas=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT EVE_ID, EVE_NOMBRE, EVE_NRO_GAN, EVE_FECHA, EVE_TIPO_PAGO, EVE_NRO_PART, EVE_STATUS FROM EVENTO WHERE EVE_ID= '$eve_id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['eve_id']=$row['EVE_ID'];
				$fila['eve_nombre'] = $row['EVE_NOMBRE']; 
				$fila['eve_nro_gan'] = $row['EVE_NRO_GAN'];
				$fila['eve_fecha'] = $row['EVE_FECHA'];
				$fila['eve_tipo_pago'] = $row['EVE_TIPO_PAGO'];
				$fila['eve_nro_part'] = $row['EVE_NRO_PART'];
				$fila['eve_status']= $row['EVE_STATUS'];
				$filas[]=$fila;
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		
		return $filas;
	}
	
	// funcion que inserta los participantes de un evento
	public function ingresarParticipantesEvento($eve_id,$participantes)
	{
		try{ 
			foreach($participantes as $clave=>$valor)
			{
				$par_id=$valor['par_id'];
				$par_nombre=$valor['par_nombre'];
				$tipo_pago=$valor['tipo_pago'];
				$tope_apuesta=$valor['tope_apuesta'];
					
					if(trim($par_id)=='')
					{
						$this->insertarParticipante($par_nombre);
						$par_id_new=$this->obtenerIdParticipante();
						$this->insertarParticipanteEvento($par_id_new,$eve_id,$tipo_pago,$tope_apuesta);
					}
					else
					{
						$this->insertarParticipanteEvento($par_id,$eve_id,$tipo_pago,$tope_apuesta);
					}
			}
			
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;	
	}
	
	// funcion que inserta participantes
	private function insertarParticipante($nombre) 
	{
		try{
			$consulta="INSERT INTO participante (PAR_ID,PAR_NOMBRE) VALUES (AUTO_INC_participante.NEXTVAL,'".$nombre."')";
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que obtiene el ID del ultimo participante insertado
	private function obtenerIdParticipante()
	{
		$par_id=0;
		try{
			$consulta = $this->db->prepare("SELECT max(PAR_ID) as PAR_ID from participante");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$par_id=$row['PAR_ID'];	
			}
		}
		catch(PDOException $e)
		{
			echo $e;
		}
		return $par_id;		
	}
	
	// funcion que inserta los participantes de un evento
	public function insertarParticipanteEvento($par_id,$eve_id,$tipo_pago,$tope_apuesta) 
	{
		$categorias=array();
		try{
			$consulta="INSERT INTO par_eve (PE_FK_EVE_ID,PE_FK_PAR_ID,PE_TIPO_PAGO,PE_TOP_APUESTA) VALUES (".$eve_id.",".$par_id.",".$tipo_pago.",".$tope_apuesta.")";
			$this->db->exec($consulta);
			$retorno='true';
		}	
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	
	// funcion que inserta en la tabla resultado
	public function insertarResultado($descripcion) 
	{
		try{
			$consulta="INSERT INTO resultado (RES_ID,RES_RESULTADO) VALUES (AUTO_INC_resultado.NEXTVAL,'".$descripcion."')";
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que obtiene el ultimo resultado insertado
	public function obtenerIdResultado()
	{
		$res_id=0;
		try{
			$consulta = $this->db->prepare("SELECT max(RES_ID) as RES_ID from resultado");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$res_id=$row['RES_ID'];	
			}
		}
		catch(PDOException $e)
		{
			echo $e;
		}
		return $res_id;		
	}
	
	
	// funcion que inserta los ganadores de un evento
	public function insertarGanadoresEvento($res_id,$eve_id,$par_id) 
	{
		$categorias=array();
		try{
			$consulta="INSERT INTO res_par (RP_FK_EVE_ID,RP_FK_PAR_ID,RP_FK_RES_ID) VALUES (".$eve_id.",".$par_id.",".$res_id.")";
			$this->db->exec($consulta);
			$retorno='true';
		}		
		catch(PDOException $e)
		{
			echo $e;
			$retorno='false';
		}
		return $retorno;		
	}
	
	// funcion que busca los ganadores de un evento por Id
	public function buscarGanadoresEvento($eve_id)
	{
		$filas = array();	
		try
		{
		//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT P.PAR_NOMBRE FROM RES_PAR RP, EVENTO E, PARTICIPANTE P WHERE RP.RP_FK_PAR_ID=P.PAR_ID AND RP.RP_FK_EVE_ID=E.EVE_ID AND E.EVE_ID='$eve_id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['par_nombre']=$row['PAR_NOMBRE'];
				$filas[]=$fila;
				// Se hace un arreglo porque pueden ser varios ganadores 
			}
		}
		catch(PDOException $e)
		{
			echo $e;
		}
		
		return $filas;
	}
	
	// se buscan los participantes de un evento
	public function buscarParticipantesEvento($eve_id)
	{
		$filas = array();	
		try
		{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT P.PAR_ID, P.PAR_NOMBRE, PE.PE_TOP_APUESTA, PE.PE_TIPO_PAGO FROM EVENTO E, PAR_EVE PE, PARTICIPANTE P WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND PE.PE_FK_EVE_ID = E.EVE_ID AND E.EVE_ID= '$eve_id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['par_id'] = $row['PAR_ID'];
               	$fila['par_nombre'] = $row['PAR_NOMBRE']; 
		       	$fila['pe_top_apuesta'] = $row['PE_TOP_APUESTA']; 
			 	$fila['pe_tipo_pago'] = $row['PE_TIPO_PAGO'];
				$filas[]=$fila;
			}
		}
		catch(PDOException $e)
		{
			echo $e;
		}

		return $filas;
	}
	
	// Listar todos los participantes 
	public function listarParticipantes()
	{
		$par=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from participante");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['par_id']=$row['PAR_ID'];
				$fila['par_nombre']=$row['PAR_NOMBRE'];
				$par[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $par;		
	}

	// Listar Participantes de Eventos Activos
	public function listarParticipantesEventosActivos()
	{
		$par=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select distinct(par_id),par_nombre, pe_tipo_pago, pe_top_apuesta, pe_fk_eve_id from participante join par_eve on (pe_fk_par_id=par_id) join evento on (pe_fk_eve_id=eve_id) where eve_status like 'Activo' order by par_id");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['par_id']=$row['PAR_ID'];
				$fila['par_nombre']=$row['PAR_NOMBRE'];
				$fila['par_tipo_pago']=$row['PE_TIPO_PAGO'];
				$fila['par_tope_apuesta']=$row['PE_TOP_APUESTA'];
				$fila['par_eve_id']=$row['PE_FK_EVE_ID'];
				$par[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $par;		
	}
	

}
?>