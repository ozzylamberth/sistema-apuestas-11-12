<?Php
include_once ("../DataConexion/conexion.php");
session_start();
$usuario= $_SESSION['usuario'];
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
?>
		<head>
		

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		<title>
		Registro de Casa de Apuesta
		</title>
		
		</head>

                 <body>

 
     <script>
	 
	 	function mensaje()
		{
			<?php $log->warn("Esta intentando ingresar campos vacios en el formulario de casa apuesta"); ?>	
		}
	 
		 function validaSubmite(){
			if (document.casa_apuesta.casapu_nombre.value == false)
			{
				alert("Debe Ingresar Nombre");
				mensaje();
			}
			else
       			document.casa_apuesta.submit()
			    
			}
        </script>
				
				

<form action="casa_apuesta2.php" name="casa_apuesta"  id="casa_apuesta" method="post">

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
<legend><strong>Datos de la Casa de Apuesta </strong></legend>
<table align="center" border="0" width="" >
		<tr>
        <table align="center" border="0" width="900">
			<tr>
		<td>
		
		</td>
		</tr>
			
			<tr>
			
            <td width="500" align="center"><strong>Ingrese Nombre de La Casa De Apuesta</strong></td>
		</tr>
		<tr>
            <td width="500" align="center"><textarea name="casapu_nombre" rows='3' cols='60'></textarea>
            
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