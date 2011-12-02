<?Php
session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php');
//echo $usuario;

?>
		<head>
		<script language='javascript' src="../js/popcalendar.js"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-1.3.2.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.validate.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.metadata.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>messages_es.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/i18n/grid.locale-sp.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/jquery.jqGrid.min.js"></script>

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		<title>
		Registro de Compania
		</title>
		
		</head>

                 <body>

					
<!--        AQUI ESTA LO QUE DEBERIA DE IR EN EL FOOTER      -->					

<form action="ganador_evento2.php" name="resultadof"  id="resultadof" method="post">

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
<legend><strong>Datos del Evento </strong></legend>
<table align="center" border="0" width="" >
		<tr>
        <table align="center" border="0" width="900">
			<tr>
			<td width="500" align='center'><strong>
			
			Evento:
			</strong>
			</td>
			</tr>
		</table>
		<table align="center" border="0" width="900">
		
			<tr>
			<td width="500" align='center'>
		
			<select type="submit" name="id_eventos" id="id_eventos" >
							
							<?php
			
//Conexion con la Base de Datos				
			
//Consulta con la Base de Datos
		$sql2="select * from eventos";
		$result2=mysql_query($sql2);
//Imprimir valores en el Select
        //echo "<option value=''>..:SELECCIONE:..</option>";
        while($consulta2=mysql_fetch_array($result2)){
		echo "<option value='".$consulta2[0]."'>".$consulta2[2]."</option>";
//echo "$arreglo";
			}
			
			?>
			
			</select>	
		</tr>
		</table>
		<table align="center" border="0" width="900">
		<tr>
		
            <td width="500" align='center'><strong>Resultado</strong></td>
		</tr>
		<tr>
            <td width="500" align='center'><input type="text" name="resultado" rows='3' cols='60'></td>
            
			</tr>
		</table>
		
		
		
<script>

  
  
 
function validaSubmite(){


if (document.resultadof.resultado.value == false )
		alert("Debe Ingresar Resultado")
else
       document.requisicion.submit()
		
}






  
</script>			
<table align="center">
	<tr>
	<td><input type="button" name="Registrar" id="Continuar con Registro" value="Continuar con Registro" onclick="validaSubmite()"></td>
    
	<?PHP echo "<input type='hidden' name='' value=''></td>"; ?>
	</tr>

</table>
</form>
<form name='volverse' action='home.php'> 
<table align='center'>
					<td><input type="submit" align='center' name="Cancelar" id="button2" value="Cancelar"></td>
					<?PHP
			
			
			?>
					</tr>
					</table>
</form>
<?PHP
require_once("../Contenedores/footer.php");
?>