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

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}


.Estilo1 strong {
	font-family: "Comic Sans MS";
	color: #800;
	font-size: xx-large;
	font-weight: bold;
}
body,td,th {
	font-family: Comic Sans MS;
	font-weight: bold;
}
.Estilo1.Estilo3 {
	font-family: Comic Sans MS, cursive;
}
.Estilo1 strong {
	font-family: Comic Sans MS, cursive;
	font-size: 24px;
}

.mmm {
	color: #A00;
}
</style><body bgcolor="white">
<p align="center" class="Estilo1 Estilo1">
    <img src="../Imagenes/header.gif" width="880" height="137" alt="H3"></p>
<p align="center" class="Estilo1"><strong>Eliminar Evento</strong></p>
<form name="form1" method="post" action="">
  
  <p class="Estilo1 Estilo3"><span class="body,td,th">Seleccione el evento que desea eliminar
      <?php
$eve_nombre='';
$eve_id=0;
$eve_status='';
$eve_nro_part=0;
$eve_nro_gan=0;
$eve_tipo_pago=0;
$eve_fecha='';

        $selec_Eve= sql("SELECT EVE_NOMBRE from EVENTO");
	 
	?>
  </span> </p>
  <p class="Estilo1 Estilo3">
    <select name="evento" id="evento">
      <option value="0">Seleccione </option>
      <?PHP
         while ($rowev=oci_fetch_array($selec_Eve,OCI_BOTH)){?>
      
      <option value="<?php echo $rowev["EVE_NOMBRE"] ?>" > <?php echo $rowev["EVE_NOMBRE"]?></option>
      <?php  } ?>
    </select>
    
    <?PHP
      if(isset($_POST['evento'])) 
     $eve_nombre = $_POST['evento']; //Te devolveria el atributo value del option seleccionado
	?>
  </p>
  <p class="Estilo1 Estilo3">
    <input name="Buscar" type="submit" class="mmm" id="Buscar" value="Buscar">
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
     <?php
		if ($eve_nombre !='' )
		{ ?>
     
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
              <input name="Eliminar" type="submit" class="mmm" id="Eliminar" value="Eliminar" />
            </p></th>
        </tr>
      </table>
    </fieldset>
    <?php
		} ?>
</form>



