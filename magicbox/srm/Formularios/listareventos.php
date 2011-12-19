<?PHP

/** 
*
* @Lista de eventos existentes
* 
* @autor: Irene Soto
* Página que lista los distintos eventos y su informacion para fines del administrador
*
*/

/* include_once("../DataConexion/conexion.php"); */
include_once("../controladores/ControlListarEventos.php");
?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #800;
	font-size: x-large;
	text-align: center;
}
.kk {
	color: #000;
}
-->
</style><body bgcolor="white">
	
<p align="center" class="Estilo1"><strong>Lista de Eventos</strong></p>
   

    <?php 
	//$queryListaEve = sql("SELECT * FROM evento");
	
	?> 
 
<table width="900" border="1" align="center">
  <tr class="kk">
    <td width="200">Nombre</td>
    <td width="200">Status</td>
    <td width="200">Fecha</td>
    <td width="300">Nro. de Participantes</td>
    <td width="300">Nro. de Ganadores</td>
    <td width="200">Razon de Pago</td>
   </tr>
  
      <?php
	   /*  $var= 1;
           While($row=oci_fetch_array($queryListaEve,OCI_BOTH)){
               $eve_nombre = $row['EVE_NOMBRE']; 
			   $eve_status = $row['EVE_STATUS']; 
			   $eve_fecha = $row['EVE_FECHA']; 
			   $eve_nro_part = $row['EVE_NRO_PART']; 
			   $eve_nro_gan = $row['EVE_NRO_GAN'];
			   $eve_tipo_pago = $row['EVE_TIPO_PAGO']; */
	     ?>
 
</table>
 
      <table width="900" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $eve_nombre; ?> </th> 
          <th width="200" scope="col"> <?php  echo $eve_status; ?></th>
          <th width="200" scope="col"> <?php echo $eve_fecha; ?> </th> 
          <th width="300" scope="col"> <?php  echo $eve_nro_part; ?></th>
          <th width="300" scope="col"> <?php echo $eve_nro_gan; ?> </th>
          <th width="200" scope="col"> <?php echo $eve_tipo_pago; ?> </th>
        </tr>
      </table>
    

  <?php 
   $var ++;
  // }
	?>
    
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p></center>
</p>
<img src="../Imagenes/CASAAPUESTASOG.gif" width="907" height="106" alt="25"> 