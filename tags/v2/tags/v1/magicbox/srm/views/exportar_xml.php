<?PHP
/** 
*
 * @Eliminarcion de categorias
* 
* @autor: Eleany Garcia 
* Página de eliminacion de categorias contiene la información de las distintas categorias que se pueden eliminar
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
</style>

<script>
	function enviar(ruta,accion)
	{
		//alert("hola");
		//document.getElementById('accion').value=accion;
		document.getElementById('accion').value=accion;
		document.getElementById('direccion').value=ruta;
		document.formulario.submit();
	}
</script>

<body>
	<p align="center" class="Estilo1">
		<img src="Imagenes/header.gif" width="997" height="142" alt="Banner1">
	</p>
	 
	<center>
		<h1 align="center" class="Estilo1">
			<strong>Exportar Datos a un Archivo XML</strong>
		</h1>
	</center>
	</br>
	</br>
	
	<form id="formulario" name="formulario" method="post" action="?controlador=Xml&accion=ExportarXml">
		<input name="accion" type="hidden" value="">
		
		<!--table width="600" border="0" align="center">
			<tr>
				<th scope="col">
					<strong>Seleccione la ubicaci&oacute;n del archivo XML:</strong>
				</th>
				<th scope="col">
					<INPUT TYPE=file NAME="html_file" ACCEPT="text/html">
				</th>
			</tr>
		</table-->
		<br>
		<br>
		<center>
        	<INPUT type=hidden name="accion" id="accion" value="" size="75px">
        
			<table width="600" border="0" align="center">
				<tr>
					<th scope="col" colspan="2">
						<strong>Carpeta seleccionada:</strong>
						<INPUT type=text name="direccion" id="direccion" value="<?Php echo trim($ruta); ?>" size="75px">
						</br>
					</th>
				</tr>
				<tr>
					<th scope="col" colspan="2">	
						<input name="Continuar" type="submit" class="bot" id="Continuar" value="Continuar" align='center' onClick="enviar(document.getElementById('direccion').value,'exportar')">
						&nbsp;&nbsp;
						<input name="Resetear" type="submit" class="bot" id="Resetear" value="Resetear" align='center' onClick="enviar('','buscar')">
						</br></br></br>
					</th>
				</tr>
				<?Php		
					
					if (is_dir($ruta)) 
					{ 
						if ($dh = opendir($ruta)) 
						{ 
							while (($file = readdir($dh)) !== false) 
							{ 
								if (is_dir($ruta . $file) && $file!="." && $file!="..")
								{ 
				?>   

									<tr>
										<th scope="col">
											<img src="Imagenes/carpeta-icono.png" width="16" height="18" alt="Banner1">
										</th>
										<th scope="col" align="left">
											<a href="javascript:enviar('<?Php echo "$ruta$file"; ?>','buscar')"><?Php echo " $ruta$file"; ?></a>
										</th>
									</tr>
				<?Php
								} 
							} 
							closedir($dh); 
						} 
					}else 
						echo "<br>No es ruta valida";  
				?>
				
			</table>
		</center>
	<?Php		
		function listar_directorios_ruta($ruta){ 
   // abrir un directorio y listarlo recursivo 
   
   
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
            //mostraría tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               
			   //echo "<br>Directorio: $ruta$file"; 
               
			   //listar_directorios_ruta($ruta . $file . "/"); 
            } 
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>No es ruta valida"; 
} 

listar_directorios_ruta('C:/');
?>

	</form>
</body>



