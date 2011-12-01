<?PHP
/** 
*
* @Lista de Eventos caducados y sus ganadores
* 
* @autor: Eleany Garcia
* Página que lista los eventos ya finalizados y su ganador o ganadores
*
*/


session_start();
include_once("../DataConexion/conexion.php");

?>

<body bgcolor="white">
	
 <?php
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_gan=0;
        $selec_nom_eve= sql("select eve_nombre from evento WHERE eve_status LIKE 'Inactivo'");
  ?>    
    
    
<p align="center" class="Estilo1"><strong>Seleccione Evento</strong></p>
   
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
      $selec_Id_Eve= sql("SELECT EVE_ID, EVE_NRO_GAN, EVE_FECHA FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	  
	  While($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   {	
	      $eve_id= $roweve2['EVE_ID'];
          $eve_nro_gan = $roweve2['EVE_NRO_GAN'];
		  $eve_fecha = $roweve2['EVE_FECHA'];
       }
	   
	   ?>
  	 
 

<form id="formAdmin" name="formAdmin" method="post" action="">
   
     <?php 
	 
	 $selec_Id_Par= sql("SELECT P.PAR_NOMBRE FROM RES_PAR RP, EVENTO E, PARTICIPANTE P WHERE RP.RP_FK_PAR_ID=P.PAR_ID AND RP.RP_FK_EVE_ID=E.EVE_ID AND E.EVE_ID=".$eve_id);
	   
	?>
    
 <p align="center" class="Estilo1"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" class="Estilo1"><strong> Fecha: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" class="Estilo1"><strong>Nro de Ganadores: <?php echo $eve_nro_gan?>
 </strong></p>
 <p align="center" class="Estilo1"><strong>GANADOR O GANADORES:
 </strong></p>
 
<table width="200" border="1" align="center">
  <tr>
    <td width="200">Nombre</td>
    
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($selec_Id_Par,OCI_BOTH)){
               $par_nombre = $row['PAR_NOMBRE']; 
		
	     ?>
 
</table>
 
      <table width="200" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>    
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p></center>
</p>
