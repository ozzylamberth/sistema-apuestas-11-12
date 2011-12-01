<?Php

/** 
*
* @Creación de catgorías
* 
* @autor: Eleany 
* Página de creación de categorias contiene la información del formulario y se 
*
*/
include_once ("../DataConexion/conexion.php");
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
        </style>
		
		<title>
		Registro de Categoria
		</title>
		
		</head>

                 <body>

					
				

<form action="categoria2.php" name="categoria"  id="categoria" method="post">

<table>
		<tr align='left'>	
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
<legend><strong>Datos de la Categoria </strong></legend>
<table align="center" border="0" width="" >
		<tr>
        <table align="center" border="0" width="900">
			<tr>
		<td>&nbsp;</td>
		</tr>
			
			<tr>
			
            <td width="500" align="center"><strong>Ingrese Categoria</strong></td>
		</tr>
		<tr>
            <td width="500" align="center"><textarea name="cat_nombre" cols='60' rows='3' id="cat_nombre"></textarea>
            
			</tr>
			
			<tr>
			
            <td width="500" align="center">&nbsp;</td>
		</tr>
			<tr>
		<?PHP
		////Seleccionar esta opcion si es Un evento que tenga mas de un ganador por ejemplo concursos de belleza.
		?>		
		<td align='center'>&nbsp;</td>
		
			</tr>
		</table>

<table align="center">
	<tr>
	<td><input type="button" name="Registrar" id="Continuar con Registro" value="Continuar con Registro" onClick="validaSubmite()"></td>
    
	<?PHP //echo "<input type='hidden' name='' value=''></td>"; ?>
	</tr>

</table>
</form>
<form name='volverse' action='home.php'> 
<table align='center'>
					<td><input type="submit" align='center' name="Cancelar" id="button2" value="Cancelar"></td>
				</tr>
					</table>
</form>
<?PHP
require_once("../Contenedores/footer.php");
?>