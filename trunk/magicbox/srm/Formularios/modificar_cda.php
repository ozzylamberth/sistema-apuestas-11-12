<?PHP

/** 
*
* @Informacion de las casas de apuestas para su modificacion
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de las casas de apuestas para su modificacion
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<p align="center" class="Estilo1"><strong>Modificar Casa De Apuestas</strong></p>
 <script>
		 function validaSubmite(){
			if (document.modif.casapu_nombre.value == false)
				alert("Debe ingresar el nombre de la casa")
			else
       			document.modif.submit()
			}

		</script>
    
<?php	
 $casapu_nombre='';		
		
		$Consulta_casa=sql("SELECT casapu_nombre FROM casa_apuesta");
         
       
?>

<form action="" method="post" name="formId" id="formId">
  <select name="casapu_nombre" id="casapu_nombre">
    <option value="0">Seleccione </option>
    
    <?php  
	
      while ( $filacasa=oci_fetch_array($Consulta_casa,OCI_BOTH)){?>
      
    <option value="<?php echo $filacasa["CASAPU_NOMBRE"] ?>" > <?php echo $filacasa["CASAPU_NOMBRE"]?></option>
    <?php  } ?>
    
  </select>
  
  <?php
  
  if(isset($_POST['casapu_nombre'])) //$_GET si se hace por GET (url)
  $casapu_nombre = $_POST['casapu_nombre']; //Te devolveria el atributo value del option seleccionado
    
  ?>

        <p>
          <input type="submit" name="Submit" value="Buscar" />
        </p>
</form>


<?php

   $selec_Id= sql("select casapu_id from casa_apuesta where casapu_nombre LIKE '$casapu_nombre'");

      While($fila=oci_fetch_array($selec_Id,OCI_BOTH))
     {
	  $casapu_id = $fila['CASAPU_ID'];
     }
?>

	
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar la Casa De Apuesta:</legend>
        <p>
          <label><?php echo $casapu_nombre ; ?>
          </label>
        </p>
    
  </fieldset>
</form>


<?php if ($casapu_nombre!=''){?>

<form id="modif" name="modif" method="post" action= "modificar_cda2.php ">
  <fieldset>
    <legend>Ingrese los nuevos datos  :</legend>
   
    <p>
    <input type="hidden" name="casapu_id" Id="casaapu__id" value="<?php echo $casapu_id?>"/>
      <label>Nombre:
        <input name="casapu_nombre" type="text" id="casapu_nombre" maxlength="15" />
      </label>
    </p>
   
        <div align="right">
            <input type="button" name="enviar" id="enviar" value="Modificar" onClick="validaSubmite()" />
            <input type="reset" name="limpiar" id="limpiar" value=" Limpiar" />
          </div>
   </fieldset>
</form>
<?php }?>

</body>

									  

