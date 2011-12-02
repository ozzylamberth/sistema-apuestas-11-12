<?Php

/** 
*
* @Creación de catgorías
* 
* @autor: Eleany 
* Página de creación de categorias contiene la información del formulario y se 
*
*/
session_start();
$usuario= $_SESSION['usuario'];
// Replace the path with where you installed log4php
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

?>
<script>


	 	function mensaje()
		{
			<?php $log->warn("Esta intentando ingresar campos vacios en el formulario categoria"); ?>	
		}
	 

function validaSubmite(){
if (document.categoria.cat_nombre.value == false ){
		alert("Debe ingresar la categoria")
		mensaje();
		
}
else
       document.categoria.submit()
}
</script>

		<head>
		

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.png);
}
#categoria center h1 {
	color: #700;
}
        .buttones {
	font-family: "Comic Sans MS", cursive;
	color: #800;
	background-color: #000;
}
        </style>
		
		<title>
		Registro de Categoria
		</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

                 <body>

					
				

<form action="../controladores/ControlCategoria.php" name="categoria"  id="categoria" method="post">

<center>
  <h1><img src="../Imagenes/GA1_Carousel_1995_2011_genTeaserKickoffX_bwincom.jpg" width="942" height="177" alt="ll"></h1>
  <h1>Registro de Categorias</h1>
</center>
<table align="center">
	  <tr align='center'>	
			<td align='left'><strong>FECHA</td>
			<td align='left'><input type="text" name="Fecha" readonly="readonly" value="<?php 
			//$fecha= date("d/m/Y");
			$fecha1=time();
	$fecha1 -= (270 * 60);
	$fecha = date("Y-m-d", $fecha1 );
			echo $fecha?>">
			</td>
		</tr>		
</table>
				
<fieldset height="100">
<legend></legend>

<table align="center" border="0" width="" >
			
            <td width="504" align="center"><strong>Ingrese Categoria</strong></td>
		</tr>
		<tr>
            <td width="504" align="center"><textarea name="cat_nombre" cols='60' rows='3' id="cat_nombre"></textarea>
        </tr>
			<tr>
			<td width="504" align="center">
            
            <table align="center">
	       <tr>
	      <td><input name="Registrar" type="button" class="buttones" id="Registrar" onClick="validaSubmite()" value="Registrar"></td>
    
	         <?PHP //echo "<input type='hidden' name='' value=''></td>"; ?>
	        </tr>

        </table> </td>
		</tr>
			
		<?PHP
		////Seleccionar esta opcion si es Un evento que tenga mas de un ganador por ejemplo concursos de belleza.
		?>		
		  
			</tr>
		</table>


</form>

<?PHP
require_once("../Contenedores/footer.php");
?>