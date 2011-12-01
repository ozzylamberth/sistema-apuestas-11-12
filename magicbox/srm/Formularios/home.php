<?php
session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php');
?>

<table align='center' border='0'>
	
	<tr>
	<h1> 

	
	<span class="Estilo2" align="center"><span class="Estilo2" align="center">
	</br>
	<div align="center" class="Estilo7"><span class="Estilo2"><span class="Estilo9">GRACIAS POR USAR NUESTROS SERVICIOS</span> 
	
<?PHP
/* 		$sql1="SELECT * from usuario where login='$usuario'";
		$resultado1= mysql_query($sql1);
		while ($fila1= mysql_fetch_array($resultado1))
		{
					$cedula= $fila1[3];	
					$nombre= $fila1[6];
					$tipo= $fila1[2];
		} */

?>

<table width="348" border="0" link="black" align="center">
                        	<tr>
	                            <td align="center">
								</br>
								Estimado Usuario <b> <?PHP echo $usuario?> </b></strong>
                                </br>

			

	
	
<?PHP
/* 
if ($tipo == 1)
{

		$sql1="SELECT * from usuario where status='0'";
		$resultado1= mysql_query($sql1);
		$cuenta= mysql_num_rows($resultado1);
if ($cuenta > 0)
{		
?>	


			<p align="center" class="Estilo1"><strong><font color="#000000" face="verdana" size=4>Usted Tiene <?PHP echo $cuenta ?> Usuario por Aprobar</strong></p>
            
 */

/* }
exit(0);
}
 */
include_once('../Contenedores/footer.php');
?>
