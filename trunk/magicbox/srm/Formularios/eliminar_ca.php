<?PHP

/** 
*
 * @Eliminarcion de categorias
* 
* @autor: Eleany Garcia 
* Página de eliminacion de categorias contiene la información de las distintas categorias que se pueden eliminar
*
*/


include_once ("../controladores/ControlEliminarCategoria.php");


?>

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
	color: #000;
}
h1 {
	font-size: xx-large;
	color: #700;
}
.bb {
	color: #800;
}
-->
</style><body bgcolor="gray">
	<p align="center" class="Estilo1 Estilo1"><strong></strong><img src="../Imagenes/header.gif" width="997" height="142" alt="Banner1"></p>
	    
    
<h1 align="center" class="Estilo1"><strong>Eliminar</strong> Categoria</h1>
   
    
<p  class="Estilo1 Estilo3"><strong>Seleccione la  Categoria que desea eliminar:</strong></p>
  
  <form action="../controladores/ControlEliminarCategoria.php" method="post" name="form1" id="form1">

      <select name="categoria" class="gh" id="categoria">
              <option value="0">Seleccione </option>
  <?php foreach ($categorias as $clave=>$valor): ?>
  		<option value="<?php echo $valor["cat_id"] ?>" ><?php echo $valor["cat_nombre"]?></option>
  <?php endforeach; ?>
  </select>
    
    </p>

    <p class="Estilo1">
    <label><br>
     <input name="Buscar" type="submit" class="bb" id="Buscar" value="Buscar">
    </label>
  </form>
   
 <?php  if($cat_id):?>
  <form id="formPariente" name="formPariente" method="post" action="../Formularios/eliminar_ca2.php">
    <fieldset>
      <table width="485" height="65" border="2" align="center">
        <tr>
          <th scope="col"><legend>Datos de la Casa de Apuesta a Eliminar :</legend>
            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id ?>"/>
            
            <p>
              <label>ID: <?php echo $cat_id ; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $cat_nombre ; ?> </label>
            </p>
            <p>
              <input name="Eliminar" type="submit" class="bb" id="Eliminar" value="Eliminar" />
            </p>
           </th>
        </tr>
      </table>
    </fieldset>
    <?php endif; ?>
</form>



