<?PHP

/** 
*
* @Eliminarcion de categorias
* 
* @autor: Eleany Garcia 
* Página de eliminacion de categorias contiene la información de las distintas categorias que se pueden eliminar
*
*/


session_start();
include_once("DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	
<span class="Estilo1">
    
      <?php
      $cat_nombre='';
      $cat_id='';

        $selec_Cat= sql("select cat_nombre from categoria");
	    
		
		?>
        
</span>
    
<p align="center" class="Estilo1"><strong>Eliminar</strong></p>
   
    <span class="Estilo1">
    <br>
    
<p align="center" class="Estilo1 Estilo3"><strong>Seleccione la o las Categorias</strong></p>
  
  <form action="" method="post" name="form1" id="form1">

      <p class="Estilo1 Estilo3">
      <select name="cate_nom" id="cate_nom">
      <option value="0">Seleccione </option>
       <?PHP
         while ($row=oci_fetch_array($selec_Cat,OCI_BOTH)){?>
      
       <option value="<?php echo $row["CAT_NOMBRE"] ?>" > <?php echo $row["CAT_NOMBRE"]?></option>
        <?php  } ?>
      </select>
   
    <?PHP
    if(isset($_POST['cate_nom'])) 
    $cat_nombre = $_POST['cate_nom']; //Te devolveria el atributo value del option seleccionado
	?>
    
</p>

  <p class="Estilo1 Estilo3">
    <label>
     <input type="submit" name="Buscar" id="Buscar" value="Buscar">
    </label>
  </p> 
</form>
   
    <?PHP
	    $selec_Cat1= sql("select CAT_ID, CAT_NOMBRE from categoria where CAT_NOMBRE LIKE '$cat_nombre'");
	
        While($row1=oci_fetch_array($selec_Cat1,OCI_BOTH))
		{	
        $cat_id = $row1['CAT_ID'];
		$cat_nombre= $row1['CAT_NOMBRE'];
		}
     ?>
 


  <p align="center" class="Estilo1 Estilo3">&nbsp;</p>
  <form id="formPariente" name="formPariente" method="post" action="eliminar_ca2.php">
    <fieldset>
      <legend></legend>
      <table width="485" height="65" border="1" align="center">
        <tr>
          <th scope="col"><legend>Datos de la Casa de Apuesta a Eliminar :</legend>
            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id ?>"/>
            <p>
              <label>Id : <?php echo $cat_id; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $cat_nombre ; ?> </label>
            </p>
            <p>
              <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar" />
            </p>
           </th>
        </tr>
      </table>
    </fieldset>
</form>



