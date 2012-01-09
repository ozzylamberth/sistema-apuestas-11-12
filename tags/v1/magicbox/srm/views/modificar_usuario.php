<?PHP
/** 
*
 * @Eliminarcion de usuarios
* 
* @autor: Eleany Garcia 
* Página de eliminacion de usuarios contiene la información de las distintas usuarios que se pueden eliminar
*
*/
?>

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

<script>
	function enviar(accion)
	{
		document.getElementById('accion').value=accion;
		
		document.modificar_user.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Modificar Administrador</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="modificar_user" name="modificar_user" method="post" action="?controlador=Usuarios&accion=modificarUsuario_2">
		<input name="accion" id="accion" type="hidden" value="">
		
		<table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione el administrador que desea modificar:</strong>
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
						<legend>Datos del administrador a modificar :</legend>
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
			<br>
			<br>
			
			<table width="400" height="65" border="0" align="center" >
				<tr>
					<th scope="col" colspan="2">
						<legend>Ingrese los Nuevos Datos del administrador:</legend>
					</th>
				</tr>
				<tr>
					<td >
						<legend>Login:</legend>
					</td>
					<td >
						<input name="admin_login" type="text" id="admin_login" maxlength="15" />
					</td>
				</tr>
                <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_login',$mensaje) && trim($mensaje['admin_login'])!='')
							{
								echo $mensaje['admin_login'];
							}
						?>
					</td>	
				</tr>
			
				<tr>
					<td >
						<legend>Contrasena:</legend>
					</td>
					<td >
						<input type="password" name="admin_contrasena" id="admin_contrasena"  maxlength="20"/>
					</td>
				</tr>
                <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_contrasena',$mensaje) && trim($mensaje['admin_contrasena'])!='')
							{
								echo $mensaje['admin_contrasena'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td >
						<legend>Nombre:</legend>
					</td>
					<td >
						<input type="text" name="admin_nombre" id="admin_nombre"  maxlength="45"/>
					</td>
				</tr>
                <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_nombre',$mensaje) && trim($mensaje['admin_nombre'])!='')
							{
								echo $mensaje['admin_nombre'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td >
						<legend>Apellido:</legend>
					</td>
					<td >
						<input type="text" name="admin_apellido" id="admin_nombre"  maxlength="45"/>
					</td>
				</tr>
                <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_apellido',$mensaje) && trim($mensaje['admin_apellido'])!='')
							{
								echo $mensaje['admin_apellido'];
							}
						?>
					</td>	
				</tr>
			</table>	
			
			<center>
				<br>
				<input name="Modificar" type="submit" class="bot" id="Modificar" value="Modificar" align='center' onClick="enviar('Modificar')">
				<br>
				<br>
			</center>
		<?php endif; ?>

	</form>
</body>



