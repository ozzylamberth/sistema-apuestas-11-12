<?php

include_once ("../DataConexion/conexion.php");

// Replace the path with where you installed log4php
require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
?>
		<head>
        
                <script>
				
		
				
				
function validaSubmite(){
if (document.RegistroUsuario.admin_nombre.value == false )
         alert("Debe Ingresar Nombre")
else if (document.RegistroUsuario.admin_apellido.value == false )
		alert("Debe Ingresar Apellido")
else if (document.RegistroUsuario.admin_cedula.value == false )
		alert("Debe Ingresar Respuesta Secreta")	
else if (document.RegistroUsuario.admin_login.value == false )
		alert("Debe Ingresar el login")
else if (document.RegistroUsuario.admin_contrasena.value == false )
		alert("Debe Ingresar el login")	
else if (document.RegistroUsuario.admin_resp_secreta.value == false )
		alert("Debe Ingresar Respuesta Secreta")
else
       document.RegistroUsuario.submit()
}</script>
        
        
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
		</script>
		
</head>

<body>

        <title>
		    Registro de Usuario
		</title>
		
        



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
<form name="RegistroUsuario" id="RegistroUsuario" method="post" action="RegistroUsuario2.php">

  <p><strong>Nombre</strong>
    <input name='admin_nombre' type='text' id='admin_nombre' value="" maxlength="25">
  </p>
  <p>
    <strong>Apellido</strong>
    <input name='admin_apellido' type='text' id='admin_apellido' value="" maxlength="25">
  </p>
  <p><strong>Cedula</strong>
    <input name='admin_cedula' type='text' id='admin_cedula' onKeyPress="return acceptNum(event)" value="" maxlength="10">
  </p>
  <p><strong>Nombre de Usuario</strong>
    <input name="admin_login" type="text" id="admin_login" maxlength="15">
  </p>
  <p>
    
    <strong>Contrasena</strong>
    <input name="admin_contrasena" type="password" id="admin_contrasena" maxlength="8">
  </p>
  <p>
    
    <strong>Pregunta Secreta</strong>
    <select name="pre_desc" id="pre_desc" >
      <option value="0">Seleccione </option>
      <?PHP
		$selec_Preg = sql("select pre_des from pregunta_secreta");
	    //$row=oci_fetch_array($selec_Preg,OCI_BOTH);
		 //print_r($row);
		
		
		 while ($rows=oci_fetch_array($selec_Preg,OCI_BOTH))
		{?>
      <option value="<?php echo $rows["PRE_DES"]?>" > <?php echo $rows["PRE_DES"]?></option>
      <?php  }        
 
  
        if(isset($_POST['pre_desc'])) //$_GET si se hace por GET (url)
        $pre_desc = $_POST['pre_desc']; //Te devolveria el atributo value del option seleccionado
 
?>
    </select>
  </p>
  <p>
    
    <strong>Respuesta Secreta</strong>
    <input name='admin_resp_secreta' type='text' id='admin_resp_secreta' value="" maxlength="100">
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <input type="button" name="Registrar" id="Continuar con Registro" value="Continuar con Registro" onClick="validaSubmite()">
</form>
<p>&nbsp;</p>

 <form name='volverse' action='home.php'> 
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

