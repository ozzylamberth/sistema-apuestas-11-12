<!-- 
@autor Irene 
Interfaz utilizada al desactivar un usuario-->

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
		
		document.desactivar_user.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Desactivar Administrador</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="desactivar_user" name="desactivar_user" method="post" action="?controlador=Usuarios&accion=desactivarUsuario_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione el administrador que desea desactivar:</strong>
				</th>
				<th scope="col">
					<select name="administrador" class="gh" id="administrador">
						<option value="0">Seleccione </option>
						<?php foreach ($administradores as $clave=>$valor): ?>
							<option value="<?php echo $valor["admin_cedula"] ?>" ><?php echo $valor["admin_login"]?></option>
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
   
		<?php  if($admin_cedula):?>
			<input name="admin_cedula" type="hidden" value="<?php echo $admin_cedula?>">
  
			<table width="485" height="65" border="0" align="center" class="lista">
				<tr>
					<th scope="col" colspan="2">
						<legend>Datos del administrador a desactivar :</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>Cedula:</legend>
					</td>
					<td >
						<legend><?php echo $admin_cedula ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Nombre:</legend>
					</td>
					<td >
						<legend><?php echo $admin_nombre ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Apellido:</legend>
					</td>
					<td >
						<legend><?php echo $admin_apellido ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Login:</legend>
					</td>
					<td >
						<legend><?php echo $admin_login ; ?></legend>
					</td>
				</tr>
				<tr>
					<td >
						<legend>Estatus:</legend>
					</td>
					<td >
						<legend><?php echo $admin_status ; ?></legend>
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



