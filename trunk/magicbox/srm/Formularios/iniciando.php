<?php
include_once ("../DataConexion/conexion.php");
session_start();


$usuario= $_POST['usuario'];
$clave= $_POST['clave'];

//require_once("../Contenedores/header.php");

//$usuario= md5('$usuario');
//$clave= md5('$clave');


/////////////////////////////////////////////////////////////
//////luego del if del controlador sigue esta impresion ///////////////////////
/////////////////////////////////////////////////////////////
              
			  $validar_Existencia=sql("SELECT * FROM administrador where admin_login='$usuario' and admin_contrasena='$clave'");
		 $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
         $filas=oci_num_rows($validar_Existencia);
			if ($filas>0){	
											
					$_SESSION["usuario"]= "$usuario";
					$_SESSION["clave"]= "$clave";
					header("location:aplicacion.php");
					}
					else								
					{
					
		
		?>
		
									
										<html>
<head>
<title>|::SISTEMA DE APUESTAS SG::|</title> 
</head>
<body>
<form id="formulario" name="formulario" method="post" action="iniciar.php">
	<div id="head">
    	<div id="title"></div>
    </div>
    <div id="body_wrapper">
    	<div id="body">
        	<div id="all">
            	
		<font color="#000000" face="verdana">
                	<div class="content"><BR><h2><p align="center">Error de Sistema</p></H2><p align="center"><p align="center">Por favor verifique sus datos para acceder al sistema</p><br />
                    	<table width="348" border="0" align="center">
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
							<tr>
							<td> <p align='center' class='Estilo2 Estilo4 Estilo4'><strong>Usuario o Contrasena Invalidos</strong></p> </td>
							</tr>
                            <tr>
                            	 <p align="center">
								<td colspan="2" align="center"> <input type='submit'  name='Regresar' value='Regresar'> 
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
										exit(0);
										}
										//}								
										
										
										if ($filas==0)
										{
										$log->error("Usuario no existe"); 	
										?>
										<html>
<head>
<title>|::SISTEMA DE APUESTAS MG Provided By MG::|</title> 
</head>
<body>
<form id="formulario" name="formulario" method="post" action="iniciar.php">
	<div id="head">
    	<div id="title"></div>
    </div>
    <div id="body_wrapper">
    	<div id="body">
        	<div id="all">
            	
		<font color="#000000" face="verdana">
                	<div class="content"><BR><h2><p align="center">Error de Sistema</p></H2><p align="center"><p align="center">Por favor verifique sus datos para acceder al sistema</p><br />
                    	<table width="348" border="0" align="center">
                            </tr>
                            <tr>
                            	<td colspan="2">&nbsp;</td>
                            </tr>
							<tr>
							<td rowspan="4"><img src="../Imagenes/errorsesion.jpg" height='80' width='80'/></td>
							<td> <p align='center' class='Estilo2 Estilo4 Estilo4'><strong>Usuario o Contrasena Invalidos</strong></p> </td>
							</tr>
                            <tr>
                            	 <p align="center">
								<td colspan="2" align="center"> <input type='submit'  name='Regresar' value='Regresar'> 
								 </td>
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
										exit(0);
										}
											
										
										
						
////
///ADMIN
if ($usuario == "")
{
?>


				<p align="center" class="Estilo2 Estilo4 Estilo4 Estilo1"><strong>Debe ingresar Usuario</strong></p>
<div align="center" class="Estilo2"><a href='iniciar.php' class="Estilo4  Estilo1"><strong>Volver</strong></a>
                  </p>
<?PHP
				exit(0);
				
}
				
if ($clave == "")
{
?>
                </div>
                <p align="center" class="Estilo2 Estilo4 Estilo1"><strong>Debe Ingresar Clave</strong></p>
                <div align="center" class="Estilo1"><a href='iniciar.php' class="Estilo4 Estilo2"><strong>Volver</strong></a>
                  </p>
<?PHP
				exit(0);				
}			
				
				
?>
                </div>
</body>
<html>

</html>