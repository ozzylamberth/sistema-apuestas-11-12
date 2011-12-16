 <script language="javascript" type="text/javascript" src="scripts/datetimepicker_css.js"></script> 
 <script>
		 function validaSubmite()
		   {
			if (document.formDatos.eve_nombre.value == false)
				alert("Debe ingresar el nombre del evento")
			else if (document.formDatos.fecha_Evento.value == false)
				alert("Debe ingresar la fecha")
			else if(document.formDatos.eve_nro_part.value == false)
				alert("Debe ingresar el numero de participantes")
			else if	(document.formDatos.eve_nro_gan.value == false)
				alert("Debe ingresar el numero de ganadores")
		    else if (document.formDatos.fecha_Evento.value < document.formDatos.Fecha.value)
			   alert("No se puede agregar un evento en una fecha pasada") 
			else if (document.formDatos.eve_nro_part.value < document.formDatos.eve_nro_gan.value)
			   alert("El evento no puede tener mas ganadores que participantes")    
   			else
			document.formDatos.submit()
			}
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

session_start();
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
}
-->
</style><body bgcolor="white">
	<h1 align="center" class="Estilo1 Estilo1"><strong>Modificar Evento</strong></h1>
<form action="" method="post" name="formId" id="formId">
  <p>
    <?php 
			//$fecha= date("d/m/Y");
			$fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );
			?>
    <?php
	
	

$eve_nombre='';
$eve_fecha='';
$eve_nro_part=0;
$eve_nro_gan=0;
$eve_tipo_pago=0;
$eve_id=0;
$eve_status='';

             $selec_evento= sql("SELECT eve_nombre FROM evento where eve_status LIKE 'Activo'");

?>
  </p>
  <p>
    <select name="eve_nombre1" class="hjk" id="eve_nombre1">
      <option value="0">Seleccione </option>
      <?php  
     while ($rows=oci_fetch_array($selec_evento,OCI_BOTH))
          {?> 
      <option value="<?php echo $rows["EVE_NOMBRE"] ?>" > <?php echo $rows["EVE_NOMBRE"]?></option>
      <?php  } ?>
    </select>
      <?php
  
  if(isset($_POST['eve_nombre1'])) //$_GET si se hace por GET (url)
      $eve_nombre = $_POST['eve_nombre1']; //Te devolveria el atributo value del option seleccionado
      ?>
  </p>
        <p>
          <input name="Submit" type="submit" class="njm" value="Buscar" />
        </p>
</form>
         <?php 
            $selec_Eve=sql("SELECT eve_id, eve_fecha, eve_nro_part, eve_nro_gan, eve_tipo_pago FROM evento WHERE eve_nombre LIKE '$eve_nombre'");
          
	 While($fila=oci_fetch_array($selec_Eve,OCI_BOTH)){
	     $eve_id=$fila['EVE_ID'];
		 $eve_fecha=$fila['EVE_FECHA'];
	     $eve_nro_part = $fila['EVE_NRO_PART'];
		 $eve_nro_gan = $fila['EVE_NRO_GAN'];
         $eve_tipo_pago = $fila['EVE_TIPO_PAGO'];
		
       }
	 ?>

	
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
        
          <p>
          <label>Nro de Participantes:
            <?php echo $eve_nro_part ; ?>
          </label>
            
        </p>
        
         <p>
          <label>Nro de Ganadores:
            <?php echo $eve_nro_gan ; ?>
          </label>
            
        </p>
  </fieldset>
</form>


   <?php if ($eve_id!=0){?>
<form id="formDatos" name="formDatos" method="post" action= "modificar_ev2.php ">
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
      <label>Nro de Participantes: </label>
      <input type="text" name="eve_nro_part" id="eve_nro_part"  maxlength="45"/>
    </p>
    
    <p>
      <label>Nro de Ganadores: </label>
      <input type="text" name="eve_nro_gan" id="eve_nro_gan"  maxlength="45"/>
    </p>
    
    
    <p>
     <center><input name="enviar" type="button" class="njm" id="enviar" onClick="validaSubmite()" value="Modificar" />
      <input name="limpiar" type="reset" class="njm" id="limpiar" value=" Limpiar" /></center>
    </p>
  </fieldset>
  
</form>
<?php } ?>

</body>
