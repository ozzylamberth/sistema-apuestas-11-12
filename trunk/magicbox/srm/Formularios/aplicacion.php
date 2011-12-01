<?php
session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
?>

   
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>|::SISTEMA DE APUESTAS MG Provided By MG::|</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-times.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>

<body>
<h1> 
<span class="Estilo2" align="center"><span class="Estilo2" align="center">
<div align="center" class="Estilo7"><span class="Estilo2"><span class="Estilo9"><font color="#FFFFFF" face="verdana" size=4>Bienvenido Al Sistema de Apuestas</span> 


  <?php //echo $_SESSION["usuario"];  
  $contador =0;



/* 
	$consulta= "SELECT * FROM usuario where login='$usuario'"; 
	$resultado= mysql_query($consulta);
	while ($fila= mysql_fetch_array($resultado))
{

$us_verif=$fila[0];
$num_user=$fila[2];
$nombre=$fila[6]; */



/* 
REVISAR:  no imprime los datos del usuario
$datos_Usuario=sql("SELECT * FROM administrador where admin_login='$usuario'");
									   $fila=oci_fetch_array($datos_Usuario,OCI_BOTH);
                                       $filas=oci_num_rows($datos_Usuario);
		
		
		
		
		 While($fila=oci_fetch_array($datos_Usuario,OCI_BOTH))
		 {
         $admin_nombre= $fila['admin_nombre'];
		 $admin_apellido= $fila['admin_apellido'];
		 }  
 */
		                  
?> 
<table width="348" border="0" align="center">
                            
                            <tr>
                            	<td>
								<h1> 
								<p align="center" class="Estilo10"><?php echo 'Bienvenido' ?></p> 
                                
								
								</td>
                            </tr>
  </table>
  
	
</div>

<META HTTP-EQUIV="REFRESH" CONTENT="4;URL=../../MenuOperativo2.php"> </head> 
			<b>
			<p align="center" class="Estilo1"><strong><font color="#FFFFFF" face="verdana" size=4>Ingresando al Sistema Por Favor espere...</strong></p>







</span>
</body>

</html>