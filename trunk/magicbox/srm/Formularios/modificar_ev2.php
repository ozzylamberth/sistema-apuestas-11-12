<?PHP
/** 
*
* @Confirmacion de modificacion de eventos
* 
* @autor: Irene Soto
* Página que confirma las modificaciones realizadas a un evento (hace el update) y redirecciona a home
*
*/


session_start();
include_once("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlEvento.php");

$eve_id = $_POST['eve_id'];
$eve_nombre = $_POST['eve_nombre'];
$fecha_Evento=$_POST['fecha_Evento'];

$eve_nro_part= $_POST['eve_nro_part'];
$eve_nro_gan= $_POST['eve_nro_gan'];

?>

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.Estilo1 strong {
	font-size: x-large;
	font-family: "Comic Sans MS", cursive;
	color: #800;
}
.Estilo2 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
-->
</style><body bgcolor="white">
	

<?php	
		$actualiza_Eve = sql("UPDATE evento SET eve_nombre='$eve_nombre', eve_fecha = TO_DATE('$fecha_Evento', 'YYYY-MM-DD'), eve_nro_part ='$eve_nro_part', eve_nro_gan ='$eve_nro_gan' WHERE eve_id= ".$eve_id);		
		guardarXmlEvento();
		
?>
  
  <table align="center">
	<tr>
	
 		<!--META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"--> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Modificacion Realizada con Exito!!! </strong></p>
			<p align="center" class="Estilo2"><span class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>
			</a></span></p>
			<p align="center" class="Estilo2"><span class="Estilo2"><a href='home.php' class="Estilo1">Regresar al Menu Principal</a></span><a href='home.php' class="Estilo1"></a></p>
			<p align="center" class="Estilo2">&nbsp;</p>
			<p align="center" class="Estilo2"><img src="../Imagenes/ca1.jpg" width="995" height="291" alt="ima"></p>
            
			
  </tr>


</body>

									  


