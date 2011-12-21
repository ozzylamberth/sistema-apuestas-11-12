 <script language="javascript" type="text/javascript" src="scripts/datetimepicker_css.js"></script> 
 <script>
		 
</script>



<?PHP

/** 
*
* @Lista de eventos para su modificacion
* 
* @autor: Irene Soto
* Página que muestra la informacion de los eventos para su modificacion
*
*/

include_once ("../controladores/ControlModificarEve.php");
?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #000;
}
.hjk {
	font-family: "Comic Sans MS", cursive;
}
.njm {
	font-family: "Comic Sans MS", cursive;
	color: #A00;
	background-color: #000;
}
.Estilo1.Estilo1 strong {
	color: #800;
	font-size: large;
}
.irena {
	color: #800;
}
-->
</style><body bgcolor="white">
	<h1 align="center" class="Estilo1 Estilo1"><strong>Modificar Evento</strong></h1>
<form action="" method="post" name="formId" id="formId">
 
  <select name="evento" class="gh" id="evento">
              <option value="0">Seleccione </option>
  <?php foreach ($eventos as $clave=>$valor): ?>
  		<option value="<?php echo $valor["id"] ?>" ><?php echo $valor["nombre"]?></option>
  <?php endforeach; ?>
  </select>
        <p>
          <input name="Submit" type="submit" class="irena" value="Buscar" />
        </p>
</form>
         

 <?php  if($eve_id):?>	
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar el siguiente evento :</legend>
                
        <p>
          <label>Nombre:
            <?php echo $eve_nombre; ?>
          </label>
        </p>
<p>
          <label>Fecha:
            <?php echo $eve_fecha ; ?>
          </label>
            
    </p>
        
      
  </fieldset>
</form>


   
<form id="formDatos" name="formDatos" method="post" action= "../Formularios/modificar_ev2.php ">
  <fieldset>
    <legend></legend>
    <legend></legend>
    <legend></legend>
    <table>
      <tr align='left'>
        <td align='left'><strong>FECHA ACTUAL</td>
        <td align='left'><input type="text" name="Fecha" readonly="readonly" value="<?php 
			//$fecha= date("d/m/Y");
			$fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );
			echo $fecha?>"></td>
      </tr>
    </table>
    <legend>Ingrese los Nuevos Datos:</legend>
   
    <p>
    <input type="hidden" name="eve_id" Id="eve_id" value="<?php echo $eve_id?>"/>
      <label>Nombre:
        <input name="eve_nombre" type="text" id="eve_nombre" maxlength="15" />
      </label>
    </p>
    <p>
      <label>Fecha: </label>
      <input name="fecha_Evento" id="fecha_Evento" type="text" readonly="readonly" value="" >
    <a href="javascript:NewCssCal('fecha_Evento','YYYYMMDD')"> <img src="scripts/cal.gif" width="16" height="16" border="0" alt="Seleccione una Fecha"> </a>    
    
    </p>
    
    
    <p>
     <center><input name="Enviar" type="submit" class="irena" id="enviar" onClick="validaSubmite()" value="Modificar" />
      <input name="limpiar" type="reset" class="irena" id="limpiar" value=" Limpiar" /></center>
    </p>
  </fieldset>
  
</form>
<?php endif; ?>

</body>
