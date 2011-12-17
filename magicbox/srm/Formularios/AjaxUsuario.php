<?php

include_once ('conexion.php');
// Replace the path with where you installed log4php
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

?>


<body>

		
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
		<title>
		Registro de Usuario
		</title>
		</head>
                 <body>

<form name="consulta" action="UsuarioRegistrado.php" method="post" onSubmit="MostrarConsulta('RegistroUsuario2.php');" return false>
<table align="center" border="0" width="348">
		<tr align='left'>	
			<td align='left'><strong>FECHA</td>
			<td align='left'><input type="text" name="fecha" readonly="readonly" value="<?php 
			//$fecha= date("d/m/Y");
			$fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );
			echo $fecha?>">
			</td>
		</tr>		
</table>		
<fieldset width="348">
<legend><strong>Registro de Usuario </strong></legend>
<table align="left" border="0"width="348" >
		<tr>
        <table align="left" border="0" width="348">
			<tr>
			<td>
		<strong>Nombre</strong> <input type='text' name='nombre' id='nombre' value="">	
		</td>
		</tr>
		<tr>
		<td>
		<strong>Apellido</strong> <input type='text' name='apellido' id='apellido' value="">	
		</td>
		</tr>
		<tr>
		<td>
		<strong>Cedula</strong> <input type='text' name='cedula' id='cedula' value="" onChange="validarSiNumero(this.value);">	
		</td>
		</tr>
		<tr>
		<td>
		<strong>Estado</strong>
		<select name="estado" id="estado"  onChange="Javascript:MostrarConsulta('RegistroUsuario2.php', 'consultaSede', this.id, 'habilitaSede');">
<?PHP
		$sql="select * from estado";
		$result=mysql_query($sql);

		echo "<option value=''>Seleccione Estado</option>";
		while($consulta=mysql_fetch_array($result)) {
		    if (!$consulta) {
			$error="Error al recorrer los registros!!.";
			echo($error);
		    }
				else 
				{
			echo "<option value='".$consulta[0]."'>".$consulta[1]."</option>";
		    }
													}

?>								
			</select>
			</td>
			</tr>	
			
			<tr>
		<td>
            <strong>Ciudad</strong>
            <div id='consultaSede'>
			 <select name='sede' id='sede' disabled=true >
                <option value=''>Seleccionar Ciudad</option>
              </select>
			 </div>
			 </td>
			</tr>	
			
		<tr>
		<td>
		<strong>Direccion</strong> <textarea name="direccion" id="direccion" rows='3' cols='60' align='center' value=""></textarea>	
		</td>
		</tr>
		
		<tr>
		<td>
		<strong>Email</strong> <input type='text' name='email' id='email' value="">	
		</td>
		</tr>
		
		<tr>
		<td>
		<strong>Telefono</strong> <input type='text' name='telefono' id='telefono' value="" onChange="validarSiNumero(this.value);">	
		</td>
		</tr>
		
		<tr>
		<td>
		<strong>Celular</strong> <input type='text' name='celular' id='celular' value="" onChange="validarSiNumero(this.value);">	
		</td>
		</tr>
		
		<tr>
		<td>
		<strong>Pregunta Secreta</strong>
		<select name="pregunta_secreta" id="pregunta_secreta" >

		<?PHP
		echo "<option value=''>Seleccione Pregunta Secreta</option>";
		$sql2="select * from pregunta_secreta";
		$result2=mysql_query($sql2);
		while($consulta2=mysql_fetch_array($result2))
		{
?>
	
		
<?PHP

		    if (!$consulta2) {
			$error2="Error al recorrer los registros!!.";
			echo($error2);
		    }
				else 
				{
			echo "<option value='".$consulta2[1]."'>".$consulta2[1]."</option>";
		    }
													

?>								
			
<?PHP
		}
		
?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td>
		<strong>Respuesta Secreta</strong> <input type='text' name='respuesta_secreta' id='respuesta_secreta' value="">	
		</td>
		</tr>
</table>
</fieldset>
<script>
function validaSubmite(){


if (document.consulta.nombre.value == false )
		alert("Debe Ingresar Nombre")
else if (document.consulta.apellido.value == false )
		alert("Debe Ingresar Apellido")
else if (document.consulta.direccion.value == false )
		alert("Debe Ingresar Direccion")
else if (document.consulta.email.value == false )
		alert("Debe Ingresar Email")
else if (document.consulta.respuesta_secreta.value == false )
		alert("Debe Ingresar Respuesta Secreta")
else
       document.consulta.submit()
		
}

function validarSiNumero(numero){
if (!/^([0-9])*$/.test(numero))
alert("El valor:  " + numero + "  Solo Puede Ser Numerico");

}



</script>
<table align="center">
	<tr>
	<td><input type="button" name="Registrar" id="Continuar con Registro" value="Continuar con Registro" onClick="validaSubmite()"></td>
    
	<?PHP //echo "<input type='hidden' name='compra' value='$compra'></td>"; ?>
	</tr>

</table>
</form>
<form name='volverse' action='../../index.html'> 
<table align='center'>
					<td><input type="submit" align='center' name="Cancelar" id="button2" value="Cancelar"></td>
					<?PHP
			
			
			?>
					</tr>
					</table>
</form>
<?PHP
require_once("../Contenedores/footer.php");
?>