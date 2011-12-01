<?PHP

/** 
*
* @Confirmacion de eliminacion de eventos
* 
* @autor: Eleany Garcia
* Página de confirmacion de eliminacion de eventos se confirma la eliminacion
se realiza el delete de la BD y se redirecciona a la pagina de inicio
*
*/

session_start();
include_once("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlEvento.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<span class="Estilo1">
<?php
    $eve_id =  $_POST['eve_id'];
 
	$eliminar_Eve = sql ("DELETE FROM evento WHERE eve_id= ".$eve_id);
	guardarXmlEvento();
?>



<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>EVENTO ELIMINADO EXITOSAMENTE!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>