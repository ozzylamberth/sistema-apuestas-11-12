<?php
class MaquinasModel
{
	protected $db;
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	
	public function ingresarMaquina($latitud,$longitud,$maq_marca,$maq_modelo,$maq_memoria,$maq_procesador,$maq_medidas,$maq_tarj_mem,$maq_cap_disco) 
	{
		$categorias=array();
		try{
			$consulta="insert into maquina_apuesta values (AUTO_INC_categoria.NEXTVAL,'Activo','".$longitud."','".$latitud."','".$maq_marca."','".$maq_modelo."','".$maq_memoria."','".$maq_procesador."','".$maq_medidas."','".$maq_tarj_mem."','".$maq_cap_disco."')";
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
	
	public function listarMaquinas()
	{
		$categorias=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from maquina_apuesta");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['maq_id']=$row['MAQ_ID'];
				$fila['maq_status'] = $row['MAQ_STATUS']; 
				$fila['maq_longitud'] = $row['MAQ_LONGITUD'];
				$fila['maq_latitud'] = $row['MAQ_LATITUD'];
				$fila['maq_marca'] = $row['MAQ_MARCA'];
				$fila['maq_modelo'] = $row['MAQ_MODELO'];
				$fila['maq_memoria']= $row['MAQ_MEMORIA'];
				$fila['maq_procesador'] = $row['MAQ_PROCESADOR'];
				$fila['maq_cap_disco'] = $row['MAQ_CAP_DISCO'];
				$fila['maq_medidas'] = $row['MAQ_MEDIDAS'];
				$fila['maq_tarj_mem']= $row['MAQ_TARJ_MEM'];
				$maquinas[]=$fila;	
			}
		}			
		catch(PDOException $e)
		{
			echo $e;
		}
		return $maquinas;		
	}
	
	public function listarMaquinasActivas()
	{
		$categorias=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from maquina_apuesta where MAQ_STATUS LIKE 'Activo'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['maq_id']=$row['MAQ_ID'];
				$fila['maq_status'] = $row['MAQ_STATUS']; 
				$fila['maq_longitud'] = $row['MAQ_LONGITUD'];
				$fila['maq_latitud'] = $row['MAQ_LATITUD'];
				$fila['maq_marca'] = $row['MAQ_MARCA'];
				$fila['maq_modelo'] = $row['MAQ_MODELO'];
				$fila['maq_memoria']= $row['MAQ_MEMORIA'];
				$fila['maq_procesador'] = $row['MAQ_PROCESADOR'];
				$fila['maq_cap_disco'] = $row['MAQ_CAP_DISCO'];
				$fila['maq_medidas'] = $row['MAQ_MEDIDAS'];
				$fila['maq_tarj_mem']= $row['MAQ_TARJ_MEM'];
				$maquinas[]=$fila;	
			}
		}			
		catch(PDOException $e)
		{
			echo $e;
		}
		return $maquinas;		
	}
	

	public function obtenerDatosMaquinaId($maq_id)
	{
		$categorias=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from maquina_apuesta where MAQ_ID = '$maq_id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['maq_id']=$row['MAQ_ID'];
				$fila['maq_status'] = $row['MAQ_STATUS']; 
				$fila['maq_longitud'] = $row['MAQ_LONGITUD'];
				$fila['maq_latitud'] = $row['MAQ_LATITUD'];
				$fila['maq_marca'] = $row['MAQ_MARCA'];
				$fila['maq_modelo'] = $row['MAQ_MODELO'];
				$fila['maq_memoria']= $row['MAQ_MEMORIA'];
				$fila['maq_procesador'] = $row['MAQ_PROCESADOR'];
				$fila['maq_cap_disco'] = $row['MAQ_CAP_DISCO'];
				$fila['maq_medidas'] = $row['MAQ_MEDIDAS'];
				$fila['maq_tarj_mem']= $row['MAQ_TARJ_MEM'];
				$maquinas[]=$fila;	
			}
			
			//print_r($fila);
		}			
		catch(PDOException $e)
		{
			throw $e;
			echo $e;
		}
		return $maquinas;		
	}


	
	public function desactivarMaquina($maq_id)
	{
		$filas = array();	
		try
		{
			//realizamos la consulta de todos los items
			$consulta="update maquina_apuesta set MAQ_STATUS='Inactivo' where MAQ_ID=".$maq_id;
			$this->db->exec($consulta);
			$retorno='true';
		}
		catch(PDOException $e)
		{
			throw $e;
			echo $e;
		}

		return $filas;
	}
	
	
	
	
	
}
?>