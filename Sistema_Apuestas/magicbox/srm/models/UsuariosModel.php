<?php
/*
Modelo de usuarios contiene los metodos para la insercion, seleccion, actualizacion y busqueda de los mismos

*/
class UsuariosModel
{
	protected $db;
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	
	
	// funcion que lista los usuarios activos
	public function listarUsuariosActivos()
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from administrador WHERE admin_status LIKE 'Activo'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['admin_cedula']=$row['ADMIN_CEDULA'];
			$fila['admin_login']=$row['ADMIN_LOGIN'];
			$fila['admin_nombre']=$row['ADMIN_NOMBRE'];
			$fila['admin_pregunta_secreta']=$row['ADMIN_FK_ID_PRE'];
			$fila['admin_respuesta_secreta']=$row['ADMIN_RESP_SECRETA'];
			$fila['admin_contrasena']=$row['ADMIN_CONTRASENA'];
			$eventos[]=$fila;	
			}
			
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $eventos;		
	}
	
	// funcion que lista los usuarios
	public function listarUsuarios()
	{
		$administradores=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from administrador");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['admin_cedula']=$row['ADMIN_CEDULA'];
			$fila['admin_login']=$row['ADMIN_LOGIN'];
			$fila['admin_nombre']=$row['ADMIN_NOMBRE'];
			$fila['admin_apellido']=$row['ADMIN_APELLIDO'];
			$fila['admin_status']=$row['ADMIN_STATUS'];
			$administradores[]=$fila;	
			}
			
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $administradores;		
	}
	
	// funcion que lista las preguntas secretas en la plantillas de creacion de administradores
	public function listarPreguntaSecreta()
	{
		$pregs=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from pregunta_secreta");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['pre_id']=$row['PRE_ID'];
			$fila['pre_des']=$row['PRE_DES'];
			$pregs[]=$fila;	
			}
			//print_r($eventos);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $pregs;		
	}
	
	// Funcion que recupera la clave del usuario 
	public function recuperarClaveUsuario($cedula,$pregunta_secreta,$respuesta_secreta)
	{
		$admins=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from administrador WHERE ADMIN_CEDULA='$cedula' AND ADMIN_FK_ID_PRE='$pregunta_secreta' AND ADMIN_RESP_SECRETA='$respuesta_secreta'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
		    $fila['admin_cedula']=$row['ADMIN_CEDULA'];
			$fila['admin_pregunta_secreta']=$row['ADMIN_FK_ID_PRE'];
			$fila['admin_respuesta_secreta']=$row['ADMIN_RESP_SECRETA'];
			$fila['admin_clave']=$row['ADMIN_CONTRASENA'];
			$admins[]=$fila;	
			}
			//print_r($admins);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		return $admins;		
	}
	
	// funcion que obtiene la pregunta secreta, cuando se esta recuperando la contrasena
	public function obtenerPreguntaSecreta($id)
	{
		$eventos=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("select * from pregunta_secreta WHERE PRE_ID ='$id'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['pre_id']=$row['PRE_ID'];
				$fila['pre_des']=$row['PRE_DES'];
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
	

	// funcion que valida la existencia del administrador
	public function validarExistencia($usuario,$clave)
	{
		$filas=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT * FROM administrador where admin_login='$usuario' and admin_contrasena='$clave'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['admin_cedula']=$row['ADMIN_CEDULA'];
				$fila['admin_pregunta_secreta']=$row['ADMIN_FK_ID_PRE'];
				$fila['admin_respuesta_secreta']=$row['ADMIN_RESP_SECRETA'];
				$fila['admin_clave']=$row['ADMIN_CONTRASENA'];
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
	
	
	// funcion que valida la existencia con la cedula, usada al momento de recuperar la contraseņa
	public function validarExistenciaCedula($admin_cedula)
	{
		$filas=array();
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare("SELECT * FROM administrador where admin_cedula='$admin_cedula'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['admin_cedula']=$row['ADMIN_CEDULA'];
				$fila['admin_pregunta_secreta']=$row['ADMIN_FK_ID_PRE'];
				$fila['admin_respuesta_secreta']=$row['ADMIN_RESP_SECRETA'];
				$fila['admin_clave']=$row['ADMIN_CONTRASENA'];
				$filas[]=$fila;
			}
			//print_r($filas);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		
		return $filas;
	}
	
	// funcion que busca usuarios por la cedula
	public function buscarUsuarioCedula($admin_cedula)
	{
		$filas=array();
		try
		{
			$consulta = $this->db->prepare("SELECT * FROM administrador where admin_cedula='$admin_cedula'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['admin_cedula']=$row['ADMIN_CEDULA'];
				$fila['admin_login']=$row['ADMIN_LOGIN'];
				$fila['admin_nombre']=$row['ADMIN_NOMBRE'];
				$fila['admin_apellido']=$row['ADMIN_APELLIDO'];
				$fila['admin_status']=$row['ADMIN_STATUS'];
				$filas[]=$fila;
			}
			//print_r($filas);
		}
				
		catch(PDOException $e)
		{
			echo $e;
		}
		
		return $filas;
	}
	
	// funcion que busca el administrador por el login y selecciona la cedula
	public function buscarCedulaAdmin($usuario)
	{
		$filas=array();
		try
		{
			$consulta = $this->db->prepare("SELECT * FROM administrador where admin_login='$usuario'");
			$consulta->execute();
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$fila['admin_cedula']=$row['ADMIN_CEDULA'];
				$filas[]=$fila;
			}
		}				
		catch(PDOException $e)
		{
			echo $e;
		}
		
		return $filas;
	}
	
	// funcion que inserta usuario en la BD
	public function ingresarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena,$admin_resp_secreta,$pre_id)
	{
		$filas = array();	
		try
		{
			//realizamos la consulta de todos los items
			$consulta="insert into administrador values ('".$admin_cedula."','".$admin_login."','".$admin_contrasena."','".$admin_resp_secreta."','".$admin_nombre."','".$admin_apellido."','Activo','".$pre_id."')";
			$this->db->exec($consulta);
			$retorno='true';
		}
		catch(PDOException $e)
		{
			echo $e;
		}

		return $filas;
	}
	
	// funcion que desactiva los usuarios administradores
	public function desactivarUsuario($admin_cedula)
	{
		$filas = array();	
		try
		{
			$consulta="update administrador set ADMIN_STATUS='Inactivo' where ADMIN_CEDULA=".$admin_cedula;
			$this->db->exec($consulta);
			$retorno='true';
		}
		catch(PDOException $e)
		{
			echo $e;
		}

		return $filas;
	}
	
	
	// funcion que modifica los administradores
	public function modificarUsuario($admin_cedula,$admin_apellido,$admin_nombre,$admin_login,$admin_contrasena)
	{
		$filas = array();	
		try
		{
			$consulta="update administrador set ADMIN_CEDULA=".$admin_cedula.", ADMIN_LOGIN='".$admin_login."', ADMIN_CONTRASENA='".$admin_contrasena."', ADMIN_NOMBRE='".$admin_nombre."',ADMIN_APELLIDO='".$admin_apellido."' where ADMIN_CEDULA=".$admin_cedula;
			$this->db->exec($consulta);
			$retorno='true';
		}
		catch(PDOException $e)
		{
			echo $e;
		}

		return $filas;
	}
	
}
?>