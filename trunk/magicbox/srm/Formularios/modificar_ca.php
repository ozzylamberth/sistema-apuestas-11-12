 <script>
		 function validaSubmite(){
			if (document.formRegistro.cat_nombre.value == false)
				alert("Debe ingresar el nombre de la categoria")
			else
       			document.formRegistro.submit()
			}

		</script>

<?PHP

/** 
*
* @Informacion de las distintas categorias para su modificacion
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de las categorias para su modificacion
*
*/

session_start();
include_once("../DataConexion/conexion.php");
$usuario= $_SESSION['usuario'];
$cat_nombre ='';
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
.Estilo1 strong {
	color: #700;
	font-size: large;
}
.NuevoBoton {
	font-family: "Comic Sans MS", cursive;
	color: #700;
	background-color: #000;
}
.hhh {
	font-family: "Comic Sans MS", cursive;
	color: #000;
}
.irena {
	color: #700;
}
-->
</style><body bgcolor="white">
<p align="center" class="Estilo1 Estilo1"><img src="../Imagenes/APUESTASSOGAR.gif" width="902" height="90" alt="IMAGE"></p>
	
<h1 align="center" class="Estilo1"><strong>Modificar Categoria</strong></h1>
   
<?php	
 $cat_nombre='';
 $cat_id=0;
		$Consulta_ca=sql("SELECT cat_nombre FROM categoria");
          
?>

<form action="" method="post" name="formId" id="formId">
  <select name="cat_nombre1" id="cat_nombre1">
    <option value="0">Seleccione </option>
    <?php  
	
     $rows = array ();
     while ( $rows=oci_fetch_array($Consulta_ca,OCI_BOTH)){?>
    <option value="<?php echo $rows["CAT_NOMBRE"] ?>" > <?php echo $rows["CAT_NOMBRE"]?></option>
    <?php  } ?>
  </select>
  
    <?php
  
      if(isset($_POST['cat_nombre1'])) //$_GET si se hace por GET (url)
      $cat_nombre = $_POST['cat_nombre1']; //Te devolveria el atributo value del option seleccionado
    ?>

        <p>
          <input name="Submit" type="submit" class="irena" value="Buscar" />
        </p>
</form>

     <?php
 
		 $selec_Id= sql("select cat_id from categoria where cat_nombre LIKE '$cat_nombre'");

         While($fila2=oci_fetch_array($selec_Id,OCI_BOTH))
		 {
	         $cat_id = $fila2['CAT_ID'];}
     ?>

      <?php if ($cat_id!=0){?>
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar la siguente Categoria: </legend>
        <p>
          <label><?php echo $cat_nombre ; ?>
          </label>
        </p>
    
  </fieldset>
</form>


     
     
<form id="formRegistro" name="formRegistro" method="post" action= "modificar_ca2.php ">
  <fieldset>
    <legend>Ingrese los nuevos datos:</legend>
   
    <p>
    <input type="hidden" name="cat_id" Id="cat_id" value="<?php echo $cat_id?>"/>
      <label>Nombre:
        <input name="cat_nombre" type="text" id="cat_nombre" maxlength="15" />
      </label>
    </p>
   
         <div align="right">
           <center><input name="enviar" type="button" class="irena" id="enviar" onClick="validaSubmite()" value="Modificar" />
           <input name="limpiar" type="reset" class="irena" id="limpiar" value=" Limpiar" /></center>
            
          </div>
        
  </fieldset>
</form>
<p>
  <?php } ?>
</p>
<p>&nbsp;</p>
</body>

									  


