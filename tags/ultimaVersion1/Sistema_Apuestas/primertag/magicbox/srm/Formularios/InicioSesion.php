<?php


require_once("../Clases/Funciones.php");
require_once("../Clases/Usuario.php");
require_once("../Contenedores/header.php");
session_start();


	?>





<script language="javascript">
	var mensaje = "";
	

	function validar(){	
		var login=document.formulario.login.value;
		var password=document.formulario.password.value;
				
		if(isEmpty(login))
				mensaje += "El campo Login esta vacio!\n";
		if(isEmpty(password))
				mensaje += "El password esta vacio!\n";
		if(mensaje != ''){
				alert("Error en el formulario:\n" + mensaje);
				mensaje = "";
				return false;	
			}return true;
		}//fin validar
		
		
		
	

	function isEmpty(campo){
		if(campo[0] != ' ' && campo.length > 0){
			return false;
		}else{
			return true;
		}	
	}//fin IsEmpty


		
	

</script>

<html>
<head>
<title>|::SISTEMA DE REGISTRO DE REQUISICIONES Y ORDENES DE COMPRA  Provided By Grupo NSM::|</title> 
</head>
<body>
<form id="formulario" name="formulario" method="post" action="#">
	<div id="head">
    	<div id="title"></div>
    </div>
    <div id="body_wrapper">
    	<div id="body">
        	<div id="all">
            	
		<font color="#000000" face="verdana">
                	<div class="content"><BR><h2><p align="center">Bienvenido al Sistema de Requisiones</p></H2><p align="center"><p align="center">Por favor ingrese sus datos para acceder al sistema</p><br />
                    	<table width="348" border="0" align="center">
                        	<tr>
                            	<td rowspan="4"><img src="../Imagenes/candado.png" height='80' width='80'/></td>
	                            <td align="right"><strong>Login:</strong></td>
                                    <td><input name="login" id="login" type="text"  maxlength="20" size="11" title="Introduzca su numero de cedula"/></td>
                            </tr>
                            <tr>
                            	<td align="right"><strong>Password:</strong></td>
                                <td><input name="password" id="password" type="password"  maxlength="20" size="11" title="introduzca su contraseña"/></td>
								  <td><input type='hidden' name='bandera'  id='bandera' /></td>
								  
                            </tr>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                            	<td colspan="2" align="center"><input name="aceptar" type="submit" id="aceptar" value="Aceptar" onclick="return validar()"/>&nbsp;
                           	    <input type="reset" name="reset" value="Borrar" /></td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="../Formularios/recuperarClave.php"><h5 align="center">&#191; Olvidaste tu Contrase&ntilde;a ?</h5></a></td>
                            </tr>
                      </table><p>&nbsp;</p></div>
                    	<div class="bottom"></div>
                    </div>
                    <div class="clearer"></div>
                </div>
                <div class="clearer"></div>
            </div>
            <div id="end_body"></div>
</font>
</form>
		<?
		if($bandera!="10")
switch($bandera){
	
	case "1":
		echo"<script language='javascript'>enviarCO($cedula);</script>";
		break;
		
	case "2":
		echo"<script language='javascript'>enviarRE($cedula);</script>";
		break;
	
	case "3":
		echo"<script language='javascript'>enviarAP($cedula);</script>";
		break;
		
	case "4":
		echo"<script language='javascript'>enviarPS($cedula);</script>";
		break;
		
	default:
		echo"<script language='javascript'>alert('clave y/o contrasena invalida');</script>";
		break;
}	?>

</body>
</html>
