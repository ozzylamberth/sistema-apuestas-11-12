<?Php

/** 
*
* @Creación de catgorías
* 
* @autor: Eleany 
* Página de creación de categorias contiene la información del formulario y se 
*
*/

?>
<script>

function validaSubmite(){
	/*
	if (document.categoria.cat_nombre.value == false ){
		alert("Debe ingresar la categoria")		
	}
	else */
       document.categoria.submit()
}
</script>

<head>
    <style type="text/css">
        label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}

        body,td,th 
		{
			font-family: Comic Sans MS, cursive;
			font-weight: bold;
		}
		body 
		{
			background-image: url(Imagenes/fondo.jpg);
		}
		#categoria center h1 
		{
			color: #700;
			font-size: large;
		}
        .buttones 
		{
			font-family: "Comic Sans MS", cursive;
			color: #800;
			background-color: #000;
		}
        .bl 
		{
			background-color: #F0F0F0;
			background-image: url(Imagenes/1323959047_profile_add.png);
			border-top-color: #200;
		}
        .xxx 
		{
			color: #800;
		}
		.mensaje 
		{
			color: #D00;
			font-size: 12px;
		}
    </style>
		
		<title>
		Registro de Categoria
		</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
            <body>
				<form action="?controlador=Categorias&accion=guardarCategoria" name="categoria"  id="categoria" method="post">
					<center>
					  <h1><img src="Imagenes/GA1_Carousel_1995_2011_genTeaserKickoffX_bwincom.jpg" width="942" height="177" alt="ll"></h1>
					  <h1>Registro de Categorias</h1>
					</center>
					
					<table align="center">
						<tr align='center'>	
							<td align='left'><strong>FECHA</td>
							<?php $fecha1=time(); $fecha1 -= (270 * 60); $fecha = date("Y-m-d", $fecha1 ); ?>
							<td align='left'><input type="text" name="Fecha" readonly="readonly" value="<?php echo $fecha?>"></td>
						</tr>		
					</table>
				
				<fieldset height="100">
					<legend></legend>

					<table align="center" border="0" width="" >
						<tr>
							<td width="504" align="center"><strong>Ingrese Categoria</strong></td>
						</tr>
						<tr>
							<td width="504" align="center"><input name="cat_nombre" type="text" id="cat_nombre" value="" size="60" maxlength="30"></td>
						</tr>
						<tr>
							<td width="504" align="center" class="mensaje"> 
								<?php if(trim($mensaje)!='')
								{	
									echo $mensaje;
								}
								?>
							</td>
						</tr>
						<tr>
							<td width="504" align="center">
								<input name="Registrar" type="button" class="xxx" id="Registrar" onClick="validaSubmite()" value="Registrar">
							</td>
						</tr>

					</table> 
					<?PHP
					////Seleccionar esta opcion si es Un evento que tenga mas de un ganador por ejemplo concursos de belleza.
					?>		
		  
				</form>

<?PHP
require_once("Contenedores/footer.php");
?>