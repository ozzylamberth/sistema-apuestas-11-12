

<?PHP

/** 
*
* @Informacion de las distintas categorias para su modificacion
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de las categorias para su modificacion
*
*/

include_once ("../controladores/ControlModificarCat.php");

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
<p align="center" class="Estilo1 Estilo1">&nbsp;</p>
	
<h1 align="center" class="Estilo1"><strong>Modificar Categoria</strong></h1>
   

<form action="" method="post" name="formId" id="formId">
  
  <select name="categoria" class="gh" id="categoria">
              <option value="0">Seleccione </option>
  <?php foreach ($categorias as $clave=>$valor): ?>
  		<option value="<?php echo $valor["cat_id"] ?>" ><?php echo $valor["cat_nombre"]?></option>
  <?php endforeach; ?>
  </select>
  

        <p>
          <input name="Submit" type="submit" class="irena" value="Buscar" />
        </p>
</form>

    

      <?php  if($cat_id):?>
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar la siguente Categoria: </legend>
        <p>
          <label><?php echo $cat_nombre ; ?>
          
          </label>
        </p>
    
  </fieldset>
</form>

   
<form id="formRegistro" name="formRegistro" method="post" action= "../Formularios/modificar_ca2.php">
  <fieldset>
    <legend>Ingrese los nuevos datos:</legend>
   
    <p>
    <input type="hidden" name="cat_id" Id="cat_id" value="<?php echo $cat_id?>"/>
      <label>Nombre:
        <input name="cat_nombre" type="text" id="cat_nombre" maxlength="15" />
      </label>
    </p>
   
         <div align="right">
           <center>
             <input name="enviar" type="submit" class="irena" id="enviar" value="Enviar" />
             <input name="limpiar" type="reset" class="irena" id="limpiar" value=" Limpiar" />
           </center>
            
          </div>
        
  </fieldset>
</form>
<?php endif; ?>
</body>

									  


