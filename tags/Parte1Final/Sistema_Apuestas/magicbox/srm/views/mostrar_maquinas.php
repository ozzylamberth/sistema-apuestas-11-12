<html> 
<!-- Vista o interfaz grafica utilizada al mostrar las maquinas activas--> 
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
		<title> API Google Maps - CLH</title>  
  
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAA5Wdq49NYgpagNl9O03kUhBT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSfETnhGMf0ivT-0q6ftmilrSw5YQ" type="text/javascript"></script>  
		<script type="text/javascript">  

<?php //include_once("../Controladores/ControlMostrarMaquinas.php"); ?>
  
			function inicializar() 
			{  
				if (GBrowserIsCompatible()) 
				{  
					var map = new GMap2(document.getElementById("map"));  
					map.setCenter(new GLatLng(6, -67), 5);  
					map.addControl(new GMapTypeControl());  
					map.addControl(new GLargeMapControl());  
					map.addControl(new GScaleControl());  
					map.addControl(new GOverviewMapControl());  
					//map.addOverlay(new GMarker(new GLatLng(6.43795,-67.603627)));  
			  
					function informacion(ubicacion, descripcion) 
					{  
						var marca = new GMarker(ubicacion);  
						GEvent.addListener(marca, "click", function() 
						{  
							marca.openInfoWindowHtml(descripcion); 
						} );  
						  
						return marca;  
					}  

					var contador=document.getElementById('contador').value;
					var cont=0;
					
					while(cont<contador)
					{
						var maq_longitud=document.getElementById('longitud_'+cont).value;
						var maq_latitud=document.getElementById('latitud_'+cont).value;
						var maq_descripcion=document.getElementById('maquina_'+cont).value;
						//var latitud= 6;
						//var longitud= -67;
			  
						var ubicacion = new GLatLng(maq_latitud,maq_longitud); 
						var marca = informacion(ubicacion, maq_descripcion);  

						map.addOverlay(marca);  
						
						cont++;
					}	
				}  
			}  
			  
		</script>  
  
		<style type="text/css">
			
			.maps {
				font-family: "Comic Sans MS", cursive;
				color: #500;
				font-size: 18px;
			}
			body {
				background-image: url(Imagenes/fondo.jpg);
			}
			.nota {
				font-family: "Comic Sans MS", cursive;
				font-size: 16px;
			}
			.nota2 {
				font-size: 12px;
				height: 216px;
				width: 218px;
				font-size: 14px;
				font-family: "Comic Sans MS", cursive;
				color: #700;
				text-align: center;
				background-image: url(Imagenes/stock-photo-3284558-note-paper.jpg);
			}
			.nota3 {
				font-size: 14px;
				font-family: "Comic Sans MS", cursive;
				color: #700;
				text-align: center;
			}

		</style>
	</head>  

	<center>
		<body>
			<form action="" method="get" name="Maquinas" >

				<?php 
					$i=0;
				?>	
				<input name="contador" id="contador"  type="hidden" value="<?php echo count($maquinas) ?>">	
					
					<?php foreach($maquinas as $clave=>$valor):?>
						<input name="maquina_<?php echo $i ?>" id="maquina_<?php echo $i ?>"  type="hidden" value="<?php echo $valor['maq_id'].'.- '.$valor['maq_marca'].' '.$valor['maq_modelo'].' '.$valor['maq_procesador'].' '.$valor['maq_cap_disco'] ?>">
						<input name="longitud_<?php echo $i ?>" id="longitud_<?php echo $i ?>"  type="hidden" value="<?php echo str_replace(',','.',$valor['maq_longitud']) ?>">	
						<input name="latitud_<?php echo $i ?>" id="latitud_<?php echo $i ?>"  type="hidden" value="<?php echo str_replace(',','.',$valor['maq_latitud']) ?>">	
					<?php $i++?>
					
					

				<?php endforeach; ?>

				<table  width="900" border="0">
					<tr>
						<td width="500"> </td><!--p><table align="center" width="500" border="0"-->
					</tr>
                    <?php if(count($maquinas)>0): ?>
					<tr>
						<td width="400" class="maps" align="center" colspan="2">
							Las Siguientes Maquinas se encuentran activas &nbsp; <img src="Imagenes/gmaps.png" width="32" height="32" alt="gmaps">
						</td>
						<!--td width="100" bordercolor="#000000"><img src="Imagenes/gmaps.png" width="32" height="32" alt="gmaps"></td-->
					</tr>
					<tr>
						<td width="400" class="maps" align="center">
							<div id="map" style="width:730px; height:500px">  
								<script type="text/javascript">inicializar();</script>  
							</div> 
						</td>
						<td> 
							<div align="center" class="nota2">
								<p>&nbsp;</p><p>&nbsp;</p>
								<p>Si desea ver la informacion de la maquina, haga doble click sobre el marcador correspondiente</p>
							</div>
						</td>
					</tr>
					<?php else: ?>
                    <tr>
						<td width="400" class="maps" align="center" colspan="2">
							No hay registros de m&aacute;quinas activas en el sistema!!!
						</td>
						<!--td width="100" bordercolor="#000000"><img src="Imagenes/gmaps.png" width="32" height="32" alt="gmaps"></td-->
					</tr>
                    
                    <?php endif; ?>
				</table> 

			</form> 
		</body>  
	</center>
</html>  