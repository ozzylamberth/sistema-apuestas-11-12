<?Php
include_once ("../DataConexion/conexion.php");
session_start();
$usuario= $_SESSION['usuario'];
$casapu_nombre= $_POST["casapu_nombre"];
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
		<strong>Registro de Casa De Apuesta</strong>
		</title>
		
		</head>

                 <body>

					
				

<form action=".php" name=""  id="" method="post">

<fieldset>
<legend><strong> Registro Realizado </strong></legend>

<!--        AQUI  LO QUE DEBERIA DE IR EN EL INSERT A LA BD     -->	
	<?php
		
	     $validar_Existencia=sql("select * from casa_apuesta where casapu_nombre LIKE '$casapu_nombre'");
         $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		  $filas=oci_num_rows($validar_Existencia);
		 
         if ($filas > 0)
		{
		$log->error("Esta agregando una casa de apuestas que ya existe"); 
		echo "La Categoria ya existe en los registros, verifica cuidadosamente la informacion e intenta nuevamente";
		?>
		<td colspan="3"><a href="home.php"><h5 align="center">Continuar</h5></a></td>
		
		
		<?PHP
		exit(0);
		}
		else
		{ 
		
		$insertar_Cat= sql("insert into casa_apuesta values (AUTO_INC_casa_apuesta.NEXTVAL,'$casapu_nombre')");
														  
		?>
	</fieldset>


<table align="center">
	<tr>
	
		<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='/magicbox/MenuOperativo2.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
      
	</tr>
	<?PHP
		} 

?>	



</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
	