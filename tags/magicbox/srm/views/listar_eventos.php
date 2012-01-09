<?PHP
/** 
*
* @Lista de eventos existentes
* 
* @autor: Irene Soto
* Página que lista los distintos eventos y su informacion para fines del administrador
*
*/
?>

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
	color: #800;
	font-size: x-large;
	text-align: center;
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
.kk {
	color: #000;
}

>
</style>

<body bgcolor="white">
	</br>
	<p align="center" class="Estilo1"><strong>Lista de Eventos</strong></p>
	</br>
	<form id="desactivar_user" name="desactivar_user" method="post" action="?controlador=Home&accion=home">

		<table width="900" border="0" align="center" class="lista">
			<tr class="kk">
				<th width="200">Nombre</th>
				<th width="200">Status</th>
				<th width="200">Fecha</th>
				<th width="300">Nro. de Participantes</th>
				<th width="300">Nro. de Ganadores</th>
				<th width="200">Razon de Pago</th>
			</tr>
       
			<?php foreach($lista_eve as $clave=>$valor):?>
			<tr>
				<td width="200" scope="col"> <?php echo $valor['eve_nombre']; ?> </td> 
				<td width="200" scope="col"> <?php  echo $valor['eve_status']; ?></td>
				<td width="200" scope="col"> <?php echo $valor['eve_fecha']; ?> </td> 
				<td width="300" scope="col"> <?php  echo $valor['eve_nro_part']; ?></td>
				<td width="300" scope="col"> <?php echo $valor['eve_nro_gan']; ?> </td>
				<td width="200" scope="col"> <?php echo $valor['eve_tipo_pago']; ?>:1 </td>
			</tr>
			<?php endforeach; ?>
		</table>
    
		<center>
			<input name="Continuar" type="submit" class="bot" id="Continuar" value="Continuar" align='center'>
			</br></br>
			<p><img src="Imagenes/CASAAPUESTASOG.gif" width="907" height="106" alt="25"></p>
		</center>
	</form>
</body>
