<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
<title> API Google Maps - CLH</title>  
  
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAA5Wdq49NYgpagNl9O03kUhBT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSfETnhGMf0ivT-0q6ftmilrSw5YQ" type="text/javascript"></script>  
<script type="text/javascript">  

<?php include_once("../DataConexion/conexion.php"); ?>
  
function inicializar() {  
if (GBrowserIsCompatible()) {  
var map = new GMap2(document.getElementById("map"));  
map.setCenter(new GLatLng(39, -63), 5);  
map.addControl(new GMapTypeControl());  
map.addControl(new GLargeMapControl());  
map.addControl(new GScaleControl());  
map.addControl(new GOverviewMapControl());  
//map.addOverlay(new GMarker(new GLatLng(-33.43795,-70.603627)));  
  
function informacion(ubicacion, descripcion) {  
  
var marca = new GMarker(ubicacion);  
GEvent.addListener(marca, "click", function() {  
marca.openInfoWindowHtml(descripcion); } );  
  
return marca;  
  
}  

<?php
 $selectMaquinas= sql("select maq_longitud, maq_latitud, maq_descripcion from maquina_apuesta");
?>
  
  <?php
	   
           While($row=oci_fetch_array($selectMaquinas,OCI_BOTH)){
	           $maq_longitud = $row['MAQ_LONGITUD'];
               $maq_latitud = $row['MAQ_LATITUD'];
			   $maq_descripcion = $row['MAQ_DESCRIPCION'];
			   			   			   
	     ?>
 
 var latitud= 39;
 var longitud= -63;
  
var ubicacion = new GLatLng(latitud,longitud);  
var descripcion =  '';
var marca = informacion(ubicacion, descripcion);  

map.addOverlay(marca);  

<?php
		   } ?>

}  
}  
  
</script>  
  
<style type="text/css">
<!--
.maps {
	font-family: "Comic Sans MS", cursive;
	color: #500;
	font-size: 18px;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.nota {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
}
.nota2 {
	font-size: 12px;
}
.nota2 {
	font-size: 14px;
	font-family: "Comic Sans MS", cursive;
	color: #700;
	text-align: center;
}
-->
</style>
</head>  
<center><body>

<form action="" method="get" name="Maquinas" >
<table  width="900" border="0">
  <tr>
    <td width="500"> <p><table align="center" width="500" border="0">
  <tr>
    <td width="400" class="maps" align="center" >Las Siguientes Maquinas se encuentran activas</td>
    <td width="100" bordercolor="#000000"><img src="../Imagenes/gmaps.png" width="32" height="32" alt="gmaps"></td>
  </tr>
</table> 


 </p>
  <div id="map" style="width:730px; height:500px">  
  <script type="text/javascript">inicializar();</script>  
</div> </td>
    <td> <table width="200" height="154" border="0" align="left">
  <tr>
    <td height="150" background="../Imagenes/stock-photo-3284558-note-paper.jpg"> <div align="center" class="nota2">
      <p>&nbsp;</p>
      <p>Si desea ver la informacion de la maquina, haga doble click sobre el marcador correspondiente</p>
    </div></td>
  </tr>
</table></td>
  </tr>
</table>

</form> 
</body>  </center>

</html>  