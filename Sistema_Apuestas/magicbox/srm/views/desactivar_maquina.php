<!-- 
@autor Irene
Vista o interfaz grafica utilizada al desactivar una maquina-->

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
		
		document.desactivar_maq.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Desactivar Maquina</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="desactivar_maq" name="desactivar_maq" method="post" action="?controlador=Maquinas&accion=desactivarMaquina_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione la maquina que desea desactivar:</strong>
				</th>
				<th scope="col">
					<select name="maquinas" class="gh" id="maquinas">
						<option value="0">Seleccione </option>
						<?php foreach ($maquinas as $clave=>$valor): ?>
							<option value="<?php echo $valor["maq_id"] ?>" ><?php echo $valor["maq_id"].'.-'.$valor["maq_marca"].' '.$valor["maq_modelo"]?></option>
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
   
		<?php  if($maq_id):?>
			<input name="maq_id" type="hidden" value="<?php echo $maq_id?>">
  
			<table width="485" height="65" border="0" align="center" class="lista">
				<tr>
					<th scope="col" colspan="2">
						<legend>Datos de la maquina a desactivar :</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>Id:</legend>
					</td>
					<td >
						<legend><?php echo $maq_id ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Marca:</legend>
					</td>
					<td >
						<legend><?php echo $maq_marca ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Modelo:</legend>
					</td>
					<td >
						<legend><?php echo $maq_modelo ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Memoria:</legend>
					</td>
					<td >
						<legend><?php echo $maq_memoria ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Procesador:</legend>
					</td>
					<td >
						<legend><?php echo $maq_procesador ; ?></legend>
					</td>
				</tr>
			</table>
			<center>
				<br>
				<input name="Desactivar" type="submit" class="bot" id="Desactivar" value="Desactivar" align='center' onClick="enviar('Desactivar')">
			</center>
		<?php endif; ?>

	</form>
</body>



