<?PHP

/** 
*
* @Confirmacion de eliminacion de casas de apuestas
* 
* @autor: Eleany Garcia
* Página de confirmacion de eliminacion de casas de apuestas se confirma la eliminacion
se realiza el delete de la BD y se redirecciona a la pagina de inicio
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<span class="Estilo1">
<?php
    $casapu_id =  $_POST['casapu_id'];
 
	$eliminar_Cat = sql ("DELETE FROM casa_apuesta WHERE casapu_id= ".$casapu_id);
	
?>


<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>CASA DE APUESTA ELIMINADA EXITOSAMENTE!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>