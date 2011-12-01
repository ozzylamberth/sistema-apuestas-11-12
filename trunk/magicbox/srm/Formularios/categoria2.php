<?Php

include_once ("../DataConexion/conexion.php");
session_start();
$usuario= $_SESSION['usuario'];
$cat_nombre= $_POST["cat_nombre"];

require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

?>
		<head>
	

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		<title>
		<strong>Registro de Categoria</strong>
		</title>
		
		</head>

                 <body>

					
				

<form action=".php" name=""  id="" method="post">

<fieldset>
<legend><strong> Registro Realizado </strong></legend>

<!--        AQUI  LO QUE DEBERIA DE IR EN EL INSERT A LA BD     -->	
	<?php
	
	
	
	
	     $validar_Existe=sql("SELECT cat_id FROM categoria where cat_nombre LIKE '$cat_nombre'");
									   $fila=oci_fetch_array($validar_Existe,OCI_BOTH);
                                       $existe=oci_num_rows($validar_Existe);
									   
		
		
		if ($existe > 0)
		{
			//MOSTRAR UN MNSAJE DE ERRROR!!!
		$log->error("Esta agregando una categoria que ya existe"); 	
		echo "La Categoria ya existe en los registros, verifica cuidadosamente la informacion e intenta nuevamente";
		?>
		<td colspan="3"><a href="home.php"><h5 align="center">Salir</h5></a></td>
		
		
		<?PHP
		exit(0);
		}
		else
		{
			$insertar_Cat= sql("insert into categoria values (AUTO_INC_categoria.NEXTVAL,'$cat_nombre')");
			
		
	?>
	</fieldset>


<table align="center">
	<tr>
	
		<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
           
		
	</tr>
	<?PHP
		}

?>	



</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
	