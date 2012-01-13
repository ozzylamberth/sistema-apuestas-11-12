<!-- 
@ autor Irene
Vista o interfaz grafica utilizada al listar los usuarios -->

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />

<style type="text/css">
<
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(Imagenes/fondo.jpg);
	color: #700;
	font-size: x-large;
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
.mm {
	color: #000;
}
>
</style>

<body bgcolor="white">
	</br>
	<p align="center" class="Estilo1"><strong>Lista de Administradores</strong></p>
	</br>
   
	<form id="desactivar_user" name="desactivar_user" method="post" action="?controlador=Home&accion=home">
		<table width="800" border="0" align="center" class="lista">
			<tr class="mm">
				<th width="200">Cedula</th>
				<th width="200">Nombre</th>
				<th width="200">Apellido</th>
				<th width="200">Login</th>
				<th width="200">Status</th>
			</tr>
	   
			<?php foreach($lista_usuarios as $clave=>$valor):?>
			<tr>
				<td width="200" scope="col"> <?php  echo $valor['admin_cedula']; ?></td>
				<td width="200" scope="col"> <?php echo $valor['admin_nombre']; ?> </td>  
				<td width="200" scope="col"> <?php  echo $valor['admin_apellido']; ?></td>
				<td width="200" scope="col"> <?php echo $valor['admin_login']; ?> </td>
				<td width="200" scope="col"> <?php  echo $valor['admin_status']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
    
		<center>
			<input name="Continuar" type="submit" class="bot" id="Continuar" value="Continuar" align='center'>
			</br></br>
			<p><img src="Imagenes/ClasicosFutbol.gif" width="814" height="97" alt="cf"></p>
		</center>
	</form>
</body>


