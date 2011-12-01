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

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	
<p align="center" class="Estilo1"><strong>Modificar Categoria</strong></p>
   
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
          <input type="submit" name="Submit" value="Buscar" />
        </p>
</form>

     <?php
 
		 $selec_Id= sql("select cat_id from categoria where cat_nombre LIKE '$cat_nombre'");

         While($fila2=oci_fetch_array($selec_Id,OCI_BOTH))
		 {
	         $cat_id = $fila2['CAT_ID'];}
     ?>

      
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar la siguente Categoria: </legend>
        <p>
          <label><?php echo $cat_nombre ; ?>
          </label>
        </p>
    
  </fieldset>
</form>


     <?php if ($cat_id!=0){?>
     
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
           <input type="button" name="enviar" id="enviar" value="Modificar" onClick="validaSubmite()" />
           <input type="reset" name="limpiar" id="limpiar" value=" Limpiar" />
            
          </div>
        
  </fieldset>
</form>
<?php } ?>
</body>

									  


