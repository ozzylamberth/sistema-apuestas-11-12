<?PHP

/** 
*
* @Eliminarcion de eventos
* 
* @autor: Eleany Garcia
* Página de eliminacion de eventos contiene la información de los distintos eventos que se pueden eliminar
*
*/


include_once ("../controladores/ControlEliminarEvento.php");


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
	font-size: large;
}

.mmm {
	color: #A00;
}
</style><body bgcolor="white">
<p align="center" class="Estilo1 Estilo1">
    <img src="../Imagenes/header.gif" width="880" height="137" alt="H3"></p>
<p align="center" class="Estilo1"><strong>Eliminar Evento</strong></p>
<form name="form1" method="post" action="../controladores/ControlEliminarEvento.php">
  
  <p class="Estilo1 Estilo3"><span class="body,td,th">Seleccione el evento que desea eliminar
 
  </span> </p>
  <p class="Estilo1 Estilo3">
    <select name="evento" class="gh" id="evento">
              <option value="0">Seleccione </option>
  <?php foreach ($eventos as $clave=>$valor): ?>
  		<option value="<?php echo $valor["eve_id"] ?>" ><?php echo $valor["eve_nombre"]?></option>
  <?php endforeach; ?>
  </select>
    
    
  </p>
  <p class="Estilo1 Estilo3">
    <input name="Buscar" type="submit" class="mmm" id="Buscar" value="Buscar">
 </p>
</form> 
 
   
   <?php  if($eve_id):?>
     
  <form id="formPariente" name="formPariente" method="post" action="../Formularios/eliminar_ev2.php">
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
   <?php endif; ?>
</form>



