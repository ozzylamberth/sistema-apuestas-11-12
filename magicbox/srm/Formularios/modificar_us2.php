<?PHP
/** 
*
* @Confirmacion de modificacion de administradores
* 
* @autor: Eleany Garcia
* Página que confirma las modificaciones realizadas a un administrador (hace el update) y redirecciona a home
*
*/



include_once("../controladores/ControlUsuario2.php")

?>

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.png);
	font-family: "Cooper Std Black";
}
.Estilo1 strong {
	color: #700;
	font-size: x-large;
}
.Estilo2 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
-->
</style><body bgcolor="white">
	


<table align="center">
  <tr>
	
 		 
			</tr>
  <img src="../Imagenes/FB-ES-980x200-MW-9660-Europa-League.jpg" width="995" height="200" alt=",,">
  <tr><b></tr>
  <p>&nbsp;</p>
  <tr>
    <p align="center" class="Estilo1"><strong><?php $mensaje?> </strong></p>
			<p align="center" class="Estilo2"><span class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>
	      </a></span></p>
			<p align="center" class="Estilo2"><span class="Estilo2"><a href='home.php' class="Estilo1">Regresar al Menu Principal</a></span><a href='home.php' class="Estilo1"></a></p>
    
</tr>

</body>
