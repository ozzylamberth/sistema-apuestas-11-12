<?php
class ItemsControllerListar
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
	public function listar()
	{
		//Incluye el modelo que corresponde
		require 'models/ItemsModelListar.php';
		
		//Creamos una instancia de nuestro "modelo"
		$items = new ItemsModelListar();
	
		//Le pedimos al modelo todos los items
		$listado = $items->listadoTotal();

		//Pasamos a la vista toda la información que se desea representar
		$data['list'] = $listado;
		
		//Finalmente presentamos nuestra plantilla
		$this->view->show("listarganadores.php", $data);
	}
}
?>