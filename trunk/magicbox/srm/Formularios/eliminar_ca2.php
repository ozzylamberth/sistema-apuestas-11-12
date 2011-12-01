<?PHP

/** 
*
* @Confirmacion de eliminacion de categorias
* 
* @autor: Eleany Garcia
* Página de confirmacion de eliminacion de categorias se confirma la eliminacion
se realiza el delete de la BD y se redirecciona a la pag de inicio
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.png);
}
.Prueba {
	font-family: fantasy;
}
body,td,th {
	font-family: Cooper Black;
}
.Prueba strong {
	font-family: "Cooper Black";
	color: #800;
}
-->
</style><body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<span class="Estilo1">
<?php
    $cat_id =  $_POST['cat_id'];
 
	$eliminar_Cat = sql ("DELETE FROM categoria WHERE cat_id= ".$cat_id);
	
?>
<table align="center" width="500" height="439" border="">
<tr>  
          <th width="300" scope="col"><h1 align="center" class="Prueba"><strong>CATEGORIA ELIMINADA EXITOSAMENTE!! </strong></h1>
            <p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace </p>
            <p align="center" class="Estilo2"><a href='home.php' class="Estilo1"></br>
            Regresar al Menu Principal</a></p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2">&nbsp;</p>
            <p align="center" class="Estilo2"><img src="../Imagenes/3671.gif" width="841" height="112" alt="13"></p></th> 
          <th width="200" scope="col"><img src="../Imagenes/4753.gif" width="160" height="600"> </th>
		      </tr>
</table>
<p align="center" class="Estilo2"><a href='home.php' class="Estilo1"></a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
