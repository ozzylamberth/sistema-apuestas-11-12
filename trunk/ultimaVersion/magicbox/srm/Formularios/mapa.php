<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<?php include_once("../DataConexion/conexion.php"); ?>

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAhJvNRwdHCzNPZU_I7Rw6IxQ4Cg8uvp3HuRtP3UdsoSF7xQyJ4lBGSea-ar0o_vtVLOwmGoyLQ"
type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[

var contador = 1; // contador para marcar puntos de interes

// Creates a marker at the given point with the given number label
function createMarker(point, number) {
var marker = new GMarker(point);
 draggable:true;
GEvent.addListener(marker, "click", function() {
marker.openInfoWindowHtml("Marcador#<b>" + number + "<br>Pos " + point.toString() + "</b>");
});
return marker;
}

	  
function load() {
if (GBrowserIsCompatible()) {
	
var map = new GMap2(document.getElementById("map"),"hybrid");

// insertar los controles
map.addControl(new GSmallMapControl());
map.addControl(new GMapTypeControl());


// establecer el listener para actualizar la posición del punto central
GEvent.addListener(map, "moveend", function() {
var center = map.getCenter();
document.getElementById("ejemplo").value=center.toString();
document.getElementById("message").innerHTML = center.toString();
});

// establecer el punto origen, nivel de zoom y tipo de mapa
map.setCenter(new GLatLng(7.115428,-66.78955),8, G_SATELLITE_MAP);

// establecer marcadores
GEvent.addListener(map, "click", function(marker, point) {
if (marker) {
map.removeOverlay(marker);
} else {
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
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.png);
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
-->
</style></head>
<body onload="load()" onunload="GUnload()">

<?php
 $selectCasas= sql("select casapu_nombre from casa_apuesta");
?>
<center><label class="titulo">Registro de Maquina de Apuesta</label></center>

<form id="hhhhh" action="../controladores/ControlMaquina.php" name="formMapa" method="post"/>


<p> <label>Seleccione casa de apuesta a la que pertenece:</label>
  <select name="casapu_nombre" class="nn" id="casapu_nombre">
  <option value="0">Seleccione </option>
  <?PHP
         while ($row=oci_fetch_array($selectCasas,OCI_BOTH)){?>
  <option value="<?php echo $row["CASAPU_NOMBRE"] ?>" > <?php echo $row["CASAPU_NOMBRE"]?></option>
  <?php  } ?>
</select>
<?PHP
    if(isset($_POST['casapu_nombre'])) 
    $casapu_nombre = $_POST['casapu_nombre']; //Te devolveria el atributo value del option seleccionado
	?>
</p>
<p>
<label>Descripcion de la maquina:
  <textarea name="Maq_Des" class="nn" id="Maq_Des"></textarea>
</label>
</p>

 

   

<center>
<div id="map" style="width:600px; height:400px"></div>
<div id="message"></div>

<input name="Registrar" type="submit" class="bot" value="Registrar" />

<br />
<center><input name="ejemplo" type="text" class="linea" id="ejemplo"  size="100"/></center>


</center>
</form>
</body>
</html>