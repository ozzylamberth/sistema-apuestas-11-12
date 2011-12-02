<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
//require_once("../Clases/Funciones.php");
//require_once("../Clases/Usuario.php");
//require_once("../Contenedores/header.php");
?>


<html>
<head>
<title>|::SISTEMA DE REGISTRO DE REQUISICIONES Y ORDENES DE COMPRA  Provided By Grupo NSM::|</title> 
</head>
<body background='images/fondo2.jpg'>
<form id="formulario" name="formulario" method="post" action="iniciando.php">
	<div id="head">
    	<div id="title"></div>
    </div>
    <div id="body_wrapper">
    	<div id="body">
        	<div id="all">
            	
		<font color="#FFFFFF" face="verdana">
                	<div class="content"><BR><h2><p align="center">Bienvenido al Sistema Requisiciones</p></H2><p align="center"><p align="center">Por favor ingrese sus datos para acceder al sistema</p><br />
                    	<table width="348" border="0" align="center">
                        	<tr>
                            	<td rowspan="4"><img src="images/candado.png" height='80' width='80'/></td>
	                            <td align="right"><strong>Login:</strong></td>
                                    <td><input name="usuario" id="usuario" type="text"  maxlength="20" size="11" title="Introduzca su usuario"/></td>
                            </tr>
                            <tr>
                            	<td align="right"><strong>Password:</strong></td>
                                <td><input name="clave" id="clave" type="password"  maxlength="20" size="11" title="introduzca su contraseña"/></td>
								  <td><input type='hidden' name='bandera'  id='bandera' /></td>
								  
                            </tr>
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                            	 <p align="center">
								<td colspan="2" align="center"> <input type='submit'  name='iniciar' value='Iniciar'> 
								 <input type='reset'  name='limpiar' value='Limpiar'> </td>
								</p>
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


<?PHP
//require_once("../Contenedores/footer.php");
?>