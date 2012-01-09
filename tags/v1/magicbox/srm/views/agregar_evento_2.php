<head>
    <script>
		 function validaSubmite(){
			if (document.eventos2.nro_Resultados.value == null)
				alert("La tabla de resultados ni puede tener mas ganadores que participantes")
			else
     			document.eventos2.submit()
			}
    </script>
    
    <script language="JavaScript">
        function acceptNum(e)
		{
			var tecla;
			tecla = (document.all) ? e.keyCode : e.which;
			if(tecla == 8)
			{return true;}
			var patron;
			//patron = /[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUV WXYZ0123456789]/
			patron = /\d/; //solo acepta numeros
			var te;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
			
		function agregarParticipante(nro_participantes)
		{
			var part=document.getElementById('par_nombre').value;
			var part_nombre=document.getElementById('par_nombre').options[document.getElementById('par_nombre').selectedIndex].text;
			var i=1;
					
			if(part==0)
				alert('debe escoger a un participante');
			else
			{
				while(i<=nro_participantes)
				{
					var nombre='Participante_'+i;
					var id='Id_'+i;

					if(document.getElementById(nombre).value==part_nombre)
					{
						alert('No se puede agregar el mismo participante dos veces!');
						break;
					}
					else
					{
						if(document.getElementById(nombre).value=='')
						{    								
							document.getElementById(id).value=part;
							document.getElementById(nombre).value=part_nombre;
							break;
						}
					}
					i++;
				}
			}
		}
	</script>
        
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<head>
    <style type="text/css">
        label.error 
		{ 
		float: none; 
		color: red; 
		padding-left: .5em; 
		vertical-align: 
		text-bottom; display:none
		}
        body,td,th 
		{
			font-family: Comic Sans MS, cursive;
			color: #000;
			font-weight: bold;
		}
		body 
		{
			background-image: url(Imagenes/fondo.jpg);
			color: #800;
		}
		.hhhh 
		{
			color: #800;
		}
		.mensaje 
		{
			color: #D00;
			font-size: 12px;
		}
    </style>
</head>

<body>
	<form action="?controlador=Eventos&accion=agregarEvento_3" method="post" name="eventos2">
	    <?php 
	 	if ($eve_tipo_ganador==='un_Ganador') {
		?>

        <p><strong>Seleccione los participantes y presione agregar (en caso de no existir agreguelos)</strong></p>
			<table align="center" border="1" width="900">
				<tr>
					<td width="500" height="137" align='center'><p>
						<strong>Seleccione Tipo De Pago:    
							<select name="tipo_Pago" id="tipo_Pago">
								<option value="0">Seleccione</option>
								<option value="1">1:1</option>
								<option value="2">2:1</option>
								<option value="3">3:1</option>
								<option value="4">4:1</option>
								<option value="5">5:1</option>
								<option value="6">6:1</option>
								<option value="7">7:1</option>
								<option value="8">8:1</option>
								<option value="9">9:1</option>
								<option value="10">10:1</option>
							</select> 
						</strong></p>
			  
						<p>
							<select name="par_nombre" class="gh" id="par_nombre">
								<option value="0">Seleccione </option>
								<?php foreach ($participantes as $clave=>$valor): ?>
									<option value="<?php echo $valor["par_id"] ?>" ><?php echo $valor["par_nombre"]?></option>
								<?php endforeach; ?>
 
							</select>
                    
							<input name="eve_nro_par" type="hidden" value="<?php echo $eve_nro_par?>">
							<input name="eve_tipo_ganador" type="hidden" value="<?php echo $eve_tipo_ganador?>"> 
							<input name="eve_fecha" type="hidden" value="<?php echo $eve_fecha?>"> 
							<input name="eve_desc" type="hidden" value="<?php echo $eve_desc?>">
							<input name="eve_categoria_id" type="hidden" value="<?php echo $eve_categoria_id?>">
							<input name="eve_tipo_ganador" type="hidden" value="<?php echo $eve_tipo_ganador?>">
                   
							<input name="Agregar" type="button" class="hhhh" id="Agregar" onClick="javascript:agregarParticipante('<?php echo $eve_nro_par?>')" value="Agregar">
						</p>
						
							</br></br>
							<?php 
								$nro_Part=1;
								while ($nro_Part <=  $eve_nro_par)
								{
							?>
									<input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
									<?php echo $nro_Part.".- " ?><input name="Participante_<?php echo $nro_Part ?>" type="text" id="Participante_<?php echo $nro_Part ?>" size="40" maxlength="40">
									<!--input name="Participante_<?php echo $nro_Part ?>" type="hidden" value="Participante_<?php echo $nro_Part ?>"-->
		            	            
									<div id="eje_<?php echo $nro_Part ?>" class="mensaje">
										<?php if(array_key_exists('Participante_'.$nro_Part,$mensaje) && trim($mensaje['Participante_'.$nro_Part])!='')
											{
												echo "<br>";
												echo $mensaje['Participante_'.$nro_Part];
												echo "<br>";
											}
										?>
									</div>
									</br>
		            
							<?php $nro_Part++; 
								}
							?>

							<input name="button" type="submit" class="hhhh1" id="button" value="continuar" align='center'>
						
						</br>
						<center>
							<img src="Imagenes/BANNERMISS.gif" width="1000" height="90" alt="misses">
						</center>

						<p>&nbsp;</p>
					</td>
				</tr>
			</table>
			

	

		<?php 	
		} 	
		if ($eve_tipo_ganador==='tabla_Resultados')
		{   
		?>

	    <p>&nbsp;</p>
			<table align="center" border="0" width="900">
				<tr>
				<td width="500" align='center'>
					<p><strong> Ingrese el Nro de resultados:</p></strong> 
					<p><strong> <input name="nro_Resultados" type="text" id="nro_Resultados" onKeyPress="return acceptNum(event)" maxlength="4"> </strong></p>
					<p><strong>Seleccione los participantes y presione agregar (en caso de no existir agreguelos)</strong></p>
					<p><strong>
	                    <select name="par_nombre" class="gh" id="par_nombre">
							<option value="0">Seleccione </option>
							<?php foreach ($participantes as $clave=>$valor): ?>
								<option value="<?php echo $valor["par_id"] ?>" ><?php echo $valor["par_nombre"]?></option>
							<?php endforeach; ?>
						</select>
          				
						<input name="eve_nro_par" type="hidden" value="<?php echo $eve_nro_par?>">
						<input name="eve_tipo_ganador" type="hidden" value="<?php echo $eve_tipo_ganador?>"> 
						<input name="eve_fecha" type="hidden" value="<?php echo $eve_fecha?>"> 
						<input name="eve_desc" type="hidden" value="<?php echo $eve_desc?>">
						<input name="eve_categoria_id" type="hidden" value="<?php echo $eve_categoria_id?>">
						<input name="eve_tipo_ganador" type="hidden" value="<?php echo $eve_tipo_ganador?>">
          
          
						<input name="Agregar" type="button" class="hhhh" id="Agregar" onClick="javascript:agregarParticipante('<?php echo $eve_nro_par?>')" value="Agregar">
	          
					</strong></p>
					<p>
						<strong>Ingrese el Nombre, Raz&oacute;n de pago y Monto tope si aplica</strong>
					</p>

					<?php
						$nro_Part=1;
						while ($nro_Part <=  $eve_nro_par)
						{
							echo $nro_Part.".- ";
					?>
                  
                    <input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
                  
					<input name="Participante_<?php echo $nro_Part ?>" type="text" id="Participante_<?php echo $nro_Part ?>" size="20" maxlength="20">
					<label>
						<select name="tipo_Pago_<?php echo $nro_Part ?>" id="tipo_Pago_<?php echo $nro_Part ?>">
							<option value="1">2:1</option>
							<option value="2">1:1</option>
							<option value="3">3:1</option>
							<option value="4">4:1</option>
							<option value="5">5:1</option>
							<option value="6">6:1</option>
							<option value="7">7:1</option>
							<option value="8">8:1</option>
							<option value="9">9:1</option>
							<option value="10">10:1</option>
						</select>
					</label>
					<label>
						<input name="tope_Apuesta_<?php echo $nro_Part ?>" type="text" id="tope_Apuesta_<?php echo $nro_Part ?>" size="20" maxlength="20">
					</label>
					</br>
					<div id="eje_<?php echo $nro_Part ?>" class="mensaje">
						<?php if(array_key_exists('Participante_'.$nro_Part,$mensaje) && trim($mensaje['Participante_'.$nro_Part])!='')
							{
								echo "<br>";
								echo $mensaje['Participante_'.$nro_Part];
								echo "<br>";
							}
						?>
					</div>
	              
					<?php 
						$nro_Part++; 
						}
					?>
					
					<p>
					   <input name="continuar" type="submit" class="hhhh" id="button2" value="continuar" align='center'>
					</p>
              
				</td>
            </tr>
        </table>
		</br>
	      
		<center><p><img src="Imagenes/BANNERMISS.gif" width="1000" height="90" alt="miisss"></p></center>
        
	    <?php 	
	    }	
	    ?>
	</form>

	<?PHP
	require_once("Contenedores/footer.php");
	?>
</body>