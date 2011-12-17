<?PHP

/** 
*
* @Informacion de las casas de apuestas para su modificacion
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de las casas de apuestas para su modificacion
*
*/

include_once("../DataConexion/conexion.php");


?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.ddd {
	font-family: "Comic Sans MS", cursive;
	color: #A00;
	background-color: #111;
}
.ee {
	font-family: "Comic Sans MS", cursive;
}
.Estilo1.Estilo1 strong {
	color: #700;
	font-size: large;
}
.irena {
	color: #800;
}
-->
</style><body bgcolor="white">
<h1 align="center" class="Estilo1 Estilo1"><strong></strong></h1>
	

<h1 align="center" class="Estilo1"><strong>Modificar Casa De Apuestas</strong></h1>
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
  <select name="casapu_nombre" class="ee" id="casapu_nombre">
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
          <input name="Submit" type="submit" class="irena" value="Buscar" />
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
            <center><input name="enviar" type="button" class="irena" id="enviar" onClick="validaSubmite()" value="Modificar" />
          <input name="limpiar" type="reset" class="irena" id="limpiar" value=" Limpiar" /></center>
    </div>
  </fieldset>
</form>
<?php }?>

</body>

									  

