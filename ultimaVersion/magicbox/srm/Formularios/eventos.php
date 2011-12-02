<?Php
/** 
*
* @Creación de eventos
* 
* @autor: Irene 
* Página de creación de eventos, contiene formularios introducidos por el usuario.
*
*/
session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
// Replace the path with where you installed log4php
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
?>
<head>
        <script language='javascript' src="../js/popcalendar.js"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-1.3.2.js" type="text/javascript">        </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.validate.js" type="text/javascript">        </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.metadata.js" type="text/javascript">        </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>messages_es.js" type="text/javascript">        </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-ui-1.7.2.custom.min.js" type=         "text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/i18n/grid.locale-sp.js" type=												         "text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/jquery.jqGrid.min.js">
        </script>
        <script language="javascript" type="text/javascript" src="scripts/datetimepicker_css.js"></script> 
        <script language="JavaScript">
            function acceptNum(e)
			{
				var tecla;
				tecla = (document.all) ? e.keyCode : e.which;
				if(tecla == 8)
				{return true;}
				var patron;
				//patron = /[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUV WXYZ0123456789]/
				patron = /\d/; //solo acepta numeros
				var te;
				te = String.fromCharCode(tecla);
				return patron.test(te);
			}
		</script>
        <script>
		 function validaSubmite(){
			if (document.eventos.desc_Evento.value == false)
				alert("Debe Ingresar Descripcion")
		else	if (document.eventos.nro_Participantes.value == false)
			   alert("Debe Ingresar Numero De Participantes")
			else if (document.eventos.fecha_Evento.value == false)
			   alert("Debe Ingresar Fecha del Evento")
			   
			 else if (document.eventos.fecha_Evento.value < document.eventos.Fecha.value)
			   alert("No se puede agregar un evento en una fecha pasada") 
			
			
			else
       			document.eventos.submit()
			}

		</script>



		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; 
		 display:none}
        body {
	background-image: url(../Imagenes/fondo.png);
}
</style>
		<title>Creacion de Eventos</title>
		
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>

<form id="eventos" name="eventos" method="post" action="eventos2.php">

<table>
		<tr align='left'>	
			<td align='left'><strong>FECHA</td>
			<td align='left'><input type="text" name="Fecha" readonly="readonly" value="<?php 
			//$fecha= date("d/m/Y");
			$fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );
			echo $fecha?>">
			</td>
		</tr>		
</table>
				
<fieldset height="100">
<legend><strong>Datos del evento </strong></legend>
<table align="center" border="0" width="" >
		<tr>
        <table align="center" border="0" width="900">
		 <tr>
     		<td width="500" align='center'><strong>
			Categoria:
			</strong>
	    	</td>
		 </tr>
		</table>
		
        <table align="center" border="0" width="900">
			<tr>
			<td width="500" align='center'>
		
			<select type="submit" name="Cat_nombre" id="Cat_nombre" >
						  <option value="0">Seleccione </option>
		  <?PHP
		$selec_Cat = sql("select cat_nombre from categoria");
	    //$row=oci_fetch_array($selec_Preg,OCI_BOTH);
		 //print_r($row);
		
		
		 while ($rows=oci_fetch_array($selec_Cat,OCI_BOTH))
		{?>
		  <option value="<?php echo $rows["CAT_NOMBRE"]?>" > <?php echo $rows["CAT_NOMBRE"]?></option>
		  <?php  }        
 
  
        if(isset($_POST['Cat_nombre'])) //$_GET si se hace por GET (url)
        $Cat_nombre = $_POST['Cat_nombre']; //Te devolveria el atributo value del option seleccionado		
?>
			
			</select>
            
       
            
	
  
    
    
            	
		</tr>


		</table>
 
 		<table align="center" border="0" width="900">
   		<tr>
		
            <td width="500" align='center'><strong>Nombre del Evento</strong></td>
		</tr>
   
		<tr>
            <td width="500" align='center'><textarea name="desc_Evento" cols='60' rows='3' id="desc_Evento" ></textarea></td>
         </tr>
		</table>
		
        <table align="center" border="0" width="900">	
		 <tr>
		 </tr>
		</table>
	
        <table align="center" border="0" width="900">
		  <tr>
		
            <td width="500" align='center'><strong>Seleccione La Fecha Del Evento</strong></td>
		  </tr>
		  <tr>
            <td width="500" align='center'><p>
              <input name="fecha_Evento" id="fecha_Evento" type="text" readonly="readonly" value="" >
              <a href="javascript:NewCssCal('fecha_Evento','YYYYMMDD')">
            <img src="scripts/cal.gif" width="16" height="16" border="0" alt="Seleccione una Fecha">
            </a>
              </p>
             </td>
            
		   </tr>
		</table>
        
        <table align="center" border="0" width="900">	
		  <tr>
		  <td width="500" align='center'><strong>Seleccione el tipo de Ganador</strong></td>
                <td><label>
                  <input type="radio" name="tipo_Ganador" id="Un_Ganador" value="un_Ganador">
                Un Ganador<br>
                <input name="tipo_Ganador" type="radio" id="Tabla_Resultados" value="tabla_Resultados">
                Tabla de Resultados</label>
                </td>
		  </tr>
		</table>
         <table align="center" border="0" width="900">	
		  <tr>
		  <td width="500" align='center'><strong>Indique el Nro De Participantes</strong></td>
                <td><label>
                  <input type="text" name="nro_Participantes" id="nro_Participantes" onKeyPress="return acceptNum(event)">
                </label></td>
		  </tr>
		</table>
   
        
  
        <tr>
        <input type="button" name="Registrar" id="Continuar con Registro" value="Continuar con Registro" onClick="validaSubmite()">
  <tr> 
</form>


<form name='volverse' action='home.php'> 
  <p>
    <input type="submit" align='center' name="Cancelar" id="button2" value="Cancelar">
  </p>
  <table align='center'>
					<td>&nbsp;</td>
		
					</tr>
  </table>
</form>
<?PHP
require_once("../Contenedores/footer.php");
?>