<!-- 
@autor Eleany G
Vista o interfaz grafica utilizada al listar ganadores-->

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
				<div  style="background-image:url(Imagenes/fondo.jpg)"class="article">
					
						<form name="form1" method="post" action="">
							<center> 
								<table width="500" border="0">
									<tr>
										<td width="300">
											<p><span class="hhh"><strong>Seleccione Evento</strong>:</span></p>
											<p>
												<select name="eve" class="gh" id="eve">
													<option value="0">Seleccione </option>
													<?php foreach ($eventos as $clave=>$valor): ?>
														<option value="<?php echo $valor["eve_id"] ?>" > <?php echo $valor["eve_nombre"]?></option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
											  <input name="Buscar" type="submit" class="irina" id="Buscar" value="Buscar">
											</p>
										</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</center>

							<?php  if($eve_id): ?> 
								<p align="center"><strong>  Evento: <?php  echo $eve_nombre?> </strong></p>
								<p align="center" ><strong> Fecha: <?php echo $eve_fecha?> </strong></p>
								<p align="center" ><strong>Nro de Ganadores: <?php echo $eve_nro_gan?></strong></p>
								
								<table width="500" border="0" align="center" class="lista">
									<tr>
										<th  align="center" >Nombres de los Ganadores</th>
									</tr>
								 
									<?php foreach($ganadores_eve as $clave=>$valor):?>
									<tr>
										<td width="200" scope="col"> <?php echo $valor['par_nombre']; ?> </td> 
									</tr>
									<?php endforeach; ?>
										
								</table>
			
							<?php endif; ?>	
						</form> 
						<br>
					
				  
					<p><center><img src="Imagenes/FB-ES-980x200-MW-9660-Europa-League.jpg" width="959" height="124" alt="nanyta" /></center></p>
				  
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

