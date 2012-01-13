<?php
session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php');
?>
<html>
<head>
<title>|::SISTEMA DE REGISTRO DE REQUISICIONES Y ORDENES DE COMPRA  Provided By Grupo NSM::|</title> 
</head>
<body>
<!--

.Estilo1 {
	font-weight: bold;
	color: #FFFFFF;
	margin: 10px auto;
}

-->
<?PHP
$checkbox= $_POST['check'];
$boton= $_POST['boton'];
$filas= count($checkbox);

		
		

	$fecha1=time();
	$fecha1 -= (270 * 60);
	$fecha = date("Y-m-d", $fecha1 );
			//echo $fecha

//////////APROBAR USUARIO///////////////			
if ($boton== 'Aprobar')
			{
			$consulta10= "SELECT * FROM usuario_aprobado"; 
			$resultado10= mysql_query($consulta10);
			$existe= mysql_num_rows($resultado10);
			
			?>
			<fieldset >
			  <legend><strong></br>Usuario:
			  <?PHP
			for ($i=0; $i<$filas; $i++)
			{
			
			
			$consulta14= "SELECT * FROM usuario_personal where cedula='$checkbox[$i]'"; 
			$resultado14= mysql_query($consulta14);
			$fila14= mysql_fetch_array($resultado14);
					
								
			
			
			$id = $existe + $i;

			$sql12= "UPDATE usuario SET status='1' WHERE cedula_empleado='$checkbox[$i]'";
			mysql_query($sql12);
			
			$sql7= "insert into usuario_aprobado(id_usuario_aprob, cedula, fecha, aprobado) VALUES ('$id', '$checkbox[$i]', '$fecha', '1')";
			mysql_query($sql7);
			
			?>
			<?PHP 
			echo "$fila14[0];";
			echo "$fila14[1];";
			
			}
			
			
			
			?>
			Aprobado Exitosamente</strong></legend>
				<table align="center">
				<tr>
				
						<b>
					<td align='center'>	<a href="javascript:window.open('home.php','_self');">Pulse el Siguiente Enlace para Salir</a> </td>
						<?PHP
						
						?>
				</tr>

</table>
</fieldset>
</form>
			<?PHP
}

//////////ANULAR USUARIO///////////////


if ($boton== 'Anular')
			{
			
			$consulta102= "SELECT * FROM usuario_aprobado"; 
			$resultado102= mysql_query($consulta102);
			$existe102= mysql_num_rows($resultado102);
			
			?>
			<fieldset >
			  <legend><strong></br>Usuario:
			  <?PHP
			for ($i=0; $i<$filas; $i++)
			{

			$consulta14= "SELECT * FROM usuario_personal where cedula='$checkbox[$i]'"; 
			$resultado14= mysql_query($consulta14);
			$fila14= mysql_fetch_array($resultado14);

			
			$id102 = $existe102 + $i;
			
			$sql12= "UPDATE usuario SET status='2' WHERE id_po='$checkbox[$i]'";
			mysql_query($sql12);
			
			$sql7= "insert into usuario_noaprobado(id_usuario_noaprob, cedula, fecha, noaprobado) VALUES ('$id102', '$checkbox[$i]', '$fecha', '1')";
			mysql_query($sql7);
			
			?>
			<?PHP 
			echo "$fila14[0]";
			echo "$fila14[1]";
			}
			
			
			
			?>
			Anulado Exitosamente</strong></legend>
				<table align="center">
				<tr>
				
						<b>
					<td align='center'>	<a href="javascript:window.open('home.php','_self');">Pulse el Siguiente Enlace para Salir</a> </td>
						<?PHP
						
						?>
				</tr>

</table>
</fieldset>
</form>
			<?PHP
}