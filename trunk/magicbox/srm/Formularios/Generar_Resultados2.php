<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.re {
	color: #800;
}
.Estilo2 {
	font-size: large;
}
.re {
	color: #A00;
}
.Estilo2 .re {
	font-weight: bold;
}
-->
</style></head>

<body>

<?PHP
include_once ("../DataConexion/conexion.php");
session_start();
$usuario= $_SESSION['usuario'];
$nro_ganadores= $_POST["eve_nro_gan"];
$eve_id= $_POST["eve_id"];
$res_resultado=$_POST["descripcion_eve"];
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');



$insertres= sql("INSERT INTO RESULTADO VALUES (AUTO_INC_resultado.NEXTVAL,'$res_resultado')");

$select_Id_Res= sql("SELECT MAX(RES_ID) AS RES_ID FROM RESULTADO");
$filas=oci_fetch_array($select_Id_Res,OCI_BOTH);

$res_id= $filas["RES_ID"];

      $nro_Part=1;
      while ($nro_Part <=  $nro_ganadores)
      {
	
	    $par_id=$_POST['Id_'.$nro_Part];
	 	$par_nombre=$_POST['Participante_'.$nro_Part];
			
	    $insertrp= sql("INSERT INTO RES_PAR  VALUES ('$res_id' , '$par_id', '$eve_id')");
		$nro_Part++;	
						
	   }
		
		 $act_Edo_Ev= sql("update evento set  eve_status = 'Inactivo' where eve_id='$eve_id'");
		
		
		
		
		
		
?>

 <META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<b>
			<p align="center" class="Estilo2"><span class="re">TABLA DE RESULTADOS creada exitosamente </span>... </p>
<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>
</a></p>
			<p align="center" class="Estilo2"><a href='home.php' class="Estilo1">Regresar al Menu Principal</a><a href='home.php' class="Estilo1"></a></p>
			<p align="center" class="Estilo2"><img src="../Imagenes/ClasicosFutbol.gif" width="865" height="92" alt="cls" /></p>
</body>
</html>