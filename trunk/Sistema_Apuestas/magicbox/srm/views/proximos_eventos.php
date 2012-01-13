<!-- Vista o interfaz grafica utilizada al listar los eventos proximos-->


<?PHP
require_once("Contenedores/header_styles.php");
?>


	<script language=javascript>
		function ventanaSecundaria (URL){
		   window.open(URL,"ventana1","width=120,height=300,scrollbars=NO,resizable=no")
		}
	</script> 


<div class="main">
	<?PHP
	require_once("Contenedores/header_banner_menus.php");
	?>
  
	<div class="content">
		<div class="content_resize">
			<div class="mainbar">
				<div style="background-image:url(Imagenes/fondo.jpg); font-size: 12px;"class="article">
					<form name="form1" method="post" action="">
						<center>
							<table width="500" border="0">
								<tr>
									<td width="300">
										<p><strong>Seleccione Evento</strong>: </p>
										<p>
											<select name="eve" class="gh" id="eve">
												<option value="0">Seleccione </option>
												<?php foreach ($eventos as $clave=>$valor): ?>
													<option value="<?php echo $valor["eve_id"] ?>" > <?php echo $valor["eve_nombre"]?></option>
												<?php endforeach; ?>
											</select>
										</p>
										<p class="Estilo1 Estilo3">
											<input name="Buscar" type="submit" class="fff" id="Buscar" value="Buscar">
										</p>
									</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</center>        
		 
		  
						<?php  if($eve_id):?>
					 
							<form id="formAdmin" name="formAdmin" method="post" action="">

								<p align="center" class="Estilo1"><strong>  Evento: <?php  echo $eve_nombre?> </strong></p>
								<p align="center" class="Estilo1"><strong> Fecha de inicio: <?php echo $eve_fecha?> </strong></p>
								<p align="center" class="Estilo1"><strong>Nro de Participantes: <?php echo $eve_nro_part?> </strong></p>
					 
								<table width="500" border="0" align="center" class="lista">
									<tr>
										<th width="200" height="22" colspan="2">Datos de los Participantes</th>
									</tr>
									<tr>
										<th width="200" height="22">Nombre</th>
										<th width="200">Razon de Pago</th>
									</tr>
									<?php foreach($participantes_eve as $clave=>$valor):?>
										<tr>
											<td width="200" scope="col"> <?php echo $valor['par_nombre']; ?> </td> 
											<td width="200" scope="col"> <?php echo $valor['pe_tipo_pago']; ?> </td>
										</tr>
								  <?php endforeach; ?>     
										
								</table>
						<?php endif; ?>

					</form>
					<br>
	  
					<center>
						<p><img src="Imagenes/3671.gif" width="892" height="90" alt="banner" /></p>
					</center>

					<div class="clr"></div>
					<div class="clr"></div>
				</div>
					<p class="pages"><small>Page 1 of 1</small> <span>1</span> </p>
			</div>
		  

			<?PHP
			require_once("Contenedores/footer_otro.php");
			?>
			
		</div>
	</div>
</div>