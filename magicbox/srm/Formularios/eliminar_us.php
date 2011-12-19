<?PHP

/** 
*
* @Eliminarcion de Administradores(usuarios)
* 
* @autor: Eleany Garcia
* Página de eliminacion de administradores contiene la información de los distintos administradores que se pueden eliminar
*
*/

include_once ("../controladores/ControlEliminarAdministrador.php");


?>

<style type="text/css">
<!--
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.rt {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}

.Estilo1 strong {
	font-family: "Comic Sans MS", cursive;
}
.Estilo1 strong {
	font-size: large;
	color: #800;
}
.kkk {
	color: #B00;
}
-->
</style><body bgcolor="white">

    
	<p align="center" class="Estilo1 Estilo1"><strong></strong><img src="../Imagenes/header.gif" width="957" height="119" alt="h5"></p>
<p align="center" class="Estilo1"><strong>Eliminar Administrador</strong> </p>
<tr class="rt">
  <p  class="rt">Seleccione Administrador</p>

<form name="form1" method="post" action="../controladores/ControlEliminarAdministrador.php">
  
<select name="admin" class="gh" id="admin">
              <option value="0">Seleccione </option>
  <?php foreach ($administradores as $clave=>$valor): ?>
  		<option value="<?php echo $valor["admin_cedula"] ?>" ><?php echo $valor["admin_cedula"]?></option>
  <?php endforeach; ?>
  </select>  
  
    
     

  </p>
  <p class="Estilo1 Estilo3">

      <input name="Buscar" type="submit" class="kkk" id="Buscar" value="Buscar">
 </p>
 </form>
 


<?php  if($admin_cedula):?>

  <form id="formAdmin" name="formAdmin" method="post" action="../Formularios/eliminar_us2.php">
  
  
    <fieldset>
      <legend></legend>
      <table width="485" height="65" border="1" align="center">
        <tr>
          <th scope="col"><legend>Datos del Administrador a Eliminar :</legend>
            <p>
              <input name="ADMIN_CEDULA" type="hidden" id="ADMIN_CEDULA" value=<?php echo $admin_cedula?>>
              <label>Cedula : <?php echo $admin_cedula; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $admin_nombre ; ?> </label>
            </p>
            <p>
              <label>Apellido: <?php echo $admin_apellido ; ?> </label>
            </p>
            <p>
              <label>Login: <?php echo $admin_login ; ?> </label>
            </p>
            <p>
              <label>Status: <?php echo $admin_status; ?> </label>
            </p>
           
              <input name="Eliminar" type="submit" class="kkk" id="Eliminar" value="Eliminar" />
            </p></th>
        </tr>
      </table>
    </fieldset>
   <?php endif; ?>
</form>





