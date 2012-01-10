<?PHP
/** 
*
* @Lista de Categorias existentes
* 
* @autor: Irene Soto
* Página que lista las distintas categorias y su informacion para fines del administrador
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
	color: #700;
	font-size: x-large;
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
.nn {
	color: #000;
}

</style>

<body bgcolor="white">
	
	</br>
	<p align="center" class="Estilo1"><strong>Lista de Categor&iacute;as</strong></p>
	</br>
   
	<form id="desactivar_user" name="desactivar_user" method="post" action="?controlador=Home&accion=home">
		<table width="300" border="0" align="center" class="lista">
			<tr>
				<th width="300">Nombre</th>
			</tr>

			<?php foreach($categorias as $clave=>$valor):?>
			<tr>
			   <td> <?php echo $valor['cat_nombre']; ?> </td> 
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


