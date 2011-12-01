<?PHP
/** 
*
* @Confirmacion de modificacion de administradores
* 
* @autor: Eleany Garcia
* Página que confirma las modificaciones realizadas a un administrador (hace el update) y redirecciona a home
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
	
<?php
	$admin_cedula = $_POST['admin_cedula'];
	$admin_login = $_POST['admin_login'];
	$admin_contrasena = $_POST['admin_contrasena'];
	$admin_nombre = $_POST['admin_nombre'];
	$admin_apellido = $_POST['admin_apellido'];
	$admin_status = $_POST['admin_status'];
 
  	$query = sql("UPDATE administrador SET admin_login='$admin_login', admin_status='$admin_status', admin_contrasena='$admin_contrasena',admin_nombre= '$admin_nombre', admin_apellido='$admin_apellido' WHERE  $admin_cedula=".$admin_cedula);
   	guardarXml();
  ?>

<table align="center">
	<tr>
	
 		<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Modificacion Realizada con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
            
	</tr>

</body>
