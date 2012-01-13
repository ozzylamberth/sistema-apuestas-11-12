<!-- 
@autor Irene 
Vista o interfaz grafica utilizada al modificar un evento-->

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />


<style type="text/css">
	body {
		background-image: url(Imagenes/fondo.jpg);
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
	.mensaje 
	{
		color: #D00;
		font-size: 12px;
	}
</style>

<script language="javascript" type="text/javascript" src="scripts/datetimepicker_css.js"></script> 

<script>
	function enviar(accion)
	{
		document.getElementById('accion').value=accion;
		
		document.modificar_eve.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Modificar Evento</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="modificar_eve" name="modificar_eve" method="post" action="?controlador=Eventos&accion=modificarEvento_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione el evento que desea modificar:</strong>
				</th>
				<th scope="col">
					<select name="evento" class="gh" id="evento">
						<option value="0">Seleccione </option>
						<?php foreach ($eventos as $clave=>$valor): ?>
							<option value="<?php echo $valor["eve_id"] ?>" ><?php echo $valor["eve_nombre"]?></option>
						<?php endforeach; ?>
					</select>
				</th>
				<th scope="col">
					<input name="Buscar" type="button" class="bot" id="Buscar" value="Buscar" onClick="enviar('buscar')">
				</th>
			</tr>
		</table>
		<br>
		<br>
   
		<?php  if($eve_id):?>
			<input name="eve_id" type="hidden" value="<?php echo $eve_id?>">
  
			<table width="485" height="65" border="0" align="center" class="lista">
				<tr>
					<th scope="col" colspan="2">
						<legend>Datos del evento a modificar :</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>ID:</legend>
					</td>
					<td >
						<legend><?php echo $eve_id ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Nombre:</legend>
					</td>
					<td >
						<legend><?php echo $eve_nombre ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Fecha:</legend>
					</td>
					<td >
						<legend><?php echo $eve_fecha ; ?></legend>
					</td>
				</tr>
			</table>
			
			<br>
			<br>
			<table width="385" height="65" border="0" align="center">
				<tr>
					<th scope="col" colspan="2">
						<legend>Ingrese los nuevos datos del evento:</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>Nombre:</legend>
					</td>
					<td >
						<input name="eve_nombre" type="text" id="eve_nombre" maxlength="100" />
					</td>
				</tr>
                <tr>
		            <td align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_nombre',$mensaje) && trim($mensaje['eve_nombre'])!='')
							{
								echo $mensaje['eve_nombre'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td >
						<legend>Fecha:</legend>
					</td>
					<td >
						<input name="eve_fecha" id="eve_fecha" type="text" readonly="readonly" value="" >
						<a href="javascript:NewCssCal('eve_fecha','YYYYMMDD')"> 
							<img src="scripts/cal.gif" width="16" height="16" border="0" alt="Seleccione una Fecha"> 
						</a>    
					</td>
				</tr>
                <tr>
		            <td align='right'></td>
					<td class="mensaje">
						<?php if(array_key_exists('eve_fecha',$mensaje) && trim($mensaje['eve_fecha'])!='')
							{
								echo $mensaje['eve_fecha'];
							}
						?>
					</td>	
				</tr>
			</table>
			<center>
				<br>
				<input name="Modificar" type="submit" class="bot" id="Modificar" value="Modificar" align='center' onClick="enviar('modificar')">
			</center>
		<?php endif; ?>

	</form>
</body>



