<?php
session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
?>

<table align='center' border='0'>
	
	<tr>
	<h1> 

	
	<span class="Estilo2" align="center"><span class="Estilo2" align="center">
	</br>
	<div align="center" class="Estilo7"><span class="Estilo2"><span class="Estilo9">GRACIAS POR USAR NUESTROS SERVICIOS</span> 
	

<table width="348" border="0" link="black" align="center">
                        	<tr>
	                            <td align="center">
								</br>
								Estimado Usuario <b> <?PHP echo $usuario?> </b></strong>
                                </br>

			

	
	
<?PHP

include_once('../Contenedores/footer.php');
?>
