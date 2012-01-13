<!--
@autor Eleany G
 Vista o interfaz grafica utilizada al eliminar una categoria-->

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
		
		document.eliminar_ca.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Eliminar Categoria</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="eliminar_ca" name="eliminar_ca" method="post" action="?controlador=Categorias&accion=eliminarCategoria_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione la  Categoria que desea eliminar:</strong>
				</th>
				<th scope="col">
					<select name="categoria" class="gh" id="categoria">
						<option value="0">Seleccione </option>
						<?php foreach ($categorias as $clave=>$valor): ?>
							<option value="<?php echo $valor["cat_id"] ?>" ><?php echo $valor["cat_nombre"]?></option>
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
   
		<?php  if($cat_id):?>
			<input name="cat_id" type="hidden" value="<?php echo $cat_id?>">
  
			<table width="485" height="65" border="0" align="center" class="lista">
				<tr>
					<th scope="col" colspan="2">
						<legend>Datos de la Categoria a Eliminar :</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>ID:</legend>
					</td>
					<td >
						<legend><?php echo $cat_id ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Nombre:</legend>
					</td>
					<td >
						<legend><?php echo $cat_nombre ; ?></legend>
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



