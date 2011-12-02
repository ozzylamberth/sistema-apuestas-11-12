<?PHP

/** 
*
* @Lista de proximos eventos
* 
* @autor: Eleany Garcia
* Página que lista los proximos eventos a realizarce, asi como los participantes de los mismos y la razon de pago por cada uno de ellos
con el fin de informar al usuario (apostador)
*
*/


session_start();
include_once("../DataConexion/conexion.php");

?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
}
body {
	background-image: url(../Imagenes/fondo.png);
	color: #700;
}
#formAdmin .Estilo1 strong {
	color: #000;
}
#formAdmin table {
	color: #000;
}
.gg {
	font-size: x-large;
}
-->
</style><body bgcolor="white">
	
 <p>&nbsp; </p>
 <p>
   <?php
 
         $fecha1=time();
	     $fecha1 -= (270 * 60);
		  $fecha = date("Y-m-d", $fecha1 );
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_part=0;
		
        $selec_nom_eve= sql("select eve_nombre from evento WHERE eve_status LIKE 'Activo'");
		
		
  ?>
 </p>
 <p>&nbsp;    
   
 </p>
<p align="center" class="gg"><strong>Seleccione Evento</strong></p>
   
<form name="form1" method="post" action="">
  
    <select name="eve" id="eve">
    <option value="0">Seleccione </option>
      <?PHP
        while ($roweve=oci_fetch_array($selec_nom_eve,OCI_BOTH)){?>
      
        <option value="<?php echo $roweve["EVE_NOMBRE"] ?>" > <?php echo $roweve["EVE_NOMBRE"]?></option>
      <?php  } ?>
    </select>
    
    <?PHP
    if(isset($_POST['eve'])) 
    $eve_nombre = $_POST['eve']; //Te devolveria el atributo value del option seleccionado
	?>
    
  
 <p class="Estilo1 Estilo3">

      <input type="submit" name="Buscar" id="Buscar">
</form>
 
 
 
  <?PHP  
      $selec_Id_Eve= sql("SELECT EVE_ID, EVE_NRO_PART, EVE_TIPO_PAGO, EVE_FECHA FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	  
	  While($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   {	
	      $eve_id= $roweve2['EVE_ID'];
          $eve_nro_part = $roweve2['EVE_NRO_PART'];
		  $eve_tipo_pago = $roweve2['EVE_TIPO_PAGO'];
		  $eve_fecha = $roweve2['EVE_FECHA'];
       } 
	   
	   ?>
  
 

<form id="formAdmin" name="formAdmin" method="post" action="">
   
   <?php 
	   $queryListaEve = sql("SELECT P.par_nombre, PE.pe_tipo_pago FROM evento E, participante P, par_eve PE WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND   PE.PE_FK_EVE_ID=E.EVE_ID AND E.eve_id=".$eve_id);
	
	?>
    
 <p align="center" class="Estilo1"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" class="Estilo1"><strong> Fecha de inicio: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" class="Estilo1"><strong>Nro de Participantes: <?php echo $eve_nro_part?>
 </strong></p>
 
<table width="400" border="1" align="center">
  <tr>
    <td width="200">Nombre</td>
    <td width="200">Razon de Pago</td>
   </tr>
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($queryListaEve,OCI_BOTH))
		   {
			   $par_nombre = $row['PAR_NOMBRE'];
			   $pe_tipo_pago = $row['PE_TIPO_PAGO'];
			   
			   if ($pe_tipo_pago==0)
			   {
				   $pe_tipo_pago=$eve_tipo_pago;
				}
		 ?>
 
</table>
 
      <table width="400" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
          <th width="200" scope="col"> <?php echo $pe_tipo_pago; ?> </th>
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>    
 
<center><p><?php  echo "<a href='../../index.html'> Continuar </a> "; ?></p></center>