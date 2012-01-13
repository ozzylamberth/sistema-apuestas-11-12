<?php
/* Clase creada para el index,  lo instacia, y se hace el metodo Test view*/

class IndexController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
    
    //Accion index
    public function index()
    {
        echo "Controlador Index";
    }
    
    public function testView()
    {
        $vars['nombre'] = "Federico";
        $vars['lugar'] = $this->getLugar();
        $this->view->show("test.php", $vars);
    }
    
    private function getLugar()
    {
        return "Venezuela, Caracas";
    }
}
?>