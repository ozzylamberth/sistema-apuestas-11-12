<!-- 
@autor Irene
Vista o interfaz grafica utilizada agregar los datos de un evento-->
<head>
        <script language='javascript' src="../js/popcalendar.js"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-1.3.2.js" type="text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.validate.js" type="text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery.metadata.js" type="text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>messages_es.js" type="text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jquery-ui-1.7.2.custom.min.js" type= "text/javascript"></script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/i18n/grid.locale-sp.js" type=	"text/javascript"> </script>
		<script language="JavaScript" src="<?php echo(DIR_JS)?>jqGrid3.6.5/js/jquery.jqGrid.min.js"> </script>
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

			function validaSubmite(){
			/*
				if (document.eventos.desc_Evento.value == false)
					alert("Debe Ingresar Descripcion")
				else if (document.eventos.nro_Participantes.value == false)
					alert("Debe Ingresar Numero De Participantes")
				else if (document.eventos.fecha_Evento.value == false)
					alert("Debe Ingresar Fecha del Evento")
				else if (document.eventos.fecha_Evento.value < document.eventos.Fecha.value)
					alert("No se puede agregar un evento en una fecha pasada") 
				else */
					document.eventos.submit()
			}

		</script>



		
        <style type="text/css">
			label.error 
			{ 
				float: none; color: red; 
				padding-left: .5em; 
				vertical-align: text-bottom; 
				display:none
			}
        
			body 
			{
				background-image: url(Imagenes/fondo.jpg);
			}
			
			#eventos legend strong 
			{
				color: #800;
			}
        
			body,td,th 
			{
				font-family: Comic Sans MS, cursive;
			}
			
			.nn 
			{
				font-family: "Comic Sans MS", cursive;
				color: #800;
			}
			
			.mensaje 
			{
				color: #D00;
				font-size: 12px;
			}
        </style>
		
		<title>Creacion de Eventos</title>
		
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>

	<form id="eventos" name="eventos" method="post" action="?controlador=Eventos&accion=agregarEvento_2">

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
			<table align="center" border="0" width="600">
				<tr>
					<td width="200" align='right'><strong> Categoria: </strong></td>
					<td width="400" align='left'>
						<select name="categoria" class="gh" id="categoria">
							<option value="0">Seleccione </option>
							<?php foreach ($categorias as $clave=>$valor): ?>
								<option value="<?php echo $valor["cat_id"] ?>" ><?php echo $valor["cat_nombre"]?></option>
							<?php endforeach; ?>
						</select>
				</tr>
				<tr>
		            <td width="500" align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_categoria_id',$mensaje) && trim($mensaje['eve_categoria_id'])!='')
							{
								echo $mensaje['eve_categoria_id'];
							}
						?>
					</td>	
				</tr>
			</table>
 
			<table align="center" border="0" width="700">
				<tr>
		            <td width="500" align='right'><strong>Nombre del Evento</strong></td>
					<td width="500" align='left'><input name="desc_Evento" type="text" id="desc_Evento" value="" size="60" maxlength="30"></td>
				</tr>
				<tr>
		            <td width="500" align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_desc',$mensaje) && trim($mensaje['eve_desc'])!='')
							{
								echo $mensaje['eve_desc'];
							}
						?>
					</td>	
				</tr>
				<tr>
		            <td width="500" align='right'><strong>Seleccione La Fecha Del Evento</strong></td>
		            <td width="500" align='left'>
						<p>
							<input name="fecha_Evento" id="fecha_Evento" type="text" readonly="readonly" value="" >
							<a href="javascript:NewCssCal('fecha_Evento','YYYYMMDD')">
								<img src="scripts/cal.gif" width="16" height="16" border="0" alt="Seleccione una Fecha">
							</a>
						</p>
					</td>
                </tr>
				<tr>
		            <td width="500" align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_fecha',$mensaje) && trim($mensaje['eve_fecha'])!='')
							{
								echo $mensaje['eve_fecha'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td width="500" align='right'><strong>Seleccione el tipo de Ganador</strong></td>
					<td>
						<label>
							<input type="radio" name="tipo_Ganador" id="Un_Ganador" value="un_Ganador" checked>Un Ganador<br>
							<input name="tipo_Ganador" type="radio" id="Tabla_Resultados" value="tabla_Resultados">Tabla de Resultados
						</label>
					</td>
				</tr>
				<tr>
					<td width="500" align='right'><strong>Indique el Nro De Participantes</strong></td>
					<td>
						<label>
							<input name="nro_Participantes" type="text" id="nro_Participantes" onKeyPress="return acceptNum(event)" maxlength="4">
						</label>
					</td>
					<tr>
		            <td width="500" align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_nro_par',$mensaje) && trim($mensaje['eve_nro_par'])!='')
							{
								echo $mensaje['eve_nro_par'];
							}
						?>
					</td>	
				</tr>
				</tr>
				<tr>
					
				</tr> 
			</table>
   
        <!--input name="cat_id" type="hidden" value="<?php echo $cat_id?>">
       <input name="cat_nombre" type="hidden" value="<?php echo $cat_nombre?>"-->
  
	</form>


	<center>
        <p>
			<input name="Registrar" type="submit" class="nn" id="submit" value="Continuar">
            <input name="Cancelar" type="button" class="nn" id="button2" value="Cancelar" align='left' onClick="window.location='?controlador=Eventos&accion=agregarEvento_2'">
        </p>
	</center>
    <center>
		<p>
			<img src="Imagenes/ELECCIONES2012.gif" width="1000" height="90" alt="gg">
		</p>
	</center>

<?PHP
require_once("Contenedores/footer.php");
?>