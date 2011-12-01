<?PHP

/** 
*
* @Eliminarcion de eventos
* 
* @autor: Eleany Garcia
* Página de eliminacion de eventos contiene la información de los distintos eventos que se pueden eliminar
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
<p align="center" class="Estilo1"><strong>Eliminar</strong></p>
    <span class="Estilo1">
    
    <?php
$eve_nombre='';
$eve_id=0;
$eve_status='';
$eve_nro_part=0;
$eve_nro_gan=0;
$eve_tipo_pago=0;
$eve_fecha='';

        $selec_Eve= sql("select EVE_NOMBRE from evento");
	 
	?>
        
  <br>
  <p align="center" class="Estilo1 Estilo3"><strong>Seleccione el Evento</strong></p>
      
  <form name="form1" method="post" action="">

 <p class="Estilo1 Estilo3">
  
   <select name="evento" id="evento">
    <option value="0">Seleccione </option>
      <?PHP
         while ($rowev=oci_fetch_array($selec_Eve,OCI_BOTH)){?>
      
        <option value="<?php echo $rowsev["EVE_NOMBRE"] ?>" > <?php echo $rowsev["EVE_NOMBRE"]?></option>
      <?php  } ?>
   </select>
    
     <?PHP
      if(isset($_POST['evento'])) 
     $eve_nombre = $_POST['evento']; //Te devolveria el atributo value del option seleccionado
	?>
 </p>
  <p class="Estilo1 Estilo3">
    <input type="submit" name="Buscar" id="Buscar" value="Buscar">
 </p>
</form> 
 
    <?PHP
	
	$selec_Eve1= sql("select EVE_ID, EVE_NOMBRE, EVE_STATUS, EVE_NRO_PART, EVE_NRO_GAN, EVE_TIPO_PAGO, EVE_FECHA from evento where EVE_NOMBRE LIKE '$eve_nombre'");

    While($rowev1=oci_fetch_array($selec_Eve1,OCI_BOTH)){	
     $eve_id = $rowev1['EVE_ID'];
	 $eve_nombre = $rowev1['EVE_NOMBRE'];
	 $eve_status = $rowev1['EVE_STATUS'];
	 $eve_nro_part = $rowev1['EVE_NRO_PART'];
     $eve_nro_gan = $rowev1['EVE_NRO_GAN'];
	 $eve_tipo_pago = $rowev1['EVE_TIPO_PAGO'];
	 $eve_fecha = $rowev1['EVE_FECHA'];
  
     }
     ?>
 

<p align="center" class="Estilo1 Estilo3">&nbsp;</p>
  <form id="formPariente" name="formPariente" method="post" action="eliminar_ev2.php">
    <fieldset>
      <legend></legend>
      <table width="485" height="65" border="1" align="center">
        <tr>
          <th scope="col"><legend>Datos del Evento a Eliminar :</legend>
            <input type="hidden" name="eve_id" id="eve_id" value="<?php echo $eve_id ?>"/>
            <p>
              <label>Id : <?php echo $eve_id; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $eve_nombre ; ?> </label>
            </p>
            <p>
              <label>Fecha: <?php echo $eve_fecha ; ?> </label>
            </p>
            <p>
              <label>Nro. de Participantes: <?php echo $eve_nro_part ; ?> </label>
            </p>
            <p>
              <label>Nro. de Ganadores: <?php echo $eve_nro_gan ; ?> </label>
            </p>
            <p>
              <label>Razon de Pago: <?php echo $eve_tipo_pago ; ?> </label>
            </p>
            <p>
              <label>Status: <?php echo $eve_status ; ?> </label>
            </p>
            <p>
              <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar" />
            </p></th>
        </tr>
      </table>
    </fieldset>
</form>



