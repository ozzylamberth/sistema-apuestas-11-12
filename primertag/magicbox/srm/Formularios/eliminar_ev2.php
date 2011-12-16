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

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.Estilo1 strong {
	font-family: Cooper Black;
	font-size: large;
	color: #700;
}
.Estilo2 {
	font-family: "Lucida Console", Monaco, monospace;
}
-->
</style><body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<span class="Estilo1">
<?php
    $eve_id =  $_POST['eve_id'];
 
	$eliminar_Eve = sql ("DELETE FROM evento WHERE eve_id= ".$eve_id);
	guardarXmlEvento();
?>

<table align="center" width="200" height="439" border="">
<tr>  
          <th width="150" scope="col"><p align="center" class="Estilo1"><strong>EVENTO ELIMINADO EXITOSAMENTE!! </strong></p>
          
           <META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo2"><span class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>
			</a></span></p>
			<p align="center" class="Estilo2"><span class="Estilo2"><a href='home.php' class="Estilo1">Regresar al Menu Principal</a></span><a href='home.php' class="Estilo1"></a></p>
			<p align="center" class="REFRESH">&nbsp;</p>
			<p align="center" class="REFRESH">&nbsp;</p>
			<p align="center" class="REFRESH">&nbsp;</p>
			<p align="center" class="REFRESH">&nbsp;</p>
			<p align="center" class="REFRESH">&nbsp;</p>
            
            <p align="center" class="Estilo2"><a href='home.php' class="Estilo1"></br>
            
         
            <p align="center" class="Estilo2"><img src="../Imagenes/3671.gif" width="822" height="104" alt="13"></p></th> 
          <th width="50" scope="col"><img src="../Imagenes/4753.gif" width="156" height="611"> </th>
  </tr>
</table>

