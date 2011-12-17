<?php
session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
?><style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}
-->
</style>

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
								<p>Estimado Usuario <b> <?PHP echo $usuario?> </b></p>
								<p>&nbsp;</p>
								<p><img src="../Imagenes/CASAAPUESTASOG.gif" width="920" height="90" alt="IMAGE" /></strong>
								  </br>
								  
								  
								  
								  
								  
								  </p>
								<?PHP

include_once('../Contenedores/footer.php');
?>
