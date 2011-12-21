<?php
class ItemsModel 
{
	protected $db;

	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	
	public function listadoTotal()
	{

		$listado=array();
		
		try{
			//realizamos la consulta de todos los items
			$consulta = $this->db->prepare('SELECT * FROM items');
			$consulta->execute();
	
			
			for($i=0; $row = $consulta->fetch(); $i++)
			{
				$item['id_item']=$row['ID_ITEM'];
				$item['item']=$row['ITEM'];
				$listado[]=$item;	
			}
			//print_r($listado);
		}
		catch(PDOException $e)
		{
			echo $e;
		}
			
		return $listado;
	}
}
?>