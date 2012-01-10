<?php
class CategoriasModel
{
	protected $db;
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	public function listarCategorias()
	{
		$categorias=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from categoria");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['cat_id']=$row['CAT_ID'];
			$fila['cat_nombre']=$row['CAT_NOMBRE'];
			$categorias[]=$fila;	
			}
		}			
		catch(PDOException $e)
		{
			echo $e;
		}
		return $categorias;		
	}
	
	public function ingresarCategoria($nombre) 
	{
		$categorias=array();
		try{
			$consulta="INSERT INTO categoria (CAT_ID,CAT_NOMBRE) VALUES (AUTO_INC_categoria.NEXTVAL,'".$nombre."')";
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
	
	public function modificarCategoria($id,$nombre) 
	{
		$categorias=array();
		try{
			$consulta="UPDATE categoria  SET CAT_NOMBRE='".$nombre."' WHERE CAT_ID=".$id;
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
	
	public function eliminarCategoria($id) 
	{
		try{
			$consulta="delete from categoria WHERE CAT_ID=".$id;
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
	
	
	public function buscarCategoriasSinEventos()
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from categoria left outer join evento on (cat_id=eve_fk_id_categoria) where eve_fk_id_categoria is null");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['cat_id']=$row['CAT_ID'];
			$fila['cat_nombre']=$row['CAT_NOMBRE'];
			$categorias[]=$fila;	
			}
			//print_r($eventos);
		}	
		catch(PDOException $e)
		{
			echo $e;
		}
		return $categorias;		
	}
	
	public function buscarCategoriaPorId($cat_id)
	{
		$filas=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT CAT_ID, CAT_NOMBRE FROM CATEGORIA WHERE CAT_ID= '$cat_id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['cat_id']=$row['CAT_ID'];
				$fila['cat_nombre'] = $row['CAT_NOMBRE']; 
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
	
}
?>