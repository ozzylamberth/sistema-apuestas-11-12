<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title></title>

<!-- 
@autor Irene
Vista o interfaz grafica utilizada al agregar una maquina-->
		<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAhJvNRwdHCzNPZU_I7Rw6IxQ4Cg8uvp3HuRtP3UdsoSF7xQyJ4lBGSea-ar0o_vtVLOwmGoyLQ" type="text/javascript">
		</script>

		<script type="text/javascript">
			//<![CDATA[

			var contador = 1; // contador para marcar puntos de interes

			// Creates a marker at the given point with the given number label
			function createMarker(point, number) 
			{
				var marker = new GMarker(point);
				draggable:true;
				GEvent.addListener(marker, "click", function() 
				{
					marker.openInfoWindowHtml("Marcador#<b>" + number + "<br>Pos " + point.toString() + "</b>");
				});
				return marker;
			}
	  
			function load() 
			{
				if (GBrowserIsCompatible()) 
				{
					var map = new GMap2(document.getElementById("map"),"hybrid");

					// insertar los controles
					map.addControl(new GSmallMapControl());
					map.addControl(new GMapTypeControl());

					// establecer el listener para actualizar la posición del punto central
					GEvent.addListener(map, "moveend", function() 
					{
						var center = map.getCenter();
						document.getElementById("ejemplo").value=center.toString();
						document.getElementById("message").innerHTML = center.toString();
					});

					// establecer el punto origen, nivel de zoom y tipo de mapa
					map.setCenter(new GLatLng(7.115428,-66.78955),8, G_SATELLITE_MAP);

					// establecer marcadores
					GEvent.addListener(map, "click", function(marker, point) 
					{
						if (marker) 
						{
							map.removeOverlay(marker);
						} 
						else 
						{
							map.addOverlay(createMarker(point, contador));
							contador = contador + 1;
						}
					});

					// poner el texto de aquí esta Autentia
					map.openInfoWindow(map.getCenter(),document.createTextNode("Doble click donde desee insertar una maquina de apuesta"));
				}
			}

			//]]>
		</script>
			
		<style type="text/css">

		body,td,th {
			font-family: Comic Sans MS, cursive;
			font-weight: bold;
		}
		body {
			background-image: url(Imagenes/fondo.jpg);
		}
		.nn {
			font-family: "Comic Sans MS", cursive;
		}
		.bot {
			font-family: "Comic Sans MS", cursive;
			color: #700;
			background-color: #000;
		}
		.linea {
			font-family: "Comic Sans MS", cursive;
			color: #700;
			border-top-color: #000;
			border-right-color: #000;
			border-bottom-color: #000;
			border-left-color: #000;
		}
		.titulo {
			font-size: x-large;
			color: #700;
		}
		.mm {
			color: #B00;
		}
		.mensaje 
		{
			color: #D00;
			font-size: 12px;
		}

		</style>
	</head>
	
	<body onload="load()" onunload="GUnload()">
		<center><label class="titulo">Registro de Maquina de Apuesta</label>

		<form id="hhhhh" action="?controlador=Maquinas&accion=agregarMaquina_2" name="formMapa" method="post">
		
			<table width="600" border="0">
				<tr>
					<td colspan="2">
						</br>
						<strong>Sumistre la siguiente informacion de la maquina:</strong>
						</br>
					</td>
				</tr>
				<tr>
					<td width="200">
						<strong>Marca:</strong>
					</td>
					<td>
						<input name="maq_marca" type="text" id="maq_marca" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_marca',$mensaje) && trim($mensaje['maq_marca'])!='')
							{
								echo $mensaje['maq_marca'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Modelo:</strong>
					</td>
					<td class="mensaje">
						<input name="maq_modelo" type="text" id="maq_modelo" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_modelo',$mensaje) && trim($mensaje['maq_modelo'])!='')
							{
								echo $mensaje['maq_modelo'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Memoria:</strong>
					</td>
					<td>
						<input name="maq_memoria" type="text" id="maq_memoria" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_memoria',$mensaje) && trim($mensaje['maq_memoria'])!='')
							{
								echo $mensaje['maq_memoria'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Procesador:</strong>
					</td>
					<td>
						<input name="maq_procesador" type="text" id="maq_procesador" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_procesador',$mensaje) && trim($mensaje['maq_procesador'])!='')
							{
								echo $mensaje['maq_procesador'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Medidas:</strong>
					</td>
					<td>
						<input name="maq_medidas" type="text" id="maq_medidas" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_medidas',$mensaje) && trim($mensaje['maq_medidas'])!='')
							{
								echo $mensaje['maq_medidas'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Tarjeta de Memoria:</strong>
					</td>
					<td>
						<input name="maq_tarj_mem" type="text" id="maq_tarj_mem" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_tarj_mem',$mensaje) && trim($mensaje['maq_tarj_mem'])!='')
							{
								echo $mensaje['maq_tarj_mem'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td>
						<strong>Capacidad de Disco:</strong>
					</td>
					<td>
						<input name="maq_cap_disco" type="text" id="maq_cap_disco" size="30" maxlength="30" />
					</td>	
				</tr>
				<tr>
					<td width="200">
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('maq_cap_disco',$mensaje) && trim($mensaje['maq_cap_disco'])!='')
							{
								echo $mensaje['maq_cap_disco'];
							}
						?>
					</td>	
				</tr>
				<tr>
					<td colspan="2">&nbsp;
						
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div id="map" style="width:600px; height:400px"></div>
						<div id="message"></div>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Coordenadas de la maquina:</strong>
					</td>
					<td>
						<input name="ejemplo" type="text" class="linea" id="ejemplo"  size="50"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;
						
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input name="Registrar" type="submit" class="mm" value="Registrar" />
					</td>
				</tr>
			</table>
		</form>
		</center>
	</body>
</html>