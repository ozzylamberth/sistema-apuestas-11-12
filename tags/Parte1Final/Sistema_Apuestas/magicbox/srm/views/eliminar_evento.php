<!-- 
@autor Irene 
Vista o interfaz grafica utilizada al eliminar un evento-->

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
</style>

<script>
	function enviar(accion)
	{
		document.getElementById('accion').value=accion;
		
		document.eliminar_eve.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Eliminar Evento</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="eliminar_eve" name="eliminar_eve" method="post" action="?controlador=Eventos&accion=eliminarEvento_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione el evento que desea eliminar:</strong>
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
						<legend>Datos del evento a eliminar :</legend>
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
				<tr>
					<td >
						<legend>Nro de Participantes:</legend>
					</td>
					<td >
						<legend><?php echo $eve_nro_part ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Nro de Ganadores:</legend>
					</td>
					<td >
						<legend><?php echo $eve_nro_gan ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Razon de Pago:</legend>
					</td>
					<td >
						<legend><?php echo $eve_tipo_pago ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Estatus:</legend>
					</td>
					<td >
						<legend><?php echo $eve_status ; ?></legend>
					</td>
				</tr>
			</table>
			<center>
				<br>
				<input name="Eliminar" type="submit" class="bot" id="Eliminar" value="Eliminar" align='center' onClick="enviar('eliminar')">
			</center>
		<?php endif; ?>

	</form>
</body>



