<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<?php include_once("../DataConexion/conexion.php"); ?>


       <script language="javascript" type="text/javascript">
/************************** Esto permanece inalterado **************************/
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
/*********************** Hasta acá permanece inalterado ****************************/
function MostrarConsulta(pagina, tag, id1, accion) /* Esta es la funcion modificada para pasar parámetros adicionales*/
{
	divResultado = document.getElementById(tag);
	valor1 = document.getElementById(id1);
//		alert(valor1.value);
	if (valor1==null)
		{valor1=0;}
	ajax=objetoAjax();
//	alert (id1);
	ajax.open("GET", pagina+"?id1="+valor1.value+"&accion="+accion);

	ajax.onreadystatechange=function() 
	{
		if (ajax.readyState==1)
		{
			// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
//			selectDestino.length=0;
//			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
//			selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;	
			mensaje = "Cargando...";
			divResultado.innerHTML = mensaje;
		}
		if (ajax.readyState==4) 
		{
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null);
}

//-->
</script>

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
	background-image: url(../Imagenes/fondo.jpg);
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
-->
</style></head>
<body onload="load()" onunload="GUnload()">

<?php
 $selectCasas= sql("select casapu_nombre from casa_apuesta");
?>
<center><label class="titulo">Registro de Maquina de Apuesta</label></center>
<form action="" method="post" name="form1" id="form1">

<center><table width="600" border="0">
  <tr>
    <td width="500"><p>Seleccione porque criterio desea buscar: 
      <select name="Busqda_Tipo" id="Busqda_Tipo"  onChange="Javascript:MostrarConsulta('buscar_maquina2.php', 'consultaSede', this.id, 'habilitaSede');">
        <option value="0">Seleccione </option>
        <option value="1">Marca</option>
        <option value="2">Status</option>
        <option value="3">Modelo</option>
        <option value="4">Memoria</option>
        <option value="5">Procesador</option>
      </select>
      
            <strong>Disponibles:</strong>
            <div id='consultaSede'>
			  <p>
			    <select name='sede' id='sede' disabled=true >
			      <option value=''>Seleccione</option>
		        </select>
			  </p>
			  <p>
			    <label>
			      <input name="Buscar" type="submit" class="mm" id="Buscar" value="Buscar" />
			    </label>
			  </p>
        </div></td>
  
    <td width="100">&nbsp;</td>
  </tr>
</table></center>
</form>




<form id="hhhhh" action="../controladores/ControlMaquina.php" name="formMapa" method="post"/>
<center>
  <div id="map" style="width:600px; height:400px"></div>
<div id="message"></div>

<input name="Registrar" type="submit" class="mm" value="Registrar" />

<br />
<center><input name="ejemplo" type="text" class="linea" id="ejemplo"  size="100"/></center>


</center>
</form>
</body>
</html>