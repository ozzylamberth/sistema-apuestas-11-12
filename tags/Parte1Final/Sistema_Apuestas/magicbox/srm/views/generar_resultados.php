<!-- 
@Eleany G
Vista o interfaz grafica utilizada al generar los resultados de un evento-->

<style type="text/css">

body,td,th {
	font-family: Comic Sans MS, cursive;
	color: #000;
}
body {
	background-image: url(Imagenes/fondo.jpg);
	color: #000;
}
.jj {
	color: #000;
}
.bot {
	color: #800;
}

</style>

<body>
	    
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
		
		function enviar(accion)
		{
			document.getElementById('accion').value=accion;
			
			document.eventos2.submit();
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
        
        
	<br>

	<p align="center" class="Estilo1 Estilo3"><img src="Imagenes/CASAAPUESTASOG.gif" width="925" height="79" alt="casa"></p>
      
	<form name="eventos2" id="eventos2" method="post" action="?controlador=Eventos&accion=generarResultados_2" >
		<p class="Estilo1 Estilo3">
			<center>
				<input name="accion" id="accion" type="hidden" value="">
			
				<table width="600" border="0">
					<tr>
						<td>
							<strong>Seleccione el Evento</strong>
						<td/>
						<td>
							<select name="evento" class="gh" id="evento">
								<option value="0">Seleccione </option>
								<?php print_r($eventos); foreach ($eventos as $clave=>$valor): ?>
									<option value="<?php echo $valor["eve_id"] ?>" ><?php echo $valor["eve_nombre"]?></option>
								<?php endforeach; ?>
							</select>
						<td/>
						<td width="300">
							<input name="Buscar" type="button" class="bot" id="Buscar" value="Buscar" onClick="enviar('buscar')">
							
						</td>
						<td rowspan="2" align="center">
							<img src="Imagenes/bsb.png" width="127" height="114" alt="jhjh">
						<td/>
					</tr>
					<tr>
						<td colspan="2">&nbsp;
							
						</td>
					</tr>
				</table>

				<?php if($eve_id): ?>
					<br> 
					</br>
					<table width="600" border="0">
						<tr>
							<td>
								<strong>Seleccione los participantes y presione agregar</strong>
							<td/>
							<td>
								<select name="par_nombre" class="gh" id="par_nombre">
									<option value="0">Seleccione </option>
									<?php foreach ($participantes_eve as $clave=>$valor): ?>
									<option value="<?php echo $valor["par_id"] ?>" ><?php echo $valor["par_nombre"]?></option>
									<?php endforeach; ?>
								</select>
							<td/>
							<td align="center">
								<input name="Agregar" type="button" class="hhhh" id="Agregar" onClick="javascript:agregarParticipante('<?php echo $eve_nro_gan?>')" value="Agregar">
							<td/>
						</tr>
						<tr>
							<td colspan="2">&nbsp;
								
							</td>
						</tr>
					</table>
				
					<table width="600" border="0">
						<tr>
							<td colspan="2">
								<strong>Ganadores seleccionados:</strong>
							</td>
						</tr>
						
								<?php 
									$nro_Part=1;
          
									while ($nro_Part <=  $eve_nro_gan)
									{
								?>
						<tr>
							<td colspan="1">
								<?php echo $nro_Part.".-"; ?>
							</td>
							<td colspan="1">
										<input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
										<input name="Participante_<?php echo $nro_Part ?>" type="text" id="Participante_<?php echo $nro_Part ?>" size="40" maxlength="40" readonly="readonly">
										<!--input name="Participante_<?php echo $nro_Part ?>" type="hidden" value="Participante_<?php echo $nro_Part ?>"-->
							</td>
						</tr>
								<?php 
									$nro_Part++; 
									}
								?>
						
					</table>
					<br> 
					</br>
				
					<table width="600" border="0">
						<tr>
							<td>
								<strong>Descripción</strong>
							</td>
							<td>
								<textarea name="descripcion_eve" cols="60" rows="2" id="descripcion_eve"></textarea>
							</td>
						</tr>
						<tr>
							<td width="600" colspan="2" align="center">
								<input name="eve_id" type="hidden" value="<?php echo $eve_id ?>">
								<input name="eve_nro_gan" type="hidden" value="<?php echo $eve_nro_gan ?>"> 
								<br>
								<input name="continuar" type="submit" class="bot" id="button2" value="continuar" align='center' onClick="enviar('continuar')">
							</td>
						</tr>
					</table>
				<?php endif; ?>
			</center>
	</form>
</body>