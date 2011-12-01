<?PHP

/** 
*
* @Eliminarcion de casas de apuesta
* 
* @autor: Eleany Garcia
* Página de eliminacion de casas de apuesta contiene la información de las distintas casas de apuestas que se pueden eliminar
*
*/

session_start();
include_once("DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1"><strong>Eliminar</strong></p>
    <span class="Estilo1">
     <?php
	 
        $casapu_nombre='';
        $casapu_id=0;

        $selec_Casapu= sql("select casapu_nombre from casa_apuesta");
	   
		?>
    
    <br>
<p align="center" class="Estilo1 Estilo3"><strong>Seleccione La Casa de Apuesta</strong></p>

<form name="form1" method="post" action="">

  <p class="Estilo1 Estilo3">
  
  <select name="cda" id="cda">
  <option value="0">Seleccione </option>
    
      <?PHP
      while ($rowc=oci_fetch_array($selec_Casapu,OCI_BOTH)){?>
      <option value="<?php echo $rowc["CASAPU_NOMBRE"] ?>" > <?php echo $rowc["CASAPU_NOMBRE"]?></option>
      <?php  } ?>
  </select>
  
    <?PHP
    if(isset($_POST['cda'])) 
    $casapu_nombre = $_POST['cda']; //Te devolveria el atributo value del option seleccionado
	?>
    
  </p>
  
  <p class="Estilo1 Estilo3">
    <label>
      <input type="submit" name="Buscar" id="Buscar" value="Buscar">
    </label>
  </p>
</form>

    <?PHP
	 $selec_Casapu1= sql("select CASAPU_ID, CASAPU_NOMBRE from casa_apuesta where CASAPU_NOMBRE LIKE '$casapu_nombre'");
	
     While($rowc1=oci_fetch_array($selec_Casapu1,OCI_BOTH)){	
     $casapu_id = $rowc1['CASAPU_ID'];
	 $casapu_nombre = $rowc1['CASAPU_NOMBRE'];
	 }
     ?>


<p align="center" class="Estilo1 Estilo3">&nbsp;</p>
  <form id="formPariente" name="formPariente" method="post" action="eliminar_cda2.php">
    <fieldset>
      <legend></legend>
      <table width="485" height="65" border="1" align="center">
        <tr>
          <th scope="col"><legend>Datos de la Casa de Apuesta a Eliminar :</legend>
            <input type="hidden" name="casapu_id" id="casapu_id" value="<?php echo $casapu_id ?>"/>
            <p>
              <label>Id : <?php echo $casapu_id; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $casapu_nombre ; ?> </label>
            </p>
            
            
            <p>
              <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar" />
            </p></th>
        </tr>
      </table>
    </fieldset>
</form>

