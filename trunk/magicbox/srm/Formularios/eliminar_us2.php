<?PHP

/** 
*
* @Confirmacion de eliminacion de administradores (usuarios)
* 
* @autor: Eleany Garcia
* Página de confirmacion de eliminacion de administradores se confirma la eliminacion
se realiza el delete de la BD y se redirecciona a la pagina de inicio
*
*/

session_start();
include_once("DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<span class="Estilo1">
<?php
    $admin_cedula =  $_POST['ADMIN_CEDULA'];
 
	$eliminar_Adm = sql("DELETE FROM administrador WHERE admin_cedula= ".$admin_cedula);
	guardarXml();
	

?>

<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>ADMINISTRADOR ELIMINADO EXITOSAMENTE!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>