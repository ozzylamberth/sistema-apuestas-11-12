<?PHP

/** 
*
* @Confirmacion de modificacion de categorias
* 
* @autor: Eleany Garcia
* Página que confirma las modificaciones realizadas a una categoria (hace el update) y redirecciona a home
*
*/

session_start();
include_once("../DataConexion/conexion.php");

$cat_id = $_POST['cat_id'];
$cat_nombre = $_POST['cat_nombre'];
?>

<body bgcolor="white">
	

<?php	
		$actualiza_Cat = sql("UPDATE categoria SET cat_nombre='$cat_nombre' WHERE cat_id= ".$cat_id);
		
?>
  
  <table align="center">
	<tr>
	
 		<!--META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"--> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Modificacion Realizada con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
            
			
  </tr>


</body>

									  


